FROM php:7.4-fpm

RUN docker-php-ext-install pdo_mysql \
    && curl -L -o /tmp/redis.tar.gz https://github.com/phpredis/phpredis/archive/5.3.6.tar.gz \
    && tar xfz /tmp/redis.tar.gz \
    && rm -r /tmp/redis.tar.gz \
    && mkdir -p /usr/src/php/ext \
    && mv phpredis-5.3.6 /usr/src/php/ext/redis \
    && docker-php-ext-install redis

 
# 修改php.ini配置, 将当前目录下的./conf.d/error.ini文件，复制到docker容器中的/usr...目录下
# COPY ./conf.d/error.ini /usr/local/etc/php/conf.d


# 其它扩展安装示例
#RUN curl -fsSL 'https://xcache.lighttpd.net/pub/Releases/3.2.0/xcache-3.2.0.tar.gz' -O xcache.tar.gz \
#    && mkdir -p xcache \
#    && tar -xf xcache.tar.gz -C xcache --strip-components=1 \
#    && rm xcache.tar.gz \
#    && ( \
#    cd xcache \
#    && phpize \
#    && ./configure --enable-xcache \
#    && make -j$(nproc) \
#    && make install \
#    ) \
#    && rm -r xcache \
#    && docker-php-ext-enable xcache

#RUN cd /usr/local/etc/php/conf.d vi upload.ini
#upload_max_filesize=100M