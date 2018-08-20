# php-placehold

> php placeholder image generator

## Requirements

* PHP 5.4.0 or higher and GD library


## How to use

### Quick start

#### Run with built-in web server. 

```sh
$ php -S localhost:8080 index.php
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

### with docker

```sh
$ docker build -t php-placehold .
$ docker run -d -p 8000:8000 -h php-placehold --name php-placehold --restart=always php-placehold
```


## Examples

> http://localhost:8080/[size][/bgcolor][/color][.extname][?text=text]

* size - 200 or 200x100 to set the width and height.
* bgcolor - The CSS background-color property.
* color - The CSS color property.
* extname - The Picture type, support png, jpg, gif.
* text - The text information.

```html
<img src="http://localhost:8080/50">
<img src="http://localhost:8080/50x80">

<img src="http://localhost:8080/50x80/eee">
<img src="http://localhost:8080/50x80/eee/999">

<img src="http://localhost:8080/200.jpg">
<img src="http://localhost:8080/10x20.png">
<img src="http://localhost:8080/10x20/eee.gif">
<img src="http://localhost:8080/10x20/eee/aaa.png">

<img src="http://localhost:8080/200?text=hello world">
<img src="http://localhost:8080/10x20/eee/aaa?text=hello world">
<img src="http://localhost:8080/10x20/eee/aaa.png?text=hello world">
```

## License

MIT
