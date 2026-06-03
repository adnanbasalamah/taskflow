# Spec: Single Entry Point SPA

## Overview
Refactor aplikasi dari beberapa file `.html` statis menjadi arsitektur SPA sejati dengan `index.php` sebagai single entry point. Semua routing ditangani PHP berdasarkan session dan query parameter, file `.html` dihapus.

## Functional Requirements

### 1. Single Entry Point (`index.php`)
- `index.php` menjadi satu-satunya file yang diakses pengguna
- Cek session:
  - Jika **belum login** → tampilkan halaman login (dengan opsi toggle ke register)
  - Jika **sudah login** tanpa parameter page → tampilkan dashboard
  - Jika **sudah login** dengan `?page=task&id=X` → tampilkan task editor untuk task ID X
- `.htaccess` diset agar `DirectoryIndex index.php` (tidak ada directory listing)

### 2. Routing via PHP
- Route `/` → login/register (guest) atau dashboard (authenticated)
- Route `?page=task&id=N` → task editor (authenticated only; redirect jika tidak punya akses)
- Route `?page=logout` → destroy session, redirect ke `/`
- Route tidak dikenal (404) → tampilkan halaman 404 sederhana

### 3. Integrasi View (Hapus .html)
- `login.html` + `register.html` → digabung menjadi satu view login dengan toggle
- `dashboard.html` → menjadi view dashboard
- `task.html` → menjadi view task editor
- Semua view ditempatkan di folder `views/` sebagai file `.php`
- Layout bersama (head, Tailwind/Alpine CDN, manifest, dll) dipisahkan ke `views/layout.php`

### 4. Preserved Functionality
- Semua fitur existing tetap berfungsi:
  - Login/logout dengan session
  - CRUD task dengan 4 state
  - Rich text formatting (bold/italic/underline/checklist)
  - Delegate kontak + WhatsApp
  - Label warna
  - Dark mode toggle
  - Toast notifications
  - Search task

## Non-Functional Requirements
- Tidak mengubah CSS/JS structure (Tailwind CDN + Alpine.js CDN tetap)
- Tidak mengubah API backend (`api/` folder tetap)
- URL `?page=task&id=N` harus bisa di-copy paste (bookmarkable)

## Acceptance Criteria
- [ ] `http://taskflow.local/` menampilkan halaman login (jika belum login)
- [ ] Setelah login, menampilkan dashboard dengan grid task
- [ ] Task editor bisa diakses via URL `?page=task&id=N`
- [ ] Logout via `?page=logout`
- [ ] Tidak ada directory listing
- [ ] Semua fitur existing berfungsi seperti sebelum refactor
- [ ] `login.html`, `register.html`, `dashboard.html`, `task.html` tidak ada lagi

## Out of Scope
- Perubahan API backend
- Penambahan fitur baru (selain routing)
- Unit test (karena PHP vanilla tanpa framework — manual verification saja)
