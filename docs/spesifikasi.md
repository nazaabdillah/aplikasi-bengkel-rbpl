# Spesifikasi Teknis - Aplikasi Bengkel RBPL

Dokumen ini merinci kebutuhan teknis dan lingkungan pengembangan yang digunakan.

### 1. Stack Teknologi
* **Bahasa Pemrograman:** PHP Native (Minimal Versi 7.4)
* **Framework CSS:** Tailwind CSS (via Play CDN)
* **Fonts:** Inter & JetBrains Mono (via Google Fonts)
* **Version Control:** Git & GitHub

### 2. Struktur Proyek
* `/src` : Source code utama (Index, Proses, Struk).
* `/docs` : Dokumentasi, Diagram (PlantUML), & Manual.
* `/tests` : Skrip Unit Testing untuk logika perhitungan.

### 3. Komponen Sistem (IPO)
* **Input:** Nama, Plat Nomor, Jenis Motor, Jenis Servis.
* **Proses:** Logika kalkulasi harga + PPN 10%.
* **Output:** Ringkasan biaya di layar & E-Receipt (Nota).