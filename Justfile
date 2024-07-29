init:
	composer install
	cp .env.example .env
	php artisan key:generate

run:
	php artisan serve
