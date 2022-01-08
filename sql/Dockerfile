FROM mysql:5.7

RUN apt-get update && apt-get install -y locales-all

ENV LANG ja_JP.UTF-8
ENV LANGUAGE ja_JP:ja
ENV LC_ALL ja_JP.UTF-8

COPY mysqld_charset.cnf /etc/mysql/conf.d/mysqld_charset.cnf