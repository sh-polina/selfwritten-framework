DOCKER_DIR = docker

.PHONY: install start stop terminal

install:
	cd $(DOCKER_DIR) && docker compose up --build -d

start:
	cd $(DOCKER_DIR) && docker compose start

stop:
	cd $(DOCKER_DIR) && docker compose stop

terminal:
	cd $(DOCKER_DIR) && docker compose exec -it php-fpm /bin/bash

cs-fixer:
	cd $(DOCKER_DIR) && docker compose exec php-fpm vendor/bin/php-cs-fixer fix /app