FROM php:apache

COPY ritsema-banck.conf /etc/apache2/sites-available/ritsema-banck.conf
COPY intranet.ritsema-banck.conf /etc/apache2/sites-available/intranet.ritsema-banck.conf
RUN a2enmod ldap authnz_ldap
RUN a2ensite ritsema-banck.conf intranet.ritsema-banck.conf
