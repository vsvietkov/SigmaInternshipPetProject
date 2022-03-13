APP := sigma-pet-api
CURRENT_ID=$(shell id -u)
DC := UID=$(CURRENT_ID) docker-compose

# Build the development environment
docker-build:
	@$(DC) build app

# Generate a unique Laravel application key
generate-key:
	@docker exec -it $(APP) sh -c "php artisan key:generate"

composer-install:
	@docker exec -it $(APP) sh -c "composer install"

composer-update:
	@docker exec -it $(APP) sh -c "composer update"

# Start a project
start:
	@$(DC) up -d

# Stop a project
stop:
	@$(DC) down

# Restart a project
restart: stop start
