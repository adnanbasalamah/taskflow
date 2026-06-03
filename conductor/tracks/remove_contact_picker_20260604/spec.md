# Specification: Remove Web Contact API (Contact Picker)

## Overview

Hapus seluruh fitur Web Contact API / Contact Picker dari task editor. User hanya akan menggunakan input manual untuk menambah kontak.

## Rationale

Web Contact API (`navigator.contacts.select`) memiliki support sangat terbatas:
- Hanya berfungsi di Chrome Android dengan flag `#contact-picker` enabled
- Memerlukan HTTPS
- Sering gagal silent tanpa error yang jelas
- Tidak didukung di iOS Safari

Karena keterbatasan ini, fitur contact picker dihapus dan user cukup isi kontak secara manual.

## Changes

### Hapus dari HTML (views/task.php)
- Hapus tombol 'Buku Kontak HP' dari modal kontak
- Hapus separator 'atau' (divider line with text)

### Hapus dari JavaScript (views/task.php)
- Hapus seluruh fungsi `importFromPhone()` termasuk Web Contact API detection
- Hapus variabel/state yang tidak diperlukan lagi (jika ada)

## Acceptance Criteria

1. Buka task editor → klik 'Tambah Kontak yg Terlibat'
2. Modal yang muncul hanya memiliki: input Nama, input No HP, tombol Simpan, tombol Batal
3. Tombol 'Buku Kontak HP' tidak ada
4. Separator 'atau' tidak ada
5. User bisa isi nama dan nomor HP secara manual dan simpan

## Out of Scope

- Tidak mengubah logic `addContact()` atau `removeContact()`
- Tidak mengubah struktur database atau API backend
- Tidak mengubah tampilan kontak yang sudah tersimpan
