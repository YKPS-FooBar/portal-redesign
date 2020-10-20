# portal-redesign

## Preparation

Make sure you have set at least
```
memory_limit = 512M
post_max_size = 512M
file_uploads = On
upload_max_filesize = 512M
max_file_uploads = 100
```
in `php.ini` to allow large uploads.

Also, make sure the request body size setting for your proxy (Apache, nginx, etc.) is large enough (at least 512M). For example,
```
client_max_body_size 512M;
```
in nginx `.conf`.

The choice of 512M was arbitrary, but it has to be consistent.

Additionally, make sure that PHP has access to sessions, which are needed for login.

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

**302** Redirect to `/login.php`

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

**302** Redirect to `/login.php`
