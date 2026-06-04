# Initial Concept

Aplikasi Single Page App (SPA) manajemen task bernama TaskFlow, dengan tampilan mirip Google Keep (font Roboto, grid layout, card-style). Menggunakan Tailwind CSS + Alpine.js di frontend dan PHP biasa sebagai backend dengan database MySQL. Fitur utama: login/logout username+password, CRUD task dengan 4 state (Todo, Doing, Delegate, Done), text formatting (bold/italic/checklist), delegate dengan kontak via Web Contact API + WhatsApp, label warna, dan toast notification.

# Product Guide

## Target Audience
- **Freelancers** yang membutuhkan manajemen task pribadi dan delegasi ke klien/partner
- Pengguna individu yang ingin mencatat dan melacak tugas sehari-hari

## Core Features (Priority)

### 1. Autentikasi
- Register akun baru (username + password)
- Login/logout dengan session PHP
- Password di-hash bcrypt

### 2. Task CRUD & State Management
- Buat task baru via floating + button
- Edit task di halaman editor (`?page=task&id=N`)
- Hapus task dengan konfirmasi
- 4 state: Todo, Doing, Delegate, Done
- Button state ada di task editor (`?page=task&id=N`)
- Filter dashboard berdasarkan state
- Grid layout 2 kolom (desktop) / 1 kolom (mobile)

### 3. Rich Text Formatting
- Bold, italic untuk teks biasa
- Checklist item dengan checkbox
- Checklist dicentang → strikethrough
- Konversi teks biasa ke checklist via select + button
- Copy output terformat WhatsApp (*bold*, _italic_, ~strikethrough~, - [x] checklist)

### 4. Delegate & WhatsApp
- Tambah kontak manual (nama + no HP)
- Tampilkan kontak delegated di bawah teks task
- Tombol kirim WA langsung ke nomor kontak

### 5. Labels & 3-Dot Menu
- Label warna pada task (toggle via editor)
- 3-dot menu: atur label, salin isi (dengan format WhatsApp-style), hapus task

### 6. Toast Notifications
- Notifikasi untuk simpan, salin, label toggle
- Posisi bottom center, auto-hide 3 detik
- Hijau sukses, merah error

### 7. Dark Mode
- Toggle antara light/dark mode via ikon sun/moon di header
- Dark mode Google Keep style (#202124 bg, #333 cards, white text)
- Preferensi tersimpan di localStorage
- Hanya Dashboard & Task Editor (Login/Register tetap light)

## Design Guidelines
- **Tampilan** semirip mungkin dengan Google Keep
- **Layout** card-style (rounded, shadow, color-coded per state)
- **Responsive equally** — mobile dan desktop sama pentingnya
- **Color coding state:**
  - Todo → amber
  - Doing → blue
  - Delegate → purple
  - Done → emerald

## Non-functional Requirements
- CSS framework: Tailwind CSS (CDN)
- Frontend reactivity: Alpine.js (CDN)
- Backend: PHP native tanpa framework
- Database: MySQL dengan 5 tabel (users, tasks, task_contacts, labels, task_labels)
- Arsitektur: SPA dengan PHP API backend, index.php sebagai single entry point
