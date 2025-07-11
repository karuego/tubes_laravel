init:
	composer install
	cp .env.example .env
	php artisan key:generate
	php artisan migrate
	just link

link:
	php artisan storage:link

run:
	php artisan serve

fresh:
	php artisan migrate:fresh --seed
