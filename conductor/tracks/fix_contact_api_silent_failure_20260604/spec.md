# Specification: Fix Web Contact API Silent Failure on Android

## Overview

Bug di task editor (`views/task.php`): Ketika user klik tombol "Buku Kontak HP" di Android Chrome, tidak ada respon sama sekali. Kontak HP tidak terbuka dan tidak ada error message yang muncul.

## Root Cause Analysis

Fungsi `importFromPhone()` di `views/task.php` memiliki masalah error handling:

```javascript
importFromPhone() {
  if ('contacts' in navigator && 'select' in navigator.contacts) {
    navigator.contacts.select(['name', 'tel'], { multiple: false })
      .then(contacts => {
        if (contacts.length > 0) {
          this.newContact.name = contacts[0].name[0];
          this.newContact.phone = contacts[0].tel[0];
        }
      })
      .catch(() => {});  // ❌ Empty catch block - errors silently swallowed
  } else {
    alert('Web Contact API tidak didukung di browser ini. Silakan isi manual.');
  }
}
```

**Masalah:**
1. Di Android Chrome, Web Contact API terdeteksi ada (`'contacts' in navigator` returns true)
2. Tapi API call gagal (mungkin karena permission, flag tidak enabled, atau HTTPS requirement)
3. Error di-catch oleh `.catch(() => {})` yang kosong → error silently swallowed
4. User tidak mendapat feedback apapun

**Catatan:** Web Contact API adalah experimental feature dengan support sangat terbatas:
- Hanya Chrome Android dengan flag `#contact-picker` enabled
- Memerlukan HTTPS
- Memerlukan user permission
- Tidak tersedia di iOS Safari sama sekali

## Functional Requirements

### Fix Error Handling

**Requirements:**
- Tambahkan error message di `.catch()` block untuk memberi feedback ke user
- Error message harus jelas dan actionable (bahasa Indonesia)
- Fallback ke manual input harus tetap mudah

### Improve User Experience

**Requirements:**
- Tampilkan alert ketika API call gagal dengan pesan yang jelas
- Pertimbangkan menambahkan timeout untuk mencegah API hang
- Pastikan user tahu bahwa mereka bisa isi manual jika API tidak bekerja

## Non-Functional Requirements

- Tidak mengubah struktur data atau API backend
- Tetap menggunakan Web Contact API sebagai primary method (jika available)
- Fallback ke manual input harus tetap berfungsi

## Acceptance Criteria

1. Buka task editor di Android Chrome
2. Klik "Tambah Kontak yg Terlibat"
3. Klik "Buku Kontak HP"
4. **Jika API berhasil:** Contact picker terbuka, user bisa pilih kontak
5. **Jika API gagal:** Muncul alert dengan pesan jelas (contoh: "Gagal membuka kontak HP. Silakan isi manual.")
6. User tetap bisa isi kontak secara manual setelah error
7. Di desktop browser, behavior tetap sama (alert muncul jika API tidak didukung)

## Out of Scope

- Mengganti Web Contact API dengan solusi lain (misalnya native app integration)
- Menambahkan fitur import multiple contacts sekaligus
- Perubahan ke backend atau database schema
- Perubahan ke tampilan UI (selain error message)
