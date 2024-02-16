git clone "url"
composer install
.env  --change the database name here
php artisan key:generate
php artisan config:cache
php artisan migrate
php artisan serve