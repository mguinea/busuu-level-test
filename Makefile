PROJECT_NAME="busuu-level-test"
DOCKER_COMPOSE=docker-compose -p $(PROJECT_NAME) -f ./etc/docker/docker-compose.yml

## ----------------------
## Docker composer management
## ----------------------

.PHONY: build
build: ## Build the stack
	$(DOCKER_COMPOSE) build --no-cache

.PHONY: up
up: ## Environment up!
	$(DOCKER_COMPOSE) up -d --build --force-recreate --renew-anon-volumes

.PHONY: restart
restart: ## Restart environment.
	$(DOCKER_COMPOSE) restart

.PHONY: install-vendor
install-vendor:
	$(DOCKER_COMPOSE) run app composer install

.PHONY: update-vendor
update-vendor:
	$(DOCKER_COMPOSE) run app composer update

.PHONY: test
test:
	$(DOCKER_COMPOSE) run app php vendor/bin/phpunit tests/

.PHONY: destroy
destroy:
	$(DOCKER_COMPOSE) down --remove-orphans --volumes
	$(DOCKER_COMPOSE) rm --stop --volumes --force

.PHONY: logs
logs:
	$(DOCKER_COMPOSE) logs app

.PHONY: phpstan
phpstan:
	$(DOCKER_COMPOSE) run app vendor/bin/phpstan analyse -c phpstan.neon

## ----------------------
## Docker composer informational
## ----------------------

.PHONY: services
services:
	$(DOCKER_COMPOSE) ps

.PHONY: networks
networks:
	docker network ls

.PHONY: volumes
volumes:
	docker volume ls
