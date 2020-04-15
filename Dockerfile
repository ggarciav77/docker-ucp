FROM debian:buster-slim
RUN apt update && apt install apache2 libapache2-mod-php7.3 php7.3-xml php7.3-soap php7.3-mysql -y
COPY *.php /var/www/html/
COPY docker-php-entrypoint /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-php-entrypoint
COPY apache2-foreground /usr/local/bin/
RUN chmod +x /usr/local/bin/apache2-foreground
ENTRYPOINT ["docker-php-entrypoint"]
EXPOSE 80
CMD ["apache2-foreground"]
