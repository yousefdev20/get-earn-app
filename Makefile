all: run_docker install_composer_dependencies generate_dot_env_file generate_app_key database_migration database_run_seeder delete_cache re_cache restart_docker print_remote_address_to_start

run_docker:
	docker-compose up -d --build

install_composer_dependencies:
	docker exec -it GetEarnApp composer install

generate_dot_env_file:
	docker exec -it GetEarnApp cp .env.example .env

generate_app_key:
	docker exec -it GetEarnApp php artisan key:generate

database_migration:
	docker exec -it GetEarnApp php artisan migrate
	docker exec -it GetEarnApp php artisan migrate --env=testing

database_run_seeder:
	docker exec -it GetEarnApp php artisan key:generate

delete_cache:
	docker exec -it GetEarnApp php artisan optimize:clear

re_cache:
	docker exec -it GetEarnApp php artisan view:cache
	docker exec -it GetEarnApp php artisan route:cache
	docker exec -it GetEarnApp php artisan event:cache
	docker exec -it GetEarnApp php artisan config:cache

restart_docker:
    docker-compose down && docker-compose up -d --build

print_remote_address_to_start:
	echo "http://localhost:86"
