APP_API := sigma-pet-api
APP_FRONT := sigma-pet-front
CURRENT_ID=$(shell id -u)
DC := UID=$(CURRENT_ID) docker-compose

# Build the development environment
docker-build-front:
	@$(DC) build front
docker-build-api:
	@$(DC) build api
docker-build: docker-build-front docker-build-api

npm-install:
	@docker exec -it $(APP_FRONT) sh -c "npm install"
npm-update:
	@docker exec -it $(APP_FRONT) sh -c "npm update"

composer-install:
	@docker exec -it $(APP_API) sh -c "composer install"
composer-update:
	@docker exec -it $(APP_API) sh -c "composer update"

# Start a project
start:
	@$(DC) up -d
# Stop a project
stop:
	@$(DC) down
# Restart a project
restart: stop start
