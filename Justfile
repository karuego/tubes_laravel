init:
	composer install
	cp .env.example .env
	php artisan key:generate
	php artisan migrate

run:
	php artisan serve
