# Plan: Single Entry Point SPA

## Phase 1: Entry Point & Routing Infrastructure [checkpoint: 9cf8930]

- [x] Task: Buat `index.php` sebagai single entry point (9cf8930)
    - [x] Session check: redirect guest ke login, authenticated user ke dashboard
    - [x] Routing berdasarkan `?page=` parameter
    - [x] Logout route: `?page=logout` → destroy session → redirect `/`
    - [x] 404 handler untuk route tidak dikenal
- [x] Task: Buat layout bersama `views/layout.php` (9cf8930)
    - [x] Head section: charset, viewport, title, Tailwind CDN, Alpine.js CDN, Roboto font
    - [x] Manifest, sw.js registration
    - [x] Dark mode CSS (dari dashboard.html)
    - [x] Body wrapper yang menerima konten view dinamis
- [x] Task: Update `.htaccess` atau Apache config (9cf8930)
    - [x] Set `DirectoryIndex index.php`
- [ ] Task: Conductor - User Manual Verification 'Phase 1' (Protocol in workflow.md)

## Phase 2: Migrate Views to PHP

- [x] Task: Buat `views/login.php` (gabungan login + register)
    - [x] Login form dengan Alpine.js state (dari login.html)
    - [x] Register form dengan toggle via Alpine.js (dari register.html)
    - [x] Validasi form dan error handling
- [x] Task: Buat `views/dashboard.php` (a0a0b7f)
    - [x] Header + search + filter + grid (dari dashboard.html)
    - [x] Pastikan semua Alpine.js data binding berfungsi
    - [x] API fetch URLs disesuaikan (relative to /)
- [x] Task: Buat `views/task.php` (a0a0b7f)
    - [x] Full task editor (dari task.html)
    - [x] Rich text formatting, checklist, labels, contacts, state buttons
    - [x] Pastikan all XHR/fetch URLs masih benar
- [ ] Task: Conductor - User Manual Verification 'Phase 2' (Protocol in workflow.md)

## Phase 3: Cleanup & Final Verification

- [ ] Task: Hapus file `.html` lama
    - [ ] Hapus `login.html`, `register.html`, `dashboard.html`, `task.html`
- [ ] Task: Verifikasi semua route dan fungsionalitas
    - [ ] Akses `/` → login page (guest)
    - [ ] Login → dashboard
    - [ ] Klik task → `?page=task&id=N`
    - [ ] Logout → kembali ke login
    - [ ] Dark mode, formatting, checklist, labels, contacts, WA
- [ ] Task: Conductor - User Manual Verification 'Phase 3' (Protocol in workflow.md)
