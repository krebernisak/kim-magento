FROM ubuntu:13.04

MAINTAINER Kristijan Rebernisak <kristijan.rebernisak@gmail.com>

# Install packages
RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get -y install supervisor apache2 php5 php5-mhash php5-mcrypt php5-curl php5-cli php5-mysql php5-gd

# Increase PHP memory_limit = 512M
ADD docker/php.ini /etc/php5/apache2/php.ini
ADD docker/apache_default /etc/apache2/sites-available/default
ADD docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Enable Apache rewrite module
RUN a2enmod rewrite

# Bundle app source
RUN mkdir -p /app && rm -fr /var/www && ln -s /app /var/www
ADD . /app

RUN cd app/ && chown -R www-data .
RUN cd app/ && find . -type d -exec chmod 700 {} \;
RUN cd app/ && find . -type f -exec chmod 600 {} \;

EXPOSE 80

CMD ["/usr/bin/supervisord"]
