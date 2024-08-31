### After cloning repository run these commands.
````
composer install
````
````
copy .env.example .env
````
````
set DB_DATABASE, DB_USERNAME and DB_PASSWORD in .env file
````
````
set mail configs in .env file
````
````
php artisan migrate
````
````
php artisan db:seed
````
````
npm install
````
````
npm run build
````
````
php artisan serve
````
````
user email - test@example.com
user password - password
````
````
To send notifications you should run

php artisan schedule:work
php artisan queue:work
````
````
