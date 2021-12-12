# Server of QuanLyBanHang's application
# demo
 MangMT Project - 3rd Year

# Create new database

1. trường hợp muốn nâng phiên bản database hiện tại
```
php artisan migrate
```
2. trường hợp muốn tạo mới lại hoàn toàn *bỏ toàn bộ các bảng hiện có và tạo lại hoàn toàn*
```
php artisan migrate:fresh
```
2. thêm dữ liệu mẫu cho database
```
php artisan db:seed
```
hoặc
```
php artisan migrate:fresh --seed
```
# Github workflow

- Khi bắt đầu dự án cần fork repo **minhquanhbt/MangmtPrj** về
- Tiếp đó tiên hành clone code từ repo đã fork nói trên **[username]/MangmtPrj**
- Sau khi clone sẽ di chuyển vào folder vừa clone để add thêm repo chính của dự án **minhquanhbt/MangmtPrj** với lệnh sau nếu sử dụng SSH key:
```
git remote add origin git@github.com:minhquanhbt/MangmtPrj.git
```
hoặc nếu sử dụng https
```
git remote add origin https://github.com/minhquanhbt/MangmtPrj.git
```
- Branch chính của dự án là **main**
- Mỗi tính năng mới hoặc bug fix mới sẽ làm theo flow như sau
1. Đảm bảo code mới nhất ở nhánh develop dưới local tương đương với nhánh mới nhất trên server bằng cách chạy 2 lệnh:
```
git checkout main
git pull origin main
```

2. Checkout một nhánh mới cho tính nắng cần làm

```
git checkout -b feat/login
```

3. Sau khi code xong tiến thành commit code
```
git add .
git commit -m "feat: login"
```

4. Giả sử sau khi code xong tính năng login trong nhánh *feat/login* nói trên và gửi chuẩn bị gửi pull request mà thấy branch main trên server có code mới của các bạn khác thì cần chạy lệnh như sau trước khi tạo pull request:
```
git checkout main
git pull origin main
git checkout feat/login
git rebase main
```
*Sau khi rebase phát hiện có conflict thì chủ động xử lý

*Trường hợp nếu nhánh main trên repo chính không có code mới thì có thể bỏ qua bước 4

5. Push nhánh **feat/login** vừa làm lên repo fork về:
```
git push origin feat/login
```

6. Tạo pull request từ branch nói trên trong repo fork về đến branch develop trong repo chính

=> Quá trình nói trên được lặp lại trong toàn bộ chu trình phát triển của dự án
# Setup Laravel environment
```
APP_NAME=MangMTDemo
APP_ENV=local
APP_KEY=base64:xwCN4eLA9HcZjmnnzZzXZpATE4+oI3Yf3ag8OGyAs9Y=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=MMT
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=public
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```
