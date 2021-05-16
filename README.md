# Simple REST Routing
This is a small, experimental project template for a simple REST APIs.

There are some cases that you don't want to use a beast such as Laravel, Symphony 2 or CodeIgniter. They are great, but it feels like you're using a sledgehammer to crack a nut.

This only maps a combination of URL and HTTP method to an specific PHP file.

## Routing
Each endpoint is mapped to a file, this is done through rewrite rules on Apache, IIS or Nginx.

It is fast because there is no overhead on registering routes and matching one.
The disavantage is that you have to manually deal with request parsing, database handling, etc.

### Matching Priority
Matching files, in order of priority:
1. **path**/index.**method**.php
2. **path**.**method**.php
3. **path**/index.php
4. **path**.php

For the method being `GET` and the path being `/api/users/me`, it will try to rewrite to the first existing file:
1. /api/users/me/index.get.php
2. /api/users/me.get.php
3. /api/users/me/index.php
4. /api/users/me.php

### File Structure Example

```
└── api/
    ├── auth/
    │   ├── login.post.php				POST   /api/auth/login
    │   ├── logout.post.php				POST   /api/auth/logout
    │   └── change-password.post.php	POST   /api/auth/change-password
    ├── users/
    │   ├── index.get.php				GET    /api/users
    │   ├── index.post.php				POST   /api/users
    │   ├── index.put.php				PUT    /api/users
    │   ├── index.delete.php			DELETE /api/users
    │   └── me.get.php					GET    /api/users/me
    └── tasks/
        ├── index.get.php				GET    /api/tasks
        └── index.post.php				POST   /api/tasks
```

## Server Config

### Apache or LiteSpeed
Copy the `.htaccess` file to the root directory your REST API is located.

### IIS
Copy the `web.config` file to the root directory your REST API is located.

### Nginx

Edit the Nginx config file, adding the following directive in `server`:
```
location / {
    try_files $uri
              $uri/index.$request_method.php?$args
              $uri.$request_method.php?$args
              $uri/index.php?$args
              $uri.php?$args;
}
```
You can change the `/` to the directory where your REST API is located.

## Other Packages
These are some packages you can use along with this library:

* [PSR-7 Implementation](https://github.com/Nyholm/psr7) - Allows you to handle requests and responses using PSR-7 compliant objects.
* [FluentPDO](https://github.com/envms/fluentpdo) - Allows you to build SQL queries.
