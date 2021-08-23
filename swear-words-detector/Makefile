placeholder:
	@echo "------------------------------------------------------------------"
	@echo "| COMMAND            | DESCRIPTION                               |"
	@echo "------------------------------------------------------------------"
	@echo "| init               | Up from the ground                        |"
	@echo "| start              | Up all docker containers                  |"
	@echo "| stop               | Down all docker containers                |"
	@echo "| restart            | Restart all docker containers             |"
	@echo "| ------------------ | ----------------------------------------- |"
	@echo "| phpcs              | Run phpcs                                 |"
	@echo "| psalm              | Run psalm                                 |"
	@echo "| ecs                | Object Calisthenics rules                 |"
	@echo "| php-test           | Run phpunit tests                         |"
	@echo "| pre-commit         | Run all analyze utils and test            |"

init:
	cd ./docker && docker-compose down -v --remove-orphans
	cd ./docker && docker-compose pull
	cd ./docker && docker-compose build
	cd ./docker && docker-compose up -d

start:
	cd ./docker && docker-compose up -d

stop:
	cd ./docker && docker-compose down

restart: stop start

phpcs:
	docker/scripts/php "vendor/bin/phpcs --standard=PSR12 src/"
	@echo "phpcs done"

psalm:
	docker/scripts/php "vendor/bin/psalm"
	@echo "psalm done"

ecs:
	docker/scripts/php "vendor/bin/ecs check src"
	@echo "ecs done"

rector:
	docker/scripts/php "vendor/bin/rector process src"
	@echo "rector done"

php-test:
	docker/scripts/php "vendor/bin/phpunit"

pre-commit: phpcs psalm ecs php-test
	@: