# Specification: Contact Auto-Complete from Saved Contacts

## Overview

Tambahkan fitur autocomplete pada input nama kontak di modal "Tambah Kontak". Ketika user mengetik nama kontak, akan muncul dropdown saran dari semua kontak yang pernah disimpan di semua task milik user yang sama.

## Functional Requirements

### 1. Backend: Search Contacts API
- Buat endpoint `GET api/tasks/contacts.php?search={keyword}`
- Mencari kontak dari tabel `task_contacts` milik user yang sedang login
- Melakukan LIKE search pada kolom `name`
- Mengembalikan maksimal 10 hasil teratas
- Response: array of `{id, name, phone}`

### 2. Backend: Duplicate Phone Check
- Saat user klik "Simpan Kontak", sebelum menyimpan lakukan pengecekan apakah nomor HP sudah ada di tabel `task_contacts` milik user yang sama
- Jika nomor HP sudah ada, tampilkan pesan error "No HP sudah ada" dan jangan simpan
- Pengecekan dilakukan via endpoint baru atau via validasi di endpoint `POST` yang sudah ada

### 3. Frontend: Autocomplete Dropdown
- Di modal "Tambah Kontak", ketika user mengetik di input nama, setelah 300ms (debounce) akan fetch ke search API
- Muncul dropdown di bawah input nama berisi saran kontak
- Setiap item dropdown menampilkan nama + nomor HP
- Klik item dropdown → isi otomatis input nama dan nomor HP
- Dropdown hilang jika: klik di luar, input kosong, atau ESC ditekan

### 4. Frontend: Duplicate Phone Validation
- Sebelum POST ke API simpan kontak, lakukan pengecekan duplikat nomor HP
- Jika nomor sudah ada, tampilkan toast/alert "No HP sudah ada" dan hentikan penyimpanan
- Pengecekan dilakukan client-side dengan membandingkan ke data yang sudah di-fetch

## Non-Functional Requirements

- Tidak mengubah struktur tabel database (tetap pakai task_contacts)
- Search hanya untuk kontak milik user yang sedang login (berdasarkan user_id)
- Performa: debounce fetch di frontend untuk mengurangi request

## Acceptance Criteria

1. Buka task editor → klik "Tambah Kontak yg Terlibat"
2. Ketik nama di input nama → muncul dropdown saran dari kontak yang pernah disimpan
3. Klik salah satu saran → input nama dan no HP terisi otomatis
4. Klik Simpan → kontak tersimpan
5. Jika mencoba simpan no HP yg sudah ada → muncul pesan "No HP sudah ada"
6. Kontak dari task lain tidak muncul jika beda user

## Out of Scope

- Tabel kontak global terpisah
- Manajemen kontak (edit/hapus kontak terpusat)
- Import kontak dari HP (Web Contact API sudah dihapus)
