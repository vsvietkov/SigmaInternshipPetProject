APP := sigma-pet-front
CURRENT_ID=$(shell id -u)
DC := UID=$(CURRENT_ID) docker-compose

# Build the development environment
docker-build:
	@$(DC) build app

npm-install:
	@docker exec -it $(APP) sh -c "npm install"

npm-update:
	@docker exec -it $(APP) sh -c "npm update"

# Start a project
start:
	@$(DC) up -d

# Stop a project
stop:
	@$(DC) down

# Restart a project
restart: stop start
