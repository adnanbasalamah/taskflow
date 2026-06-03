# Project Requirement Document: TaskFlow

## 1. Ringkasan Proyek
Aplikasi **Single Page App (SPA)** manajemen task bernama **TaskFlow**, dengan tampilan mirip Google Keep. Menggunakan **Tailwind CSS + Alpine.js** di frontend dan **PHP** di backend dengan **MySQL**.

## 2. Autentikasi
- Register dan Login/Logout wajib
- Login menggunakan **username + password**
- Password di-hash dengan `password_hash()` (bcrypt)
- Setiap user memiliki session sendiri

## 3. Fitur Task
- User dapat membuat task baru
- User dapat menghapus task
- Saat task masuk state **Done**, muncul popup konfirmasi "Hapus task?". Jika jawab "Ya", task dihapus.

## 4. State Task
Setiap task memiliki 4 state, dipilih dengan menekan tombol:

| State | Keterangan |
|-------|-----------|
| Todo | Akan dikerjakan |
| Doing | Sedang dikerjakan |
| Delegate | Didelegasikan ke orang lain |
| Done | Selesai |

## 5. Format Text dalam Task
- Text biasa — bisa di-bold, italic, underline
- Checklist — kotak centang di kiri text
  - Jika dicentang → text menjadi strikethrough
  - Text biasa bisa dikonversi jadi checklist dengan cara di-select lalu tekan tombol

## 6. Delegate & WhatsApp Integration
- Task bisa (tidak wajib) menyertakan kontak orang yang terlibat (nama + no HP), diambil dari **Web Contact API**
- Saat state = **Delegate**, muncul button nama orang yang didelegasikan di bawah text task
- Button tersebut bisa diklik untuk langsung mengirim task via WhatsApp ke nomor tersebut

## 7. Dashboard
- Menampilkan task berdasarkan state: Todo, Doing, Delegate, Done
- Tampilan dibuat semirip mungkin dengan Google Keep (card-style, grid layout)

## 8. Tech Stack

| Layer | Teknologi |
|-------|-----------|
| Frontend | Tailwind CSS, Alpine.js |
| Backend | PHP (plain) |
| Authentication | Username + Password (bcrypt) |
| Database | MySQL |
| Platform | Single Page App (SPA) |

## 9. Database Structure

### Tabel: `users`
| Column | Type | Keterangan |
|--------|------|------------|
| id | INT UNSIGNED AUTO_INCREMENT PRIMARY KEY | |
| username | VARCHAR(50) UNIQUE NOT NULL | |
| password | VARCHAR(255) NOT NULL | Hash bcrypt |
| display_name | VARCHAR(100) | Nama tampilan |
| created_at | TIMESTAMP DEFAULT CURRENT_TIMESTAMP | |

### Tabel: `tasks`
| Column | Type | Keterangan |
|--------|------|------------|
| id | INT UNSIGNED AUTO_INCREMENT PRIMARY KEY | |
| user_id | INT UNSIGNED | FK ke users.id |
| content | TEXT | Isi task (HTML) |
| state | ENUM('todo','doing','delegate','done') DEFAULT 'todo' | |
| created_at | TIMESTAMP DEFAULT CURRENT_TIMESTAMP | |
| updated_at | TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP | |
| FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE | |

### Tabel: `task_contacts`
| Column | Type | Keterangan |
|--------|------|------------|
| id | INT UNSIGNED AUTO_INCREMENT PRIMARY KEY | |
| task_id | INT UNSIGNED | FK ke tasks.id |
| name | VARCHAR(100) | Nama kontak |
| phone | VARCHAR(20) | No HP |
| FOREIGN KEY (task_id) REFERENCES tasks(id) ON DELETE CASCADE | |

### Index
- tasks.user_id → INDEX
- tasks.state → INDEX
- task_contacts.task_id → INDEX
