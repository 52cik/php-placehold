FROM php:7.2-alpine

RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
  docker-php-ext-configure gd \
    --with-gd \
    --with-freetype-dir=/usr/include/ \
    --with-png-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/ && \
  NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
  docker-php-ext-install -j${NPROC} gd && \
  apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

COPY . /app

WORKDIR /app

CMD ["php", "-S", "0.0.0.0:8000", "index.php"]

# docker build -t php-placehold .
# docker run -d -p 8000:8000 -h php-placehold --name php-placehold --restart=always php-placehold
