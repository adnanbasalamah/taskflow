# Plan: Single Entry Point SPA

## Phase 1: Entry Point & Routing Infrastructure

- [ ] Task: Buat `index.php` sebagai single entry point
    - [ ] Session check: redirect guest ke login, authenticated user ke dashboard
    - [ ] Routing berdasarkan `?page=` parameter
    - [ ] Logout route: `?page=logout` → destroy session → redirect `/`
    - [ ] 404 handler untuk route tidak dikenal
- [ ] Task: Buat layout bersama `views/layout.php`
    - [ ] Head section: charset, viewport, title, Tailwind CDN, Alpine.js CDN, Roboto font
    - [ ] Manifest, sw.js registration
    - [ ] Dark mode CSS (dari dashboard.html)
    - [ ] Body wrapper yang menerima konten view dinamis
- [ ] Task: Update `.htaccess` atau Apache config
    - [ ] Set `DirectoryIndex index.php`
- [ ] Task: Conductor - User Manual Verification 'Phase 1' (Protocol in workflow.md)

## Phase 2: Migrate Views to PHP

- [ ] Task: Buat `views/login.php` (gabungan login + register)
    - [ ] Login form dengan Alpine.js state (dari login.html)
    - [ ] Register form dengan toggle via Alpine.js (dari register.html)
    - [ ] Validasi form dan error handling
- [ ] Task: Buat `views/dashboard.php`
    - [ ] Header + search + filter + grid (dari dashboard.html)
    - [ ] Pastikan semua Alpine.js data binding berfungsi
    - [ ] API fetch URLs disesuaikan (relative to /)
- [ ] Task: Buat `views/task.php`
    - [ ] Full task editor (dari task.html)
    - [ ] Rich text formatting, checklist, labels, contacts, state buttons
    - [ ] Pastikan all XHR/fetch URLs masih benar
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
