FROM tutum/lamp:latest

MAINTAINER Kristijan Rebernisak <kristijan.rebernisak@gmail.com>

ADD docker/apache_default /etc/apache2/sites-available/000-default.conf

RUN rm -fr /app

# Bundle app source
ADD . /app

# Add volume for app
VOLUME  ["/app"]

EXPOSE 80 3306
CMD ["/run.sh"]
