FROM php:7-fpm-alpine

RUN echo "http://dl-cdn.alpinelinux.org/alpine/edge/testing" >> /etc/apk/repositories \
    && apk update \
    && apk upgrade \
    && apk add --no-cache git mysql-client curl openssh-client libevent libxslt libressl icu \
        libressl-dev libxml2-dev g++ make autoconf libxslt-dev libevent-dev icu-dev  \
    && docker-php-ext-install sockets \
    && pecl install \
      event \
      eio \
      xdebug \
      # redis \
      # mongodb \
    && docker-php-ext-enable \
      event \
      eio \
      xdebug \
    && docker-php-source extract \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install intl \
    && docker-php-ext-install zip \
    && docker-php-ext-install xsl \
    && docker-php-source delete \
    && echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.var_display_max_depth=100" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.var_display_max_children=256" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.var_display_max_data=1024" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_host=172.19.0.1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && apk del --no-cache --purge libressl-dev libxml2-dev g++ make autoconf libxslt-dev libevent-dev icu-dev \
    && mv /usr/local/etc/php/conf.d/docker-php-ext-event.ini /usr/local/etc/php/conf.d/zz-docker-php-ext-event.ini \
    && rm -rf /tmp/*


# xdebug.remote_autostart = 1
# xdebug.remote_enable = 1
# xdebug.var_display_max_depth = 100
# xdebug.var_display_max_children = 256
# xdebug.var_display_max_data = 1024
# xdebug.idekey = "PHPSTORM"
# xdebug.remote_host = 127.0.0.1
# xdebug.remote_port = 9000
# xdebug.coverage_enable = 1
# xdebug.cli_color=1
# ;xdebug.show_exception_trace=1