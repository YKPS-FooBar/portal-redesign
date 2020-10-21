# portal-redesign

This is the backend with built frontend files included, running on PHP.

## Preparation

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

#### Example Apache
```apache
# Modules for PHP and `mod_rewrite` are required:
LoadModule rewrite_module [your mod_rewrite.so location]
LoadModule php5_module [your libphp5.so location]  # (php7 also works)

# Set `DocumentRoot` to where this repo is at, e.g.:
DocumentRoot "/home/thomas/portal-redesign"
<Directory "/home/thomas/portal-redesign">
    Require all granted
</Directory>

# Handle .php files using PHP handler
<FilesMatch \.php$>
    SetHandler application/x-httpd-php
</FilesMatch>

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
```

Other configs are handled by `.htaccess`.

#### Example nginx with PHP-FPM
```nginx
server {
    listen       80;
    listen       [::]:80;

    # Server name
    server_name  go.myykps.cn;

    # Upgrade to HTTPS
    return 301 https://domain.com$request_uri;
}

server {
    listen       443 ssl;
    listen       [::]:443 ssl;

    # Server name
    server_name  go.myykps.cn;

    # Where you place this repo
    root /home/thomas/portal-redesign;

    # SSL settings; change to your certificate and key location
    ssl_certificate /etc/pki/nginx/server.crt;
    ssl_certificate_key /etc/pki/nginx/private/server.key;
    ssl_session_cache shared:SSL:1m;
    ssl_session_timeout 10m;
    ssl_ciphers HIGH:!aNULL:!MD5;
    ssl_prefer_server_ciphers on;

    # Make sure the request body size is large enough (at least 512M)
    # The choice of 512M was arbitrary
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
}
```

Additionally, make sure that nginx or Apache has access to the PHP session save path, which are needed for login. For example:
```sh
sudo chown -R nginx:nginx /var/lib/php/session/
```
assuming PHP session save path is `/var/lib/php/session/`. Sessions are needed by YKPS Portal for admin login.

Also, make sure they have read access to this repo directory.

## Run Local
```sh
php --server localhost:<port>
```
Then visit `http://localhost:<port>` for dashboard or `http://localhost:<port>/login.php` to access admin portal.

## API
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
