# 🛠️ PANDUAN INSTALASI APLIKASI BENGKEL RBPL

Dokumen ini menjelaskan langkah-langkah untuk menjalankan aplikasi di lingkungan lokal. Silakan pilih metode yang paling sesuai dengan konfigurasi perangkat Anda.

---

## 📋 1. PRASYARAT SISTEM
- PHP: Minimal versi 7.4.
- Web Browser: Chrome, Edge, Firefox, atau sejenisnya.
- Koneksi Internet: Diperlukan untuk memuat library Tailwind CSS via CDN.

---

## 🚀 2. METODE JALANKAN APLIKASI (PILIH SALAH SATU)

### A. Menggunakan PHP Built-in Server (Disarankan & Cepat)
Metode ini paling praktis karena tidak memerlukan Apache.
1. Buka Terminal atau Git Bash di direktori utama proyek.
2. Jalankan perintah berikut:
   php -S localhost:8000 -t src/
3. Buka browser dan akses URL: http://localhost:8000

### B. Menggunakan Web Server Konvensional (XAMPP / Laragon)
Gunakan metode ini jika Anda lebih terbiasa menggunakan folder htdocs.
1. Penempatan File: Pindahkan folder proyek ke htdocs (C:\xampp\htdocs\bengkel-rbpl).
2. Menjalankan Server: Buka XAMPP dan klik Start pada modul Apache.
3. Akses Aplikasi: Buka browser dan akses http://localhost/bengkel-rbpl/src/index.php

---

## 🧪 3. CARA MENJALANKAN UNIT TESTING
Untuk memverifikasi bahwa logika perhitungan biaya berjalan dengan benar:
1. Buka Terminal/Git Bash di folder proyek.
2. Jalankan perintah: php tests/test_bengkel.php
3. Pastikan output menunjukkan status [PASSED].

---

## 📂 4. INFORMASI TAMBAHAN
- Folder src/: Kode utama aplikasi.
- Folder docs/: Dokumentasi dan diagram sistem.
- Folder tests/: Skrip pengujian mandiri.

Tim Praktikum RBPL - Bengkel Kebut Semalam
Terakhir Diperbarui: 3 Maret 2026