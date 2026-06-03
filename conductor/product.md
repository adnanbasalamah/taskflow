# Initial Concept

Aplikasi Single Page App (SPA) manajemen task bernama TaskFlow, dengan tampilan mirip Google Keep. Menggunakan Tailwind CSS + Alpine.js di frontend dan PHP biasa sebagai backend dengan database MySQL. Fitur utama: login/logout username+password, CRUD task dengan 4 state (Todo, Doing, Delegate, Done), text formatting (bold/italic/underline/checklist), delegate dengan kontak via Web Contact API + WhatsApp, dan popup hapus saat state Done.

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
- Buat task baru dengan form inline (seperti Google Keep)
- Edit task langsung di card
- Hapus task dengan konfirmasi
- 4 state: Todo, Doing, Delegate, Done
- Button state ada di dalam card task (referensi dari taskflow_task.html)
- Filter dashboard berdasarkan state

### 3. Rich Text Formatting
- Bold, italic, underline untuk teks biasa
- Checklist item dengan checkbox
- Checklist dicentang → strikethrough
- Konversi teks biasa ke checklist via select + button

### 4. Delegate & WhatsApp
- Tambah kontak via Web Contact API (nama + no HP)
- Tampilkan kontak delegated di bawah teks task
- Tombol kirim WA langsung ke nomor kontak

### 5. Done → Delete Flow
- Saat task masuk state Done, muncul popup konfirmasi hapus
- Jika setuju, task dihapus dari database

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
- Database: MySQL dengan 3 tabel (users, tasks, task_contacts)
- Arsitektur: SPA dengan PHP API backend
