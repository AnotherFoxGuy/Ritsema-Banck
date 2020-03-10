FROM php:apache

RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN rm -rfv /var/www/html/
COPY ritsema-banck.conf /etc/apache2/sites-available/000-ritsema-banck.conf
COPY intranet.ritsema-banck.conf /etc/apache2/sites-available/intranet.ritsema-banck.conf
RUN a2enmod ldap authnz_ldap
RUN a2dissite 000-default.conf
RUN a2ensite 000-ritsema-banck.conf intranet.ritsema-banck.conf
