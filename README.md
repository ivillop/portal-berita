# Portal Berita

Portal Berita adalah sebuah aplikasi berbasis web yang dikembangkan menggunakan framework Laravel 11. Aplikasi ini memungkinkan pengguna untuk membaca berita dari berbagai kategori seperti Berita, Bisnis, Olahraga, maupun Kesehatan. Selain itu, terdapat fitur-fitur seperti komentar, total jumlah view, dan autentikasi pengguna.

## Fitur Utama

- **Kategori Berita:** Pilihan kategori Berita, Bisnis, Olahraga, dan Kesehatan.
- **Manajemen Berita:** Tambah, edit, dan hapus berita.
- **Komentar:** Fitur komentar yang terintegrasi langsung dengan Laravel.
- **Total View:** Menghitung total jumlah view setiap kali berita dibuka.
- **Autentikasi:** Login dan logout dengan sistem keamanan, memastikan dashboard hanya dapat diakses setelah login.
- **Pagination:** Navigasi halaman di dashboard.

## Persyaratan Sistem

Sebelum memulai instalasi, pastikan sistem Anda memenuhi persyaratan berikut:

- PHP >= 8.1
- Composer
- SQLite atau MySQL
- Node.js & NPM (opsional, jika menggunakan frontend tambahan)

## Langkah-Langkah Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/username/portal-berita.git
cd portal-berita
```

### 2. Instalasi Dependensi

Jalankan perintah berikut untuk menginstal semua dependensi PHP:

```bash
composer install
```

### 3. Konfigurasi File Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Edit file `.env` sesuai konfigurasi database Anda. Contoh untuk SQLite:

```
DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database/database.sqlite
```

### 4. Generate Key Aplikasi

```bash
php artisan key:generate
```

### 5. Migrasi dan Seeder Database

Jalankan migrasi database dan tambahkan data awal jika diperlukan:

```bash
php artisan migrate --seed
```

### 6. Menjalankan Aplikasi

Jalankan server pengembangan Laravel:

```bash
php artisan serve
```

Akses aplikasi melalui [http://localhost:8000](http://localhost:8000).

Terima kasih telah menggunakan Portal Berita. Semoga bermanfaat!

