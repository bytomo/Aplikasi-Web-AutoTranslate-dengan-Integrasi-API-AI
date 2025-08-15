Translator AI – Laravel Web Translator

Deskripsi Proyek:
Translator AI adalah aplikasi web berbasis Laravel yang memungkinkan pengguna menerjemahkan teks antar bahasa secara cepat dan akurat menggunakan teknologi AI. Proyek ini dirancang dengan arsitektur modular, UI responsif, dan integrasi backend yang scalable.

Fitur Utama:
- 🌐 Penerjemahan teks antar bahasa (Indonesia, Inggris, Jepang, Arab, Prancis)
- 🔐 Sistem login & register menggunakan Laravel Breeze/Fortify
- 📂 Dashboard pengguna dengan statistik dan riwayat terjemahan
- 🚀 Tombol "Mulai Translate" yang mengarahkan ke halaman translator interaktif
- 🎨 Desain modern dengan animasi orbs dan layout yang bersih
- ⚙️ API terintegrasi dengan fallback dan validasi karakter
- 🧠 Auto-translate dengan debounce dan copy hasil ke clipboard

Struktur Halaman:
- `/` → Landing page dengan tombol login/register/dashboard
- `/translator` → Halaman utama translator (views/translator/index.blade.php)
- `/dashboard` → Statistik dan riwayat terjemahan pengguna
- `/api/translate` → Endpoint publik untuk proses terjemahan

Teknologi:
- Laravel 12
- TailwindCSS
- Blade templating
- Laravel Breeze (auth scaffolding)
- Fetch API (frontend JS)
- Middleware throttle untuk rate limit

Cara Menjalankan:
1. Clone repository
2. Jalankan `composer install` dan `npm install`
3. Setup `.env` dan koneksi database
4. Jalankan `php artisan migrate`
5. Jalankan `php artisan serve`
6. Akses `http://localhost:8000`

Lisensi:
Proyek ini dikembangkan untuk keperluan edukasi dan eksplorasi teknologi AI dalam penerjemahan. Bebas digunakan dan dimodifikasi sesuai kebutuhan.

link video demo: https://drive.google.com/file/d/1rGTBxYi_fVEXyTErVIlsORrtaonZTo6M/view?usp=sharing

Dibuat oleh: Bayu Aji Utomo
