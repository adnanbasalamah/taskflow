# Spec: Autosave Task Editor (Google Keep-style)

## Overview
Add autosave functionality to the task editor so changes are saved automatically without requiring the user to click "Simpan Task". Matches Google Keep's behavior where typing is persisted in real-time with a debounce.

## Functional Requirements
- Monitor changes to: title, content, state, checklistItems, contacts (add/remove), taskLabels (attach/detach)
- Debounce autosave: 1.5 detik setelah user berhenti melakukan perubahan
- **Existing tasks** (has taskId): langsung panggil `saveTask()` (PUT) setelah debounce
- **New tasks** (no taskId): simpan task terlebih dahulu via POST `/api/tasks/create.php`, redirect ke halaman edit dengan taskId baru, lalu autosave untuk perubahan selanjutnya
- Replace "Simpan Task" button with a save status indicator
- Show "Menyimpan..." (gray) saat proses save berlangsung
- Show "Tersimpan" (green) setelah save berhasil
- Show "Gagal menyimpan" (red) jika save gagal
- Indicator muncul inline disebelah kanan tombol/area header
- Tidak ada perubahan pada dashboard atau halaman lain

## Non-Functional Requirements
- Matches Google Keep autosave behavior
- Tidak mengganggu user saat mengetik (debounce mencegah save terlalu sering)
- Menggunakan Alpine.js `$watch` atau event listener untuk mendeteksi perubahan
- Konsisten dengan UX guideline "Minimal clicks"

## Acceptance Criteria
1. Membuka task → edit judul → tunggu 1.5 detik → task tersimpan otomatis
2. Menambah checklist → tunggu 1.5 detik → tersimpan otomatis
3. Mengubah state → tersimpan otomatis
4. Menambah/menghapus kontak → tersimpan otomatis
5. Menambah/menghapus label → tersimpan otomatis
6. Indikator "Menyimpan..." muncul saat proses, berubah jadi "Tersimpan" setelah sukses
7. Task baru: input pertama → create task → redirect ke editor → autosave untuk perubahan berikutnya
8. Tidak ada tombol "Simpan Task" — diganti indikator status

## Out of Scope
- Dashboard autosave
- Autosave untuk login/register page
- Backend changes (API sudah support create/update/contacts/labels)
