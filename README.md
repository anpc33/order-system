# Hexigon Order System

Hexigon Order System là ứng dụng web quản lý đơn hàng hiện đại, xây dựng bằng **Laravel 12**, **Livewire 3**, **Vite** và **Pusher** cho realtime. Hệ thống hỗ trợ phân quyền Admin/User, quản lý sản phẩm, danh mục, người dùng, đơn hàng và cập nhật trạng thái đơn hàng realtime.

---

## 🚀 Tính năng nổi bật

- **Phân quyền:**  
  - **Admin:** Quản lý người dùng, sản phẩm, danh mục, đơn hàng.
  - **User:** Đặt hàng, xem lịch sử, hủy đơn khi chưa xác nhận.

- **Quản lý sản phẩm & danh mục:**  
  - Thêm, sửa, xóa sản phẩm/danh mục.
  - Phân loại sản phẩm theo danh mục.

- **Quản lý người dùng:**  
  - Thêm, sửa, xóa người dùng (chỉ admin).
  - Gán vai trò qua trường `role` hoặc `role_id` (1 = admin).

- **Quản lý đơn hàng:**  
  - Đặt hàng với địa chỉ, phương thức thanh toán.
  - Admin tìm kiếm, lọc, cập nhật trạng thái đơn hàng.
  - Trạng thái: `pending`, `confirmed`, `shipped`, `completed`, `cancelled`.

- **Realtime cập nhật trạng thái:**  
  - Khi admin đổi trạng thái đơn hàng, user thấy cập nhật ngay (không cần reload) nhờ **Pusher** + **Livewire broadcasting**.

- **Giao diện responsive:**  
  - Thiết kế hiện đại, tự động ẩn/hiện menu theo vai trò.

---

## 🛠️ Hướng dẫn cài đặt

### 1. Clone dự án
```bash
git clone https://github.com/anpc33/order-system
cd hexigon-order-system
```

### 2. Cài đặt backend
```bash
composer install
cp .env.example .env
php artisan key:generate
```
- Cấu hình database trong file `.env`.

### 3. Cài đặt frontend
```bash
npm install
```

### 4. Cấu hình Pusher cho realtime
- Đăng ký tài khoản tại [Pusher](https://pusher.com/) và tạo app mới.
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

### 5. Khởi tạo database & dữ liệu mẫu
```bash
php artisan migrate --seed
```

### 6. Chạy ứng dụng
```bash
php artisan serve
```
Truy cập: [http://localhost:8000](http://localhost:8000)

---

## 👤 Tài khoản test

**Admin:**
- Email: `admin@example.com`
- Mật khẩu: `password`

**User:**
- Email: `user@example.com`
- Mật khẩu: `password`

*(Bạn có thể thay đổi thông tin này trong các file seeder hoặc database)*

---

## 🧪 Hướng dẫn test nhanh

1. Đăng nhập bằng tài khoản admin để truy cập dashboard quản trị.
2. Thêm/sửa/xóa sản phẩm, danh mục, người dùng.
3. Đăng nhập bằng tài khoản user để đặt hàng, xem lịch sử, thử hủy đơn.
4. Đăng nhập lại admin để cập nhật trạng thái đơn hàng, quan sát user thấy trạng thái thay đổi realtime.

---

## 🛠️ Công nghệ sử dụng

- Laravel 12
- Livewire 3
- Vite
- TailwindCSS
- Pusher (Realtime Broadcasting)
- MySQL/MariaDB

---

## 💡 Đóng góp

- Fork repo, tạo branch mới và gửi pull request cho tính năng mới hoặc sửa lỗi.
- Nếu có ý kiến hoặc bug, hãy mở issue.

---

## 📄 License

Dự án được phát hành theo giấy phép [MIT license](https://opensource.org/licenses/MIT).
