# Spec: Swap Toolbar & State Buttons Position

## Overview
Menukar posisi toolbar formatting (B/I/U/Checklist) dengan tombol state (Todo/Doing/Delegate/Done) di halaman editor task agar state buttons lebih mudah diakses di bagian atas, mengikuti pola Google Keep.

## Functional Requirements

### Layout Perubahan
- Baris atas (sekarang toolbar B/I/U/Checklist) → diganti dengan tombol state: [Todo] [Doing] [Delegate] [Done]
- Baris bawah (sekarang tombol state) → diganti dengan toolbar: [B] [I] [U] [Ceklist] [Label] [3 titik]
- Tidak ada perubahan fungsi atau styling, hanya posisi yang ditukar

### File yang Diubah
- `task.html` — memindahkan elemen toolbar dan state buttons

## Acceptance Criteria
- [ ] Tombol Todo/Doing/Delegate/Done berada di baris atas editor
- [ ] Tombol Bold/Italic/Underline/Checklist/Label/3-dot berada di baris bawah editor
- [ ] Semua fungsi tetap berjalan normal (state change, formatting, label, menu)
- [ ] Tampilan konsisten di mobile dan desktop

## Out of Scope
- Perubahan fungsi atau styling tombol
- Perubahan layout lain di halaman editor
