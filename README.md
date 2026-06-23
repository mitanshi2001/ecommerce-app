# Luxe eCommerce

Luxe eCommerce is a full-featured, modern, and highly responsive web application built from the ground up using **Laravel** and **Tailwind CSS**. It provides a robust shopping experience for customers and a comprehensive management panel for administrators.

## Technologies Used

- **Backend:** Laravel 10 (PHP)
- **Frontend Styling:** Tailwind CSS
- **Templating Engine:** Laravel Blade
- **Authentication:** Laravel Breeze (Session-based Auth)
- **Database:** MySQL

---

## Features

### Security & Authentication
- **Role-Based Access Control:** Distinct `admin` and `customer` roles.
- **Secure Login:** Handled via Laravel Breeze with custom `AdminMiddleware` to safeguard the admin panel.

### Admin Panel
- **Dashboard:** At-a-glance metrics for total products, categories, customers, and recent orders.
- **Category Management:** Full CRUD (Create, Read, Update, Delete) functionality for product categories.
- **Product Management:** Full CRUD functionality for products, including image uploads, pricing, and stock quantity.
- **Order Management:** View complete customer order details (billing & shipping) and update order statuses (`Pending`, `Processing`, `Completed`).

### Storefront (Customer Facing)
- **Sleek UI:** Modern landing page with a hero section and responsive product grids using Tailwind CSS glassmorphism and gradients.
- **Product Discovery:** Browse all categories or view products under a specific category. Includes detailed single product pages.
- **Dynamic Shopping Cart:** Add items to the cart, update quantities, or remove items. Includes a dynamic, real-time cart item count badge on the navigation bar.
- **Checkout Flow:** A seamless checkout form for entering billing and shipping information, along with an order summary (Cash on Delivery format with no online payments required).

### Dummy Data (Testing)
- Contains realistic AI-generated dummy data (e.g., Headphones, Smartwatches, Action Cameras, Leather Jackets) complete with corresponding AI-generated high-quality images.
- Seeded easily through Laravel's `DatabaseSeeder`.

---

## Installation & Setup

1. **Clone or setup the project directory:**
   Navigate to the project root directory.

2. **Install Dependencies:**
   ```bash
   composer install
   npm install
   npm run build
   ```

3. **Environment Setup:**
   Ensure your `.env` file is properly configured with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ecom_22
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Run Migrations & Seeder:**
   Create the database tables and populate the dummy data:
   ```bash
   php artisan migrate:fresh --seed
   ```

5. **Link Storage (For Images):**
   Ensure product images load correctly on the frontend:
   ```bash
   php artisan storage:link
   ```

6. **Serve the Application:**
   ```bash
   php artisan serve
   ```
   The application will be available at `http://localhost:8000`.

---

## Default Credentials

To test the **Admin Panel**, use the following credentials:
- **Email:** `admin@admin.com`
- **Password:** `password`

To test the **Customer Storefront**, you can simply register a new account on the frontend.
