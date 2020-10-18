# portal-redesign

## Run Local
```sh
php --server localhost:<port> --php-ini php.ini
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

> (if correct)

302 redirect to `/admin.php`

> (else)

Login page

### GET `admin.php`
**Returns**:

> (if logged in)

Admin portal page

> (else)

302 redirect to `/login.php`

### POST `remove.php`
**Form**:

```
name: "attachments[]"
filename: <name of file to remove>
```

**Returns**:

> (if logged in)
>> (if good request)

200 OK, empty body

>> (if bad request)

400 Bad Request, with error message

> (else)

302 redirect to `/login.php`

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

> (if logged in)

200 OK, body (in JSON):
```
{
    "bulletin": "<upload time>"
}
```
or
```
{
    "news": "<upload time>"
}
```
or
```
{
    "attachment 1.pptx": "<upload time>",
    "attachment 2.pdf": "<upload time>",
    "attachment 3.docx": "<upload time>"
}
```
Time is in a format like `Oct 8 13:07` or `Jan 14 09:29`.

> (else)

302 redirect to `/login.php`
