#  Order System (v2)

 Order System là ứng dụng web hiện đại quản lý đơn hàng, sản phẩm, danh mục và người dùng, xây dựng với **Laravel 12**, **Livewire 3**, **TailwindCSS** và **Pusher** cho realtime. Hệ thống hỗ trợ phân quyền (admin/user), giao diện responsive và cập nhật trạng thái đơn hàng theo thời gian thực.

---

## 🚀 Demo Production

👉 [Dùng thử tại đây (Production)](https://order-system-production-bd9c.up.railway.app)

---

## 📸 Ảnh Demo

### Giao diện Dashboard (Desktop)
<img src="docs/dashboard-desktop.png" width="800"/>

### Giao diện Dashboard (Mobile)
<img src="docs/dashboard-mobile.png" width="350"/>

### Thêm sản phẩm mới
<img src="docs/add-product.png" width="800"/>

### Quản lý người dùng
<img src="docs/user-management.png" width="800"/>

---

## Tính năng nổi bật

- **Phân quyền:**  
  - **Admin:** Quản lý toàn bộ người dùng, sản phẩm, danh mục, đơn hàng.
  - **User:** Đặt hàng, xem lịch sử, hủy đơn trước khi xác nhận.

- **Quản lý sản phẩm & danh mục:**  
  - Thêm, sửa, xóa sản phẩm/danh mục.
  - Sắp xếp sản phẩm theo danh mục.

- **Quản lý người dùng:**  
  - Thêm, sửa, xóa người dùng (admin).
  - Gán quyền qua trường `role` hoặc `role_id` (1 = admin).

- **Quản lý đơn hàng:**  
  - Đặt hàng với địa chỉ, phương thức thanh toán.
  - Admin tìm kiếm, lọc, cập nhật trạng thái đơn.
  - Trạng thái: `pending`, `confirmed`, `shipped`, `completed`, `cancelled`.

- **Realtime (Pusher + Livewire):**  
  - Khi admin cập nhật trạng thái đơn, user thấy ngay không cần reload.

- **Giao diện responsive:**  
  - Thiết kế hiện đại, menu động theo quyền.

---

## Hướng dẫn cài đặt

### 1. Clone dự án
```bash
git clone https://github.com/your-username/hexigon-order-system.git
cd hexigon-order-system
```

### 2. Cài đặt backend
```bash
composer install
cp .env.example .env
php artisan key:generate
```
- Cấu hình database trong `.env`.

### 3. Cài đặt frontend
```bash
npm install
```

### 4. Cấu hình Pusher realtime
- Đăng ký [Pusher](https://pusher.com/) và tạo app mới.
- Thêm thông tin vào `.env`:
  ```env
  BROADCAST_DRIVER=pusher
  VITE_PUSHER_APP_KEY=your_key
  VITE_PUSHER_APP_CLUSTER=your_cluster
  PUSHER_APP_ID=your_app_id
  PUSHER_APP_KEY=your_key
  PUSHER_APP_SECRET=your_secret
  PUSHER_APP_CLUSTER=your_cluster
  ```
- Build lại frontend:
  ```bash
  npm run build
  ```

### 5. Khởi tạo database
```bash
php artisan migrate --seed
```

### 6. Tạo symlink để truy cập ảnh upload
```bash
php artisan storage:link
```

### 7. Chạy ứng dụng
```bash
php artisan serve
```
Truy cập: [http://localhost:8000](http://localhost:8000)

---

## Tài khoản demo

- **Admin:**  
  Email: admin@example.com  
  Password: password

- **User:**  
  Email: user@example.com  
  Password: password

*(Cập nhật lại nếu bạn thay đổi seed hoặc dữ liệu)*

---

## Công nghệ sử dụng
- Laravel 12
- Livewire 3
- TailwindCSS
- Pusher (Realtime)
- MySQL/MariaDB

---

## Đóng góp & Liên hệ

- Fork repo, tạo branch mới và gửi pull request nếu muốn đóng góp.
- Mở issue nếu có đề xuất hoặc báo lỗi.
- Liên hệ qua [LinkedIn/GitHub của bạn] nếu cần trao đổi thêm.

---
















> Đổi tên file ảnh trong README cho đúng với tên file thực tế bạn đã upload.> Để ảnh hiển thị trên GitHub, hãy đặt các file ảnh vào thư mục `docs/` hoặc `public/images/` và commit cùng repo.  > **Lưu ý:**  ---👉 [https://order-system-production-bd9c.up.railway.app](https://order-system-production-bd9c.up.railway.app)**Phiên bản: v2 - Đã deploy production, sẵn sàng cho nhà tuyển dụng test tại:**  ---Dự án sử dụng giấy phép [MIT license](https://opensource.org/licenses/MIT).## License## License

Dự án sử dụng giấy phép [MIT license](https://opensource.org/licenses/MIT).

---

**Phiên bản: v2 - Đã deploy production, sẵn sàng cho nhà tuyển dụng test tại:**  
👉 [https://order-system-production-bd9c.up.railway.app](https://order-system-production-bd9c.up.railway.app)

---

> **Lưu ý:**  
> Để ảnh hiển thị trên GitHub, hãy đặt các file ảnh vào thư mục `docs/` hoặc `public/images/` và commit cùng repo.  
> Đổi tên file ảnh trong README cho đúng với tên file thực tế bạn đã upload.
