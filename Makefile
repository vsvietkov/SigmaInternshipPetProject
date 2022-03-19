APP_API    := sigma-pet-api
APP_FRONT  := sigma-pet-front
CURRENT_ID := $(shell id -u)
DC         := UID=$(CURRENT_ID) docker-compose
# Build the frontend environment
docker-build-front:
	@$(DC) build front
# Build the api environment
docker-build-api:
	@$(DC) build api
# Build the development environment
docker-build: docker-build-front docker-build-api
# Install npm dependencies
npm-install:
	@docker run --rm -v ${PWD}/pet-project-front/:/var/www/ -w /var/www/ $(APP_FRONT) npm install
# Update npm dependencies
npm-update:
	@docker run --rm -v ${PWD}/pet-project-front/:/var/www/ -w /var/www/ $(APP_FRONT) npm update
# Generate a unique Laravel application key
generate-key:
	@docker exec -it $(APP) sh -c "php artisan key:generate"
# Install composer dependencies
composer-install:
	@docker run --rm -v ${PWD}/pet-project-back/:/var/www/ -w /var/www/ $(APP_API) composer install
# Update composer dependencies
composer-update:
	@docker run --rm -v ${PWD}/pet-project-back/:/var/www/ -w /var/www/ $(APP_API) composer update
# Start a project
start:
	@$(DC) up -d
# Stop a project
stop:
	@$(DC) down
# Restart a project
restart: stop start
# Enter the front shell
enter-front:
	@docker exec -it $(APP_FRONT) sh
# Enter the api shell
enter-api:
	@docker exec -it $(APP_API) sh
