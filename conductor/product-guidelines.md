# Product Guidelines

## Prose Style
- Gunakan bahasa Indonesia untuk seluruh antarmuka
- Gunakan "Kamu" (informal) untuk sapaan ke user
- Konsisten dalam penggunaan istilah: "Task" untuk tugas, "State" untuk status
- Pesan error singkat, jelas, dan actionable (e.g., "Username sudah digunakan" bukan "Error 1062")

## UX Principles
- **Zero learning curve** — desain semirip Google Keep agar user langsung familiar
- **Inline editing** — sebisa mungkin edit langsung di card tanpa pindah halaman
- **Minimal clicks** — setiap aksi cukup 1-2 klik/hap
- **Visual state** — setiap state punya warna yang konsisten di seluruh app

## Branding
- **App name:** TaskFlow
- **Tagline:** Atur tugasmu, selesaikan tepat waktu
- **Warna aksen:** Gradien indigo ke purple (di login & header)
- **Color card per state:** amber (Todo), blue (Doing), purple (Delegate), emerald (Done)
- **Logo:** Icon checklist dalam kotak rounded dengan gradien indigo-purple
- **Font:** Inter (Google Fonts)

## Design Patterns
- **Cards** sebagai unit utama task (rounded-xl, shadow, border)
- **Filter pills** untuk memfilter task berdasarkan state
- **Bottom sheet** untuk modal kontak (mobile-friendly)
- **Transitions** halus untuk hover dan state change (0.2s ease)

## Accessibility
- Kontras warna cukup untuk readability
- Tombol memiliki ukuran minimal 44px untuk touch target
- Label input jelas dan eksplisit
- Gunakan semantic HTML elements

## Performance
- Tailwind CSS via CDN (purge di production)
- Alpine.js via CDN
- Hindari dependency berat
- Optimasi query MySQL dengan index
