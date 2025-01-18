# Software Requirement Specification (SRS) - Julie Toys

## BAB I Pendahuluan

### 1.1 Tujuan
Dokumen ini bertujuan untuk menggambarkan spesifikasi sistem perangkat lunak yang akan digunakan untuk membangun **Sistem Informasi Julie Toys**, sebuah toko online yang menjual berbagai mainan anak. SRS ini akan menjadi panduan teknis bagi pengembang dalam membangun dan mengelola aplikasi yang dapat diakses oleh admin dan pembeli.

### 1.2 Lingkup
Sistem Informasi Julie Toys adalah aplikasi berbasis web yang menyediakan pengelolaan produk mainan, proses belanja, dan pencatatan riwayat transaksi. Fungsi utama dalam aplikasi ini meliputi:
- **Shop (Toko):** Menampilkan produk mainan yang tersedia untuk dibeli.
- **Riwayat Pembelian:** Pembeli dapat melihat transaksi pembelian mereka.
- **Laporan Keuntungan:** Admin dapat mengakses laporan keuntungan.
- **Tambah Produk:** Admin dapat menambahkan produk baru.
- **FAQ:** Halaman pertanyaan umum untuk pembeli dan admin.

## BAB II Gambaran Umum

### 2.1 Perspektif Produk
Julie Toys memiliki dua jenis pengguna utama:
- **Admin:** Mengelola produk, memantau transaksi, dan melihat laporan keuntungan.
- **Pembeli:** Membeli produk dan melihat riwayat pembelian mereka.

### 2.1.1 Antarmuka Sistem
- **Halaman Admin:**
  - Login dan register.
  - Tambah/edit/hapus produk.
  - Laporan keuntungan.
  - Manajemen riwayat pembelian.
  - Manajemen FAQ.
  - Daftar akun pembeli.
- **Halaman Pembeli:**
  - Melihat produk.
  - Melakukan pembelian.
  - Mengakses riwayat pembelian dan halaman FAQ.

### **2.1.3 Antarmuka perangkat keras**
![alt text](Image/perangkatKeras.png?raw=true)
Antarmuka perangkat keras yang digunakan untuk mengoperasikan Perangkat Lunak Sistem Parenting antara lain :

PC / Laptop Untuk menjalankan Aplikasi ini.
### 2.1.3 Antarmuka Perangkat Lunak
- Browser web modern (Chrome, Firefox, Safari, Edge).

### 2.1.4 Operasi
- **Login:** Untuk autentikasi pengguna.
- **Input Data:** Untuk menambahkan informasi baru.
- **Edit:** Untuk mengubah informasi.
- **Hapus:** Untuk menghapus informasi.
- **Simpan:** Untuk menyimpan data ke sistem.

### 2.2 Spesifikasi Kebutuhan Fungsional
- **Admin Login:** Autentikasi menggunakan username dan password.
- **Manajemen Produk:** Admin dapat menambah, mengedit, atau menghapus produk.
- **Riwayat Pembelian:** Admin dan pembeli dapat melihat riwayat transaksi.
- **FAQ Management:** Admin dapat menambah atau mengedit FAQ.

### 2.3 Spesifikasi Kebutuhan Non-Fungsional
| No | Deskripsi                                                                 |
|----|---------------------------------------------------------------------------|
| 1  | Semua antarmuka menggunakan Bahasa Indonesia.                             |
| 2  | Sistem kompatibel dengan berbagai platform OS.                            |
| 3  | Sistem mampu menangani transaksi pembelian dengan aman dan cepat.        |
| 4  | Laporan keuntungan disajikan dalam bentuk grafik yang mudah dipahami.    |
| 5  | Halaman FAQ mudah diakses oleh pengguna.                                 |

## BAB III Requirement Specification

### 3.1 Kebutuhan Fungsional
#### 3.1.1 Fungsi Admin
- Login menggunakan username dan password.
- Tambah/edit/hapus produk.
- Lihat laporan keuntungan.
- Tambah/edit/hapus FAQ.
- Melihat daftar member.
- Akses riwayat pembelian.

#### 3.1.2 Fungsi Pembeli
- Melihat daftar produk.
- Pencarian produk.
- Membeli produk.
- Melihat riwayat pembelian.
- Akses halaman FAQ.

### 3.2 Kebutuhan Non-Fungsional
#### 3.2.1 Keamanan
- Autentikasi menggunakan username dan password terenkripsi.
- Perlindungan dari serangan seperti SQL injection, XSS, dan CSRF.

#### 3.2.2 Kinerja
- Kecepatan akses optimal.
- Skalabilitas untuk menangani lonjakan pengguna.
- Downtime minimal.

#### 3.2.3 Usability
- Antarmuka mudah digunakan dan responsif.

#### 3.2.4 Kompatibilitas
- Mendukung browser modern.
- Mobile-friendly.

#### 3.2.5 Backup dan Pemulihan
- Backup otomatis setiap hari.
- Rencana pemulihan jika terjadi kegagalan sistem.

## BAB IV Desain Sistem

### 4.1 Arsitektur Sistem
- **Client-Server Architecture**:
  - **Frontend:** HTML, CSS, JavaScript.
  - **Backend:** PHP dan MySQL.
  - **Database:** Menyimpan data produk, pengguna, dan transaksi.

### 4.2 Desain Database
#### Tabel Produk
| Kolom             | Tipe Data   | Deskripsi                                |
|-------------------|------------|----------------------------------------|
| ID                | INTEGER     | Identifikasi unik untuk setiap produk dalam database. |
| NAME              | VARCHAR     | Nama produk.                            |
| PRICE             | DECIMAL     | Harga produk dalam format desimal (contoh: Rp100.000,50). |
| STOCK             | INTEGER     | Jumlah produk yang tersedia di stok toko. |
| DESCRIPTION       | TEXT        | Penjelasan rinci tentang produk, seperti ukuran, warna, dll. |
| CREATED_AT        | DATETIME    | Tanggal dan waktu data produk pertama kali dibuat. |
| UPDATED_AT        | DATETIME    | Tanggal dan waktu terakhir data diperbarui. |
| IS_AVAILABLE_ONLINE | INTEGER   | Status ketersediaan online (0 = tidak tersedia, 1 = tersedia). |
| IMAGE             | VARCHAR     | URL atau path ke gambar produk.         |

#### Tabel Riwayat Pembelian
| Kolom          | Tipe Data   | Deskripsi                                  |
|----------------|------------|------------------------------------------|
| ID             | INTEGER     | Identifikasi unik untuk setiap transaksi atau pembelian. |
| PRODUCT_ID     | INTEGER     | Referensi ke produk yang dibeli.          |
| PURCHASE_DATE  | DATE        | Tanggal saat pembelian dilakukan.         |
| QUANTITY       | INTEGER     | Jumlah produk yang dibeli.                |
| TOTAL_PRICE    | DECIMAL     | Total harga transaksi.                    |
| CREATED_AT     | TIMESTAMP   | Tanggal dan waktu data transaksi dibuat.  |
| UPDATED_AT     | TIMESTAMP   | Tanggal dan waktu terakhir data diperbarui. |
| RATING         | INTEGER     | Penilaian yang diberikan pelanggan (skala 1–5). |

#### Tabel Pengguna (Users)
| Kolom          | Tipe Data   | Deskripsi                                  |
|----------------|------------|------------------------------------------|
| ID             | INTEGER     | Identifikasi unik untuk setiap pengguna.  |
| NAME           | VARCHAR     | Nama lengkap pengguna.                    |
| EMAIL          | VARCHAR     | Alamat email pengguna.                    |
| EMAIL_VERIFIED_AT | TIMESTAMP | Tanggal dan waktu verifikasi email.       |
| PASSWORD       | VARCHAR     | Kata sandi terenkripsi.                   |
| REMEMBER_TOKEN | VARCHAR     | Token untuk menjaga sesi pengguna.        |
| CREATED_AT     | TIMESTAMP   | Tanggal dan waktu data dibuat.            |
| UPDATED_AT     | TIMESTAMP   | Tanggal dan waktu terakhir data diperbarui. |
| ROLE           | VARCHAR     | Peran pengguna, seperti "admin" atau "buyer". |

#### Tabel FAQ
| Kolom          | Tipe Data   | Deskripsi                                  |
|----------------|------------|------------------------------------------|
| ID             | INTEGER     | Identifikasi unik untuk setiap pertanyaan FAQ. |
| QUESTION       | TEXT        | Pertanyaan yang diajukan terkait produk atau layanan. |
| ANSWER         | TEXT        | Jawaban atas pertanyaan tersebut.         |
| CREATED_AT     | DATETIME    | Tanggal dan waktu data FAQ ditambahkan.   |

## BAB V Uji Coba dan Validasi Sistem

### 5.1 Metode Pengujian
1. **Pengujian Fungsional:**
   - Login.
   - Pembelian produk.
   - Manajemen produk dan FAQ.
2. **Pengujian Keamanan:**
   - SQL injection.
   - XSS.
   - CSRF.

### 5.2 Uji Coba Pengguna
- Feedback dari pengguna akan digunakan untuk menyempurnakan sistem.

## BAB VI Penutupan

### 6.1 Kesimpulan
Sistem Julie Toys adalah aplikasi e-commerce yang memfasilitasi jual beli mercun online dengan fitur-fitur utama seperti manajemen produk, laporan keuntungan, dan FAQ.

### 6.2 Rencana Pengembangan
- Integrasi pembayaran online.
- Perhitungan otomatis ongkos kirim.
- Penambahan sistem diskon dan promo.
