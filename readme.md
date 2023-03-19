- Copy file vào root web , cẩn thận nhớ backup vì không gì là chắc chắn
- Đã xóa v2board.php trong config, Resources đã fix lỗi Clash,Stash


- Hướng dẫn chạy lệnh: 

- Bước 1: Vào SSH Webserver: cd /www/wwwroot/webcuaban/
- Bước oải: sudo php artisan migrate
- Bước 2: composer dump-autoload
- Bước 3: php artisan db:seed --class=StatUserOnlineResetSeeder
- Bước 4: sudo php artisan reset:trafficServerLog
- Bước mệt: sudo php artisan repair:trafficServerLog
- Bước 5: sudo php artisan config:clear