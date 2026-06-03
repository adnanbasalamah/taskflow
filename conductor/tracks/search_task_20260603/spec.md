# Spec: Search / Cari Task

## Overview
Fitur pencarian task untuk menemukan task dengan cepat. Search bar di header, real-time filtering seperti Google Keep.

## Functional Requirements

### Search Bar
- Search bar berada di header, di samping logo TaskFlow
- Ikon kaca pembesar di kiri input
- Placeholder: "Cari task..."
- Real-time: hasil berubah saat mengetik (tanpa tombol cari)

### Backend API
- Parameter `q` pada `GET /api/tasks/list.php` untuk keyword pencarian
- Mencocokkan keyword dengan: judul task, konten task, dan nama label
- Case-insensitive search (LIKE %%)
- Bisa dikombinasikan dengan filter state (`?state=todo&q=keyword`)

### Frontend
- Search bar menggunakan Alpine.js dengan debounce ~300ms
- Saat mengetik, fetch ulang task dengan parameter `q`
- Jika search kosong, tampilkan semua task (filter state tetap berlaku)
- Input search memiliki tombol "x" untuk clear search

## Acceptance Criteria
- [ ] Search bar muncul di header dashboard
- [ ] Mengetik kata kunci langsung memfilter task secara real-time
- [ ] Pencarian mencakup judul, konten, dan label
- [ ] Bisa dikombinasikan dengan filter state
- [ ] Tombol clear (x) untuk reset pencarian
- [ ] Search tidak mempengaruhi filter state yang aktif

## Out of Scope
- Full-text search index
- Search history
- Pencarian di halaman task editor
