# Lab Activity 9 – Barangay Bakuna Tracker: Blade, Tailwind & Vite

Ateneo de Davao University  
4-334 · Full-Stack Web Development · 1st Semester, July–November 2026  
**Student:** Chris Perez  
**Dashboard Title:** *Bakuna Tracker – Purok Perez*  

---

## 📋 Project Description
Rebuilding the presentation layer for Nurse Marites Abellana at the Davao City Health Center using Laravel Blade views, custom components, and Tailwind CSS compiled via Vite. Data is seeded through SQLite.

---

## 🔐 Seeded Health Worker Credentials
Use the following credentials to log in:
- **Email:** `nurse.perez@bakuna.test`
- **Password:** `bakuna2026`

---

## 🚀 Setup & How to Run

1. **Install PHP and Composer dependencies:**
   ```bash
   composer install
   ```

2. **Install Node.js dependencies:**
   ```bash
   npm install
   ```

3. **Migrate and seed SQLite database:**
   ```bash
   php artisan migrate:fresh --seed
   ```

4. **Compile frontend assets:**
   ```bash
   # Development mode with Hot Module Replacement (HMR)
   npm run dev

   # Or build production assets
   npm run build
   ```

5. **Start Laravel development server:**
   ```bash
   php artisan serve
   ```

Visit `http://127.0.0.1:8000` in your web browser. Guests are automatically redirected to `/login`, and authenticated health workers can access `/dashboard` and `/schedule`.
