follow the commands to run application on your machine.
php version >=7.3 and composer should be installed.
1. composer install - to install the laravel dependencies
2. npm install - to install npm dependencies
3. cp .env.example .env
4. create database and add credentials in the .env file
5. php artisan migrate
6. php artisan storage:link
7. php artisan key:generate
8. php artisan serve - to run the application