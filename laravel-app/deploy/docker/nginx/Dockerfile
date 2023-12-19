FROM nginx:stable-alpine

RUN rm /etc/nginx/nginx.conf
RUN rm /etc/nginx/conf.d/default.conf

COPY ./ /var/www/html/

ADD ./deploy/docker/nginx/nginx.conf /etc/nginx/nginx.conf
ADD ./deploy/docker/nginx/default.conf /etc/nginx/conf.d/default.conf

