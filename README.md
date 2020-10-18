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

>> (else)

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

>> (if uploaded `bulletin` or `news`)

```
"<upload time (e.g. Oct 8 13:07 or Jan 14 09:29)>"
```

>> (else if uploaded `attachments[]`)

```
{
    "attachment 1.pptx": "<upload time>",
    "attachment 2.pdf": "<upload time>",
    "attachment 3.docx": "<upload time>"
}
```

>> (else)

400 Bad Request, empty body

> (else)

302 redirect to `/login.php`
