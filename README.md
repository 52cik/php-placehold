# php-placehold

> php placeholder image generator

## Requirements

* PHP 5.4.0 or higher and GD library


## How to use

### Quick start

#### Run with built-in web server. 

```sh
$ php -S l:8080 index.php
```

#### Or run with apache/nginx server.

> 1. Copy this folder and all of its contents to your web root directory.
> 2. Set up the rewrite rules for your web server (see below).

Nginx rewrites:

```nginx
location / {
  try_files $uri $uri/ /index.php?$args;
}
```

Apache rewrites:

```apache
RewriteEngine on
# If a directory or a file exists, use the request directly
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
# Otherwise forward the request to index.php
RewriteRule . index.php
```

## Examples

```html
<img src="/50">
<img src="/50x80">

<img src="/50x80/eee">
<img src="/50x80/eee/999">

<img src="/200.jpg">
<img src="/10x20.png">
<img src="/10x20/eee.gif">
<img src="/10x20/eee/aaa.png">

<img src="/200?text=hello world">
<img src="/10x20/eee/aaa?text=hello world">
<img src="/10x20/eee/aaa.png?text=hello world">
```


## License

MIT
