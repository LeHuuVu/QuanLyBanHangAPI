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
