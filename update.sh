#auto update xflash

rm -rf composer.lock composer.phar
wget https://github.com/composer/composer/releases/latest/download/composer.phar -O composer.phar
php composer.phar update -vvv
sudo php artisan migrate
php artisan v2board:update
php artisan config:cache
php artisan config:clear

if [ -f "/etc/init.d/bt" ]; then
  chown -R www $(pwd);
fi