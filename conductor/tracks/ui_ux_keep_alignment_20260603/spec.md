# Spec: UI/UX Google Keep Alignment

## Overview
Selaraskan seluruh tampilan TaskFlow dengan desain Google Keep: tipografi, card, layout grid, animasi, notifikasi, dan konsistensi visual. Prioritas mobile-first.

## Layout
- Dashboard: grid layout 2 kolom di desktop (>=768px), 1 kolom di mobile
- Header minimal: logo + avatar, tanpa tombol logout teks (logout via avatar)
- Card spacing dan padding mengikuti Google Keep

## Typography
- Font: Roboto (already applied)
- Ukuran dan warna teks mengikuti Keep:
  - Judul card: 14px, font-medium, #202124
  - Konten card: 13px, #3c4043, line-height 1.43
  - Judul editor: 22px, font-normal, #202124
  - Konten editor: 14px, #3c4043

## Card & Visual
- Shadow halus, border radius 8px, hover lift effect
- Warna state: Todo (amber), Doing (blue), Delegate (purple), Done (emerald)
- Max 6 baris konten dengan ellipsis

## Animasi & Transisi
- Card hover: translateY(-2px), shadow meningkat
- Modal bottom-sheet: slide-up 200ms ease-out
- Toast notification: slide-in dari bawah, auto-hide 3 detik
- Floating button + : scale animation on tap

## Notifikasi (Toast)
- Tampil setelah: simpan task, salin clipboard, hapus task, copy task
- Posisi: bottom center, di atas floating button
- Durasi: 3 detik, auto-hide
- Warna: sukses (hijau), error (merah)

## Acceptance Criteria
- [ ] Grid layout 2 kolom di desktop, 1 kolom di mobile
- [ ] Semua ukuran font sesuai spesifikasi
- [ ] Toast notification muncul untuk setiap aksi utama
- [ ] Animasi card hover dan modal berjalan halus
- [ ] Tampilan konsisten di HP dan desktop

## Out of Scope
- Dark mode
- Font kostumisasi oleh user
- Animasi drag & drop
