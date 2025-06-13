#  Order System

Hexigon Order System is a modern web application for managing orders, products, categories, and users, built with **Laravel 12**, **Livewire 3**, and **Pusher** for real-time updates. The system supports both admin and user roles, providing a seamless experience for e-commerce order management.

---

## Features

### User Roles
- **Admin**: Full management of users, products, categories, and orders.
- **User**: Place orders, view order history, and cancel orders before confirmation.

### Product & Category Management
- Add, edit, and delete products and categories.
- Organize products by categories.

### User Management
- Add, edit, and delete users (admin only).
- Assign roles via the `role` or `role_id` field (1 = admin).

### Order Management
- Place orders with address and payment method selection.
- Admin can view, search, filter, and update order statuses.
- Order statuses: `pending` (awaiting confirmation), `confirmed`, `shipped`, `completed`, `cancelled`.

### Real-time Order Status Updates
- When an admin updates an order status, users see the change instantly (no reload needed) via **Pusher** and **Livewire broadcasting**.

### Responsive UI
- Clean, modern, and responsive design.
- Dynamic menu based on user role: admin sees all management options, users see only relevant options.

---

## Getting Started

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/hexigon-order-system.git
cd hexigon-order-system
```

### 2. Install Backend Dependencies
```bash
composer install
cp .env.example .env
php artisan key:generate
```
- Configure your database in `.env`.

### 3. Install Frontend Dependencies
```bash
npm install
```

### 4. Configure Pusher for Real-time
- Register at [Pusher](https://pusher.com/) and create a new app.
- Add your Pusher credentials to `.env`:
  ```env
  BROADCAST_DRIVER=pusher
  VITE_PUSHER_APP_KEY=your_key
  VITE_PUSHER_APP_CLUSTER=your_cluster
  PUSHER_APP_ID=your_app_id
  PUSHER_APP_KEY=your_key
  PUSHER_APP_SECRET=your_secret
  PUSHER_APP_CLUSTER=your_cluster
  ```
- Rebuild frontend:
  ```bash
  npm run dev
  ```

### 5. Migrate the Database
```bash
php artisan migrate
```

### 6. Run the Application
```bash
php artisan serve
```
Visit: [http://localhost:8000](http://localhost:8000)

---

## Demo Accounts

- **Admin:**  
  Email: admin@example.com  
  Password: password

- **User:**  
  Email: user@example.com  
  Password: password

*(Update these credentials based on your seeders or database setup)*

---

## Technologies Used
- Laravel 12
- Livewire 3
- TailwindCSS
- Pusher (Realtime Broadcasting)
- MySQL/MariaDB

---

## Contribution
- Fork this repository, create a new branch, and submit a pull request for new features or bug fixes.
- Please open an issue for suggestions or bug reports.

---

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
