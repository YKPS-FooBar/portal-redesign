# portal-redesign

This is the backend with built frontend files included, running on PHP.

1. [Preparation](#preparation)
  1. [Download](#download)
  2. [PHP Config](#php-config)
  3. [Server Config](#server-config)
    1. [Example Apache Virtual Hosts](#example-apache-virtual-hosts)
    2. [Example nginx with PHP-FPM](#example-nginx-with-php-fpm)
2. [Test on Local](#test-on-local)
3. [API Documentation](#api-documentation)
  1. [GET `login.php`](#get-loginphp)
  2. [POST `login.php`](#post-loginphp)
  3. [GET `admin.php`](#get-adminphp)
  4. [POST `files.php`](#post-filesphp)
  5. [POST `remove.php`](#post-removephp)
  6. [POST `upload.php`](#post-uploadphp)

## Preparation

### Download

Clone & checkout this branch:
```sh
git clone https://github.com/YKPS-FooBar/portal-redesign.git
cd portal-redesign
git checkout php
```

### PHP Config

Make sure you have set at least
```ini
memory_limit = 512M
post_max_size = 512M
file_uploads = On
upload_max_filesize = 512M
max_file_uploads = 100
```
in your `php.ini` to allow large uploads.

### Server Config

#### Example Apache Virtual Hosts
```apache
Listen 80
Listen 443

<VirtualHost *:80>
   ServerName [domain name, e.g. go.myykps.cn]
   Redirect / https://[domain name]
</VirtualHost>

<VirtualHost *:443>
    ServerName [domain name]

    # SSL settings; change to your certificate and key location
    SSLEngine On
    SSLCertificateFile "/path/to/[domain name].cert"
    SSLCertificateKeyFile "/path/to/[domain name].key"
    SSLCipherSuite HIGH:!aNULL:!MD5

    # Modules for PHP and `mod_rewrite` are required:
    LoadModule rewrite_module [your mod_rewrite.so location like modules/mod_rewrite.so]
    LoadModule php5_module [your libphp5.so location]  # or php7

    # Set `DocumentRoot` to where this repo is at, e.g.:
    DocumentRoot [path to portal-redesign]
    <Directory [path to portal-redesign]>
        Require all granted

        # The Vue router is in history mode, so views are named as separate pages like `/clubs`
        # which don't take up files, so those should be taken to `/index.html` and handled there
        <IfModule mod_rewrite.c>
            RewriteEngine On
            RewriteBase /
            RewriteRule ^index\.html$ - [L]
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            RewriteRule . /index.html [L]
        </IfModule>
    </Directory>

    # Handle .php files using PHP handler
    <FilesMatch \.php$>
        SetHandler application/x-httpd-php
    </FilesMatch>
</VirtualHost>
```

#### Example nginx with PHP-FPM
```nginx
server {
    listen       80;
    listen       [::]:80;

    # Server name
    server_name  [domain name, e.g. go.myykps.cn];

    # Upgrade to HTTPS
    return 301 https://[domain name]$request_uri;
}

server {
    listen       443 ssl;
    listen       [::]:443 ssl;

    # Server name
    server_name  [domain name];

    # Where you place this repo
    root [path to portal-redesign];

    # SSL settings; change to your certificate and key location
    ssl_certificate /etc/pki/nginx/server.crt;
    ssl_certificate_key /etc/pki/nginx/private/server.key;
    ssl_session_cache shared:SSL:1m;
    ssl_session_timeout 10m;
    ssl_ciphers HIGH:!aNULL:!MD5;
    ssl_prefer_server_ciphers on;

    # Make sure the request body size is large enough (at least 512M). The choice of 512M was arbitrary
    # but it has to stay consistent throughout the server config, backend settings, and frontend JS.
    client_max_body_size 512M;

    location / {
        # The Vue router is in history mode, so views are named as separate pages like `/clubs`
        # which don't take up files, so those should be taken to `/index.html` and handled there
        try_files $uri $uri/ /index.html;
    }

    location ~ \.php$ {
        try_files $uri /index.html;
        # PHP-FPM Unix socket file location
        # e.g., set `listen = /var/run/php-fpm/php-fpm.sock` in `/etc/php-fpm.d/www.conf`
        fastcgi_pass unix:/var/run/php-fpm/php-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Ignore .htaccess, if one exists
    location ~ /\.ht {
        deny all;
    }
}
```

Additionally, make sure that nginx or Apache has access to the PHP session save path, which is needed for login. Also make sure they have access to the repo directory. For example:
```sh
sudo chmod -R a+rw [path to PHP session save path, e.g. /var/lib/php/session/]
sudo chmod -R a+rw [path to portal-redesign]
```

## Test on Local
To test the PHP on `localhost`, run
```sh
php --server localhost:[port]
```
Then visit `http://localhost:[port]` for dashboard or `http://localhost:[port]/login.php` to access admin portal.

## API Documentation
### GET `login.php`
**Returns**: Login page

### POST `login.php`
**Form**:

```
username: <username>
password: <password>
```

**Returns**:

> if correct

**302** Redirect to `/admin.php`

> else

**401** Login page

### GET `admin.php`
**Returns**:

> if logged in

**200** Admin portal page

> else

**302** Redirect to `/login.php`

### POST `files.php`
**Form**:

```
name: "attachments[]"
```

**Returns**:

> if good request

**200**
```
{
    "attachment 1.pptx": "<upload time e.g. Oct 8 13:07 or Jan 14 09:29>",
    "attachment 2.pdf": "<upload time>",
    "attachment 3.docx": "<upload time>"
}
```

> else

**400** Error message

### POST `remove.php`
**Form**:

```
name: "attachments[]"
filename: <name of file to remove>
```

**Returns**:

> if logged in
>> if good request

**200**

>> else

**400** Error message

> else

**401**

### POST `upload.php`
**Form**:

```
bulletin: <daily bulletin PDF>,
```
or
```
news: <news & updates PDF>
```
or
```
attachments[]: <attachment 1.pptx>
attachments[]: <attachment 2.pdf>
attachments[]: <attachment 3.docx>
...
```

**Returns**:

> if logged in

**200** Upload times (in JSON):

>> if uploaded `bulletin` or `news`

```
"<upload time (e.g. Oct 8 13:07 or Jan 14 09:29)>"
```

>> else if uploaded `attachments[]`

```
{
    "attachment 1.pptx": "<upload time>",
    "attachment 2.pdf": "<upload time>",
    "attachment 3.docx": "<upload time>"
}
```

>> else

**400**

> else

**401**
