build:
	docker-compose build

build-nocache:
	docker-compose build --no-cache

up:
	docker-compose up -d

bash:
	docker exec -it php-apache /bin/bash

composer:
	docker exec -it php-apache /bin/bash -c 'cd /var/www && composer install'

down:
	docker-compose down