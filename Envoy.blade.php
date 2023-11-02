@servers(['web' => ['user@45.76.181.29']])

@task('deploy', ['on' => 'web'])
cd /var/www/api-address
git pull origin main
composer install --optimize-autoloader --no-dev
php artisan cache:clear
php artisan view:cache
php artisan optimize
@endtask
