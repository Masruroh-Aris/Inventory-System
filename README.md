Project Overview

Masruroh Inventory System is a modern, web-based inventory and point-of-sale (POS) application designed to streamline product management, sales transactions, and reporting. Built with a vibrant and user-friendly interface, the system helps businesses maintain accurate stock records, process transactions efficiently, and monitor operational activities with ease.
The application supports multiple user roles (Admin, Warehouse, Cashier) to ensure secure access control and clear operational responsibilities.

Key Features ✨
1. Product Management
Full CRUD Operations: Add, edit, delete, and view product listings.
QR Code Generator: Automatically generate unique QR codes for each product, with options to view, download (PNG), or print.
Detailed Product Information: Display stock levels, price, category, and product code.

2. Stock Management
Inbound/Outbound Tracking: Record incoming stock (restock) and outgoing stock (sales, damaged items, etc.).
Real-Time Stock History: Monitor item movements with a complete and detailed log.
Stock Validation: Prevents transactions that exceed available stock.

3. Point of Sale (POS)
New Transactions: Responsive cashier interface for smooth and fast sales processing.
Camera-Based Barcode Scanner: Scan barcodes using the device camera to automatically add items to the cart.
Shopping Cart System: Supports multiple items per transaction with automatic total calculations.
Receipt Printing: Generate and print transaction receipts immediately after checkout.
Transaction History: Review past sales activities anytime.

4. Reporting
Transaction Reports: Administrators can view and print comprehensive transaction records.
Filtering & Sorting: Easily analyze sales data with built-in filters.

5. Modern UI/UX
Playful, Colorful Design: Bright theme with subtle animations (fade-in, float) for an enjoyable user experience.
Interactive Welcome Page: Features glassmorphism effects and animated backgrounds.
Fully Responsive: Optimized for both desktop and mobile devices.

User Roles 👥
1. Admin
Full access to product management (CRUD).
View all transaction and stock reports.
Manage user accounts (optional).

2. Warehouse
Manage inbound and outbound stock.
View product and stock information.

3. Cashier
Process sales transactions.
Use barcode scanner functionality.
Print receipts.

Technology Stack 🛠️
Backend: Laravel 12 (PHP Framework)
Frontend: Blade Templates, Tailwind CSS
Interactivity: Alpine.js (modals, scanner controls, reactivity)
Database: MySQL
Additional Libraries:

html5-qrcode (Camera barcode scanning)

qrcode.js (Client-side QR generator)
