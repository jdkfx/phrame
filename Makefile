.PHONY: php

build:
	docker-compose build

build-nocache:
	docker-compose build --no-cache

up:
	docker-compose up -d

php:
	docker exec -it php-apache /bin/bash -c 'cd /var/www && exec bash'

mysql:
	docker exec -it mysql mysql -u root -p

composer:
	docker exec -it php-apache /bin/bash -c 'cd /var/www && composer install'

migrate:
	docker exec -it php-apache /bin/bash -c 'cd /var/www && php app/Migrations/migrate.php migrate'

rollback:
	docker exec -it php-apache /bin/bash -c 'cd /var/www && php app/Migrations/migrate.php rollback'

down:
	docker-compose down