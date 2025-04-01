# jdkfx/phrame

自作MVCフレームワーク

## 環境について

### Docker
Docker version 28.0.1

### PHP
PHP 8.4.5 (cli)

## Getting Started

### リポジトリをクローン
```
$ git clone
```

### .env の複製
```
$ cp .env.sample .env
```

### Dockerコンテナの立ち上げ
```
$ docker-compose build
$ docker-compose up -d
$ docker ps
```

### コンテナ内で composer install
```
$ docker exec -it phrame_php-apache_1 /bin/bash

/var/www/html# cd ../
/var/www# composer install
```
