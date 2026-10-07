# Rencana Liburan

Aplikasi web untuk membantu pengguna dalam mengelola destinasi dan rencana perjalanan liburan secara terstruktur.

Aplikasi ini dibuat menggunakan Laravel dan MySQL dengan fitur pengelolaan destinasi, rencana perjalanan, jadwal kegiatan, serta autentikasi pengguna.

---

##  Teknologi yang Digunakan

- Laravel 12
- PHP
- MySQL
- Blade
- HTML
- CSS
- JavaScript
- XAMPP

---

##  Fitur Aplikasi

### 1. Register
Pengguna dapat membuat akun baru dengan:
- Nama
- Email
- Password
- Konfirmasi Password

Password pengguna disimpan menggunakan sistem hashing Laravel.

### 2. Login & Logout
Pengguna dapat:
- Login menggunakan email dan password
- Logout dari aplikasi
- Mengakses halaman aplikasi setelah berhasil login

### 3. Destinasi Liburan

Pengguna dapat mengelola data destinasi liburan, meliputi:

- Foto destinasi
- Judul destinasi
- Tanggal keberangkatan
- Budget
- Durasi perjalanan
- Status perjalanan

Status perjalanan terdiri dari:
- Belum tercapai
- Tercapai

### 4. Rencana Liburan

Setiap destinasi dapat memiliki rencana perjalanan yang berisi:

- Hari
- Waktu
- Aktivitas
- Lokasi
- Deskripsi

Dengan fitur ini, pengguna dapat menyusun kegiatan selama perjalanan secara lebih terstruktur.

### 5. Dashboard / Home

Halaman utama menampilkan daftar destinasi dalam bentuk card yang berisi informasi:

- Foto
- Nama destinasi
- Tanggal keberangkatan
- Budget
- Durasi
- Status

### 6. Keamanan Akses

Halaman utama dan fitur pengelolaan data hanya dapat diakses oleh pengguna yang sudah login.

Setelah logout, pengguna tidak dapat mengakses halaman yang membutuhkan autentikasi.

---

##  Database

Database yang digunakan adalah MySQL.

Nama database:
rencana_liburan

## 6. Link Video

Penjelasan aplikasi/web dan struktur database yang sudah dibuat
https://drive.google.com/file/d/1q9WSVZO1pKrKnOxZL6p7FNx2sjcQia5g/view?usp=drive_link 
