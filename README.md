# Arsip Digital

**Copyright © Achmad Diky Setiawan**

---

## Gambaran Umum Proyek

Arsip Digital adalah sistem informasi untuk pengelolaan arsip dokumen digital dengan fitur:
- Manajemen user (admin & user biasa)
- Manajemen kategori (multi-level: kategori, subkategori, group/type)
- Manajemen dokumen dan jenis dokumen
- Pengaturan hak akses user ke kategori tertentu
- Dashboard statistik dan pencarian
- (Opsional) Integrasi dengan API eksternal (Kominfo) untuk agregasi data dokumen nasional

Cocok untuk instansi pemerintah, lembaga, atau organisasi yang membutuhkan pengelolaan arsip terstruktur dan fleksibel.

---

## Cara Clone & Setup

1. **Clone repository ini**
   ```bash
   git clone <repo-url>
   cd arsip-digital
   ```
2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```
3. **Copy file environment dan konfigurasi**
   ```bash
   cp .env.example .env
   # Edit .env sesuai konfigurasi database dan kebutuhan
   ```
4. **Generate application key**
   ```bash
   php artisan key:generate
   ```
5. **Migrasi database dan seed data awal**
   ```bash
   php artisan migrate --seed
   ```
6. **Build assets frontend**
   ```bash
   npm run build
   ```
7. **Jalankan server lokal**
   ```bash
   php artisan serve
   ```
8. **Akses aplikasi**
   - Admin: `http://localhost:8000/admin`
   - User: `http://localhost:8000/home`

---

## SSW ALFA Surabaya

- Layanan Perizinan Lingkungan Hidup
    - Surat Kelayakan Operasional (SLO) (segera)
        - Surat Kelayakan Operasional (SLO) Persetujuan Teknis Pengumpulan Limbah B3 Skala Kota
        - Surat Kelayakan Operasional (SLO) Persetujuan Teknis Pemenuhan Baku Mutu Emisi
        - Surat Kelayakan Operasional (SLO) Persetujuan Teknis Pemenuhan Baku Mutu Air Limbah
    - Persetujuan Teknis Pemenuhan Baku Mutu Air Limbah
        - Perubahan Persetujuan Teknis Pemenuhan Baku Mutu Air Limbah
        - Izin Baru Persetujuan Teknis Pemenuhan Baku Mutu Air Limbah
    - Izin Perabuan Jenazah, Pemindahan, Pengangkutan Jenazah
        - Izin Pengangkutan Jenazah/Kerangka
        - Izin Perubahan Jenazah/Kerangka
        - Izin Pemindahan Jenazah/Kerangka
    - Surat Keputusan Kelayakan Lingkungan Hidup (SKKLH)
        - Analisis Mengenai Dampak Lingkungan (AMDAL)
        - Addendum ANDAL, RKL-RPL
        - Dokumen Evaluasi Lingkungan Hidup (DELH)
        - Perubahan Analisis Mengenai Dampak Lingkungan (AMDAL)
        - Perubahan Addendum ANDAL, RKL-RPL
        - Perubahan Dokumen Evaluasi Lingkungan Hidup (DELH)
    - Persetujuan Pernyataan Kesanggupan Pengelolaan Lingkungan Hidup (Persetujuan PKPLH)
        - Upaya Pengelolaan Lingkungan Hidup – Upaya Pemantauan Lingkungan Hidup (UKL-UPL)
        - Dokumen Pengelolaan Lingkungan Hidup (DPLH)
        - Perubahan Upaya Pengelolaan Lingkungan Hidup – Upaya Pemantauan Lingkungan Hidup (UKL-UPL)
        - Perubahan Dokumen Pengelolaan Lingkungan Hidup (DPLH)
    - Izin Pemakaian Ruang Terbuka Hijau
        - Izin Baru Pemakaian Ruang Terbuka Hijau
    - Izin Penebangan / Pemindahan Pohon
        - Permohonan Penebangan/Pemindahan Pohon Rumah Tinggal
        - Permohonan Penebangan/Pemindahan Pohon Tempat Usaha/Ruko
    - Izin Pembuangan Sampah
        - Izin Baru Pembuangan Sampah
        - Perpanjangan Izin Pembuangan Sampah
    - Persetujuan Teknis Pengumpulan Limbah B3
        - Izin Baru Persetujuan Teknis Pengumpulan Limbah B3
        - Perubahan Persetujuan Teknis Pengumpulan Limbah B3
    - Persetujuan Teknis Pemenuhan Baku Mutu Emisi (segera)
        - Izin Baru Persetujuan Teknis Pemenuhan Baku Mutu Emisi (segera)
- Layanan Kebudayaan, Kepemudaan Olah Raga dan Pariwisata
    - Pemakaian Lapangan/Gedung/Fasilitas dan Stan pada lokasi Wisata
        - Izin Pemakaian Stan pada Taman Hiburan Pantai Kenjeran (Pembayaran dengan VA)
            - Izin Baru Pemakaian Stan pada Taman Hiburan Pantai Kenjeran
            - Perpanjang Izin Pemakaian Stan pada Taman Hiburan Pantai Kenjeran
        - Izin Pemakaian Lahan pada Taman Hiburan Pantai Kenjeran
            - Izin Baru Pemakaian Lahan pada Taman Hiburan Pantai Kenjeran
        - Pemakaian Gedung Balai Budaya
            - Pemakaian Gedung Balai Budaya Ruang Utama Gedung Kesenian Komersial
            - Pemakaian Gedung Balai Budaya Ruang Utama Gedung Kesenian Non Komersial
            - Pemakaian Gedung Balai Budaya Ruang Multi Purpose Gallery (Lantai 1)
            - Pemakaian Gedung Balai Budaya Ruang Lorong Sejarah (Lantai 1)
            - Pemakaian Gedung Balai Budaya Ruang Hall (Lantai 2)
            - Pemakaian Stand Food Court Alun-alun Surabaya
            - Basement Alun-alun Surabaya
        - Pemakaian Gedung Cagar Budaya Balai Pemuda
            - Pemakaian Halaman Balai Pemuda
            - Pemakaian Gedung Balai Pemuda Sisi Barat
            - Pemakaian Gedung Balai Pemuda Sisi Timur
            - Pemakaian Area Balai Pemuda untuk Pengambilan Foto atau Video
            - Pemakaian Tempat Balai Pemuda Untuk Penyelenggaraan Reklame
        - Pemakaian Ruangan / Lahan pada Museum dan Monumen Tugu Pahlawan
            - Museum Olah Raga
            - Museum Sepuluh Nopember
            - Monumen Tugu Pahlawan
            - Pemakaian Halaman Museum Pendidikan Dan Ruang Kelas
    - Pengelolaan Peninggalan Sejarah dan Bangunan Cagar Budaya
        - Pemugaran Bangunan dan / atau Lingkungan Cagar Budaya
        - Pemanfaatan Bangunan dan / atau Lingkungan Cagar Budaya
    - Pemakaian Lapangan/Gedung/Fasilitas Olah Raga
        - Pemakaian Lapangan THOR (Pembayaran dengan VA)
            - KOMERSIAL – Pemakaian Lapangan THOR
            - NON KOMERSIAL – Pemakaian Lapangan THOR
            - SOSIAL – Pemakaian Lapangan THOR
        - Pemakaian Stadion Bung Tomo (Pembayaran VA)
            - Kegiatan Sosial Stadion Bung Tomo
            - Pemakaian Sewa Stadion Bung Tomo Non Komersial
            - Pemakaian Sewa Stadion Bung Tomo Komersial (Event)
            - Pemakaian Lintasan Sepatu Roda Bung Tomo (Event)
            - Pemakaian Sewa Stadion Bung Tomo Komersial (Latihan)
            - Pemakaian Lintasan Sepatu Roda Bung Tomo (Latihan)
            - Pemakaian Sirkuit Gelora Bung Tomo (Event)
            - Pemakaian Sirkuit Gelora Bung Tomo (Latihan)
        - Pemakaian Lapangan Tenis Dharmawangsa (Pembayaran dengan VA)
        - Pemakaian Lapangan Softball Dharmawangsa (Pembayaran dengan VA)
            - KOMERSIAL – Pemakaian Lapangan Softball Dharmawangsa
            - NON KOMERSIAL – Pemakaian Lapangan Softball Dharmawangsa
            - SOSIAL – Pemakaian Lapangan Softball Dharmawangsa
        - Pemakaian Sewa Gelora Pancasila (Pembayaran dengan VA)
            - Pemakaian Sewa Gelora Pancasila Komersial
            - Pemakaian Sewa Gelora Pancasila Non Komersial
            - Pemakaian Sewa Gelora Pancasila Sosial
            - Penggunaan lahan parkir sisi utara Gelora Pancasila untuk kegiatan selain parkir (VA)
        - Pemakaian Gelora 10 Nopember (Pembayaran dengan VA)
            - Kegiatan Sosial Gelora 10 November
            - Kegiatan Non Komersial Gelora 10 November
            - Kegiatan Komersial (Event) Gelora 10 November
            - Pemakaian Gedung Serba Guna Gelora 10 November
            - Kegiatan Latihan Pagi / Sore Gelora 10 November
        - Pemakaian Lapangan Hockey Dharmawangsa
            - KOMERSIAL – Pemakaian Lapangan Hockey Dharmawangsa
            - NON KOMERSIAL – Pemakaian Lapangan Hockey Dharmawangsa
            - SOSIAL – Pemakaian Lapangan Hockey Dharmawangsa
        - Pemakaian Gelanggang Remaja (Pembayaran VA)
            - Pemakaian Gelanggang Remaja untuk Latihan
            - Pemakaian Gelanggang Remaja untuk Pertandingan
            - Pemakaian Gelanggang Remaja untuk Kegiatan Non Olahraga
- Layanan Pendidikan
    - Daftar Ulang Izin Operasional Satuan Pendidikan
        - Daftar Uulang Izin Operasional Satuan Pendidikan SD
        - Daftar Uulang Izin Operasional Satuan Pendidikan SMP
        - Daftar Uulang Izin Operasional Satuan Pendidikan KB
        - Daftar Ulang Izin Operasional Satuan Pendidikan PPT
        - Daftar Ulang Izin Operasional Satuan Pendidikan TPA
        - Daftar Ulang Izin Operasional Satuan Pendidikan TK
        - Daftar Ulang Izin Operasional Satuan Pendidikan PKBM
        - Daftar Ulang Izin Operasional Satuan Pendidikan LKP
    - Izin Pendirian Satuan Pendidikan
        - Izin Pendirian Satuan Pendidikan Sekolah Dasar
        - Izin Pendirian Satuan Pendidikan Menengah Pertama
        - Izin Pendirian Satuan Pendidikan TK (Taman Kanak-Kanak)
        - Izin Pendirian Satuan Pendidikan PAUD
        - Izin Pendirian Satuan Pendidikan KB (Kelompok Bermain)
        - Izin Pendirian Satuan Pendidikan TPA (Tempat Penitipan Anak)
        - Izin Pendirian Satuan Pendidikan LKP (Lembaga Khusus dan Pelatihan)
        - Izin Pendirian Satuan Pendidikan PKBM (Pusat Kegiatan Belajar Masyarakat)
    - Izin Operasional Satuan Pendidikan
        - Izin Operasional Satuan Pendidikan Sekolah Dasar
        - Izin Operasional Satuan Pendidikan Sekolah Menengah Pertama
        - Izin Operasional Satuan Pendidikan TK (Taman Kanak-Kanak)
        - Izin Operasional Satuan Pendidikan PPT (Pos PAUD Terpadu)
        - Izin Operasional Satuan Pendidikan KB (Kelompok Bermain)
        - Izin Operasional Satuan Pendidikan TPA (Tempat Penitipan Anak)
        - Izin Operasional Satuan Pendidikan LKP (Lembaga Khusus Pelatihan)
        - Izin Operasional Satuan Pendidikan PKBM (Pusat Kegiatan Belajar Masyarakat)
    - Perubahan Izin Operasional Pendidikan
        - Perubahan Izin Operasional Pendidikan SD
        - Perubahan Izin Operasional Pendidikan PPT
        - Perubahan Izin Operasional Pendidikan KB
        - Perubahan Izin Operasional Pendidikan SMP
        - Perubahan Izin Operasional Pendidikan TK
        - Perubahan Izin Operasional Pendidikan TPA
        - Perubahan Izin Operasional Pendidikan PKBM
        - Perubahan Izin Operasional Pendidikan LKP
- Layanan Kesehatan
    - Surat Rekomendasi Penunjang Antar OPD
        - Surat Rekomendasi Penggalian, Pemindahan Jenazah dan/atau Kerangka Jenazah
        - Surat Rekomendasi Pengangkutan, Pengabuan atau Kremasi Jenazah dan/atau Kerangka Jenazah
            - Surat Rekomendasi Pengangkutan, Pengaguan atau Kremasi Jenazah dan/atau Kerangka Jenazah kematian disebabkan oleh penyakit menular
            - Surat Rekomendasi Pengangkutan, Pengabuan atau Kremasi Jenazah dan/atau Kerangka Jenazah kematian disebabkan oleh penyakit tidak menular
    - Tenaga Kesehatan Penunjang Medis
        - Dokter / Dr. Gigi / Dr. Spesialis / Dr. Gigi Spesialis
            - Sarana-Izin Baru Praktik Dokter Umum/Gigi/Spesialis/Spesialis Gigi
            - Sarana-Perpanjangan Izin Praktik Dokter Umum/Gigi/Spesialis/Spesialis Gigi
            - Sarana-Pencabutan Izin Praktik Dokter Umum/Gigi/Spesialis/Spesialis Gigi
            - Perorangan-Izin Baru Praktik Dokter Umum/Gigi/Spesialis/Spesialis Gigi
            - Perorangan-Perpanjangan Izin Praktik Dokter Umum/Gigi/Spesialis/Spesialis Gigi
            - Perorangan-Pencabutan Izin Praktik Dokter Umum/Gigi/Spesialis/Spesialis Gigi
        - Perawat - SIPP
            - Sarana–Izin Baru Praktik Perawat – SIPP
            - Sarana–Perpanjangan Izin Praktik Perawat – SIPP
            - Sarana–Pencabutan Izin Praktik Perawat – SIPP
            - Perorangan–Izin Baru Praktik Perawat – SIPP
            - Perorangan–Perpanjangan Izin Praktik Perawat – SIPP
            - Perorangan–Pencabutan Izin Praktik Perawat – SIPP
        - Bidan - SIPB
            - Sarana–Izin Baru Praktik Bidan – SIPB
            - Sarana–Perpanjangan Izin Praktik Bidan – SIPB
            - Sarana–Pencabutan Izin Praktik Bidan – SIPB
            - Perorangan–Izin Baru Praktik Bidan – SIPB
            - Perorangan–Perpanjangan Izin Praktik Bidan – SIPB
            - Perorangan–Pencabutan Izin Praktik Bidan – SIPB
        - Perekam Medis - SIKPM
            - Izin Kerja Baru Perekam Medis – SIKPM
            - Perpanjangan Izin Kerja Perekam Medis – SIKPM
            - Pencabutan Izin Kerja Perekam Medis – SIKPM
        - Penata Anestesi - SIPPA
            - Izin Baru Praktik Tenaga Penata Anestesi – SIPPA
            - Perpanjangan Izin Praktik Tenaga Penata Anestesi – SIPPA
            - Pencabutan Praktik Tenaga Penata Anestesi – SIPPA
        - Apoteker - SIPA
            - Izin Baru Praktik Tenaga Apoteker – SIPA
            - Perpanjangan Izin Praktik Tenaga Apoteker – SIPA
            - Pencabutan Izin Praktik Tenaga Apoteker – SIPA
            - Pergantian Tenaga Apoteker – SIPA
        - Tenaga Teknis Kefarmasian - SIPTTK
            - Izin Baru Praktik Teknis Kefarmasian – SIPTTK
            - Perpanjangan Izin Praktik Teknis Kefarmasian – SIPTTK
            - Pencabutan Izin Praktik Teknis Kefarmasian – SIPTTK
            - Pergantian Teknis Kefarmasian – SIPTTK
        - Tenaga Sanitarian - SIKTS
            - Izin Baru Kerja Tenaga Sanitarian – SIKTS
            - Perpanjangan Izin Kerja Tenaga Sanitarian – SIKTS
            - Pencabutan Izin Kerja Tenaga Sanitarian – SIKTS
        - Tenaga Gizi - SIKTGz
            - Sarana-Izin Baru Tenaga Gizi – SIKTGz
            - Sarana-Perpanjangan Izin Tenaga Gizi – SIKTGz
            - Sarana-Pencabutan Izin Tenaga Gizi – SIKTGz
            - Perorangan-Izin Baru Tenaga Gizi – SIPTGz
            - Perorangan-Perpanjangan Izin Tenaga Gizi – SIPTGz
            - Perorangan-Pencabutan Izin Tenaga Gizi – SIPTGz
        - Okupasi Terapis - SIPOT
            - Sarana–Izin Baru Tenaga Okupasi Terapis – SIKOT
            - Sarana–Perpanjangan Izin Tenaga Okupasi Terapis – SIKOT
            - Sarana–Pencabutan Izin Tenaga Okupasi Terapis – SIKOT
            - Perorangan–Perpanjangan Izin Tenaga Okupasi Terapis – SIPOT
            - Perorangan–Pencabutan Izin Tenaga Okupasi Terapis – SIPOT
            - Perorangan–Izin Baru Tenaga Okupasi Terapis – SIPOT
        - Terapis Wicara - SIPTW
            - Sarana-Izin Baru Tenaga Terapis Wicara – SIPTW
            - Sarana-Perpanjangan Izin Tenaga Terapis Wicara – SIPTW
            - Sarana-Pencabutan Izin Tenaga Terapis Wicara – SIPTW
            - Perorangan-Izin Baru Tenaga Terapis Wicara – SIPTW
            - Perorangan-Perpanjangan Izin Tenaga Terapis Wicara – SIPTW
            - Perorangan-Pencabutan Izin Tenaga Terapis Wicara – SIPTW
        - Fisioterapis - SIPF
            - Sarana-Izin Baru Tenaga Fisioterapis – SIPF
            - Sarana-Perpanjangan Izin Tenaga Fisioterapis – SIPF
            - Sarana-Pencabutan Izin Tenaga Fisioterapis – SIPF
            - Perorangan-Izin Baru Tenaga Fisioterapis – SIPF
            - Perorangan-Perpanjangan Izin Tenaga Fisioterapis – SIPF
            - Perorangan-Pencabutan Izin Tenaga Fisioterapis – SIPF
        - Radiografer - SIKR
            - Izin Baru Kerja Tenaga Radiografer – SIKR
            - Perpanjangan Izin Kerja Tenaga Radiografer – SIKR
            - Pencabutan Izin Kerja Tenaga Radiografer – SIKR
        - Teknisi Gigi - SIKTG
            - Izin Baru Kerja Tenaga Teknis Gigi – SIKTG
            - Perpanjangan Izin Kerja Tenaga Teknis Gigi – SIKTG
            - Pencabutan Izin Kerja Tenaga Teknis Gigi – SIKTG
        - Ortotis Prostetis - SIPOP
            - Sarana-Izin Baru Surat Izin Praktik Ortotis Prostetis – SIKOP
            - Sarana-Perpanjanganan Izin Praktik Ortotis Prostetis – SIKOP
            - Sarana-Pencabutan Izin Praktik Ortotis Prostetis – SIKOP
            - Perorangan-Izin Baru Kerja Ortotis Prostetis – SIPOP
            - Perorangan-Perpanjangan Izin Kerja Ortotis Prostetis – SIPOP
            - Perorangan-Pencabutan Izin Kerja Ortotis Prostetis – SIPOP
            - Perorangan-Cabut Pindah Izin Kerja Ortotis Prostetis – SIPOP
        - Refraksionis Optisien - SIKRO
            - Izin Baru Kerja Refraksionis Optisien – SIKRO/ SIK0
            - Perpanjangan Izin Kerja Refraksionis Optisien – SIKRO/ SIKO
            - Pencabutan Izin Kerja Refraksionis Optisien – SIKRO/ SIKO
            - Pergantian Penanggung Jawab Izin Kerja Refraksionis Optisien – SIKRO/ SIKO
        - Elektromedis - SIPE
            - Izin Baru Praktik Elektromedis – SIP E
            - Perpanjangan Izin Praktik Elektromedis – SIP E
            - Pencabutan Izin Praktik Elektromedis – SIP E
        - Tenaga Kesehatan Tradisional - SIPTKT
            - Perorangan-Izin Baru Praktik Tenaga Kesehatan Tradisional – SIPTKT
            - Perorangan-Perpanjangan Izin Praktik Tenaga Kesehatan Tradisional – SIPTKT
            - Perorangan-Pencabutan Izin Praktik Tenaga Kesehatan Tradisional – SIPTKT
            - Sarana-Izin Baru Praktik Tenaga Kesehatan Tradisional – SIPTKT
            - Sarana-Perpanjangan Izin Praktik Tenaga Kesehatan Tradisional – SIPTKT
            - Sarana-Pencabutan Izin Praktik Tenaga Kesehatan Tradisional – SIPTKT
        - Terapis Gigi dan Mulut - SIPTGM
            - Sarana-Izin Praktik Terapis Gigi dan Mulut – SIPTGM
            - Sarana-Perpanjangan Izin Praktik Terapis Gigi dan Mulut – SIPTGM
            - Sarana-Pencabutan Izin Praktik Terapis Gigi dan Mulut – SIPTGM
            - Perorangan-Izin Praktik Terapis Gigi dan Mulut – SIPTGM
            - Perorangan-Perpanjangan Izin Praktik Terapis Gigi dan Mulut – SIPTGM
            - Perorangan-Pencabutan Izin Praktik Terapis Gigi dan Mulut – SIPTGM
        - Psikolog Klinis - SIPPK
            - Sarana-Izin Baru Praktik Psikolog Klinis – SIPPK
            - Sarana-Perpanjanganan Izin Praktik Psikolog Klinis – SIPPK
            - Sarana-Pencabutan Izin Praktik Psikolog Klinis – SIPPK
            - Perorangan-Izin Baru Praktik Psikolog Klinis – SIPPK
            - Perorangan-Perpanjangan Izin Praktik Psikolog Klinis – SIPPK
            - Perorangan-Pencabutan Izin Praktik Psikolog Klinis – SIPPK
        - Ahli Teknologi Lab. Medik - ATLM
            - Izin Praktik Baru Ahli Teknologi Laboratorium Medik – ATLM
            - Perpanjangan Izin Praktik Baru Ahli Teknologi Laboratorium Medik – ATLM
            - Pencabutan Ahli Teknologi Laboratorium Medik – ATLM
        - Akupuntur Terapis - SIPAT
            - Sarana-Izin Baru Tenaga Akupunktur Terapis – SIPAT
            - Sarana-Perpanjanganan Izin Tenaga Akupuntur Terapis – SIPAT
            - Sarana-Pencabutan Izin Tenaga Akupuntur Terapis – SIPAT
            - Perorangan-Perpanjangan Izin Tenaga Akupuntur Terapis – SIPAT
            - Perorangan-Izin Baru Tenaga Akupuntur Terapis – SIPAT
            - Perorangan-Pencabutan Izin Tenaga Akupuntur Terapis – SIPAT
        - Izin Praktik Tenaga Kesehatan Tradisional Jamu
            - Perorangan-Pencabutan Izin Praktik Tenaga Kesehatan Tradisional Jamu
            - Perorangan-Perpanjanganan Izin Praktik Tenaga Kesehatan Tradisional Jamu
            - Sarana-Izin Baru Praktik Tenaga Kesehatan Tradisional Jamu
            - Sarana-Perpanjanganan Izin Praktik Tenaga Kesehatan Tradisional Jamu
            - Sarana-Pencabutan Izin Praktik Tenaga Kesehatan Tradisional Jamu
            - Perorangan-Izin Baru Praktik Tenaga Kesehatan Tradisional Jamu
        - Izin Praktik Teknisi Kardiovaskuler
            - Izin Baru Praktik Teknis Kedokteran Kardiovaskuler
            - Perpanjangan Izin Praktik Teknis Kedokteran Kardiovaskuler
            - Pencabutan Izin Praktik Teknis Kedokteran Kardiovaskuler
        - Tenaga Kesehatan Tradisional Interkontinental
            - Perorangan-Ilizin Baru SIPKT Interkontinental
            - Perorangan-Perpanjangan SIPKT Interkontinental
            - Perorangan-Pencabutan SIPKT Interkontinental
            - Sarana-Izin Baru SIPKT Interkontinental
            - Sarana-Perpanjangan SIPKT Interkontinental
            - Sarana-Pencabutan SIPKT Interkontinental
        - Izin Tukang Gigi
            - Izin Tukang Gigi – Baru
            - Izin Tukang Gigi – Perpanjang
            - Izin Tukang Gigi – Pencabutan
        - Izin Praktik Teknisi Pelayanan Darah
            - Izin Praktik Teknis Pelayanan Darah – Baru
            - Izin Praktik Teknis Pelayanan Darah – Perpanjangan
            - Izin Praktik Teknis Pelayanan Darah – Pencabutan
        - Fisikawan Medis (Baru)
            - Surat Izin Praktik Fisikawan Medis – Baru
            - Surat Izin Praktik Fisikawan Medis – Perpanjangan
            - Surat Izin Praktik Fisikawan Medis – Pencabutan
        - Izin Praktik Audiologis (Baru)
            - Izin Praktik Audiology – Baru
            - Izin Praktik Audiology – Perpanjangan
            - Izin Praktik Audiology – Pencabutan
        - Izin Praktik Entomolog Kesehatan (Baru)
            - Izin Praktik Entomologi Kesehatan – Baru
            - Izin Praktik Entomologi Kesehatan – Perpanjangan
            - Izin Praktik Entomologi Kesehatan – Pencabutan
    - Sarana Kesehatan
        - Laboratorium Medis
            - Laboratorium Medis - Penutupan
        - Penyelenggaraan Rumah Sakit Pemerintah Kelas C & D
            - Penutupan Izin Operasional Rumah Sakit Pemerintah Kelas C & D
        - Operasional Klinik Pratama / Utama Rawat Jalan Pemerintah
            - Penutupan Operasional Klinik Pratama dan Klinik Utama Rawat Jalan
        - Operasional Klinik Pratama / Utama Rawat Inap Pemerintah
            - Penutupan Operasional Klinik Pratama dan Klinik Utama Rawat Inap
        - Penyelenggaraan Optikal
            - Izin Penutupan Penyelenggarakan Optikal
        - Izin Penyelenggaraan Apotik
            - Penutupan Apotik
        - Penyelenggaraan Toko Obat
            - Penutupan Izin Penyelenggarakan Toko Obat
        - Izin Penyelenggaraan Air Minum Isi Ulang
            - Izin Penyelenggarkaan Air Minum Isi Ulang - Penutupan
        - Penyelenggaraan Toko Alat Kesehatan
            - Penutupan Izin Toko Alat Kesehatan
        - Penyelenggaraan Panti Sehat
            - Penutupan Izin Panti Sehat
        - Usaha Mikro Obat Tradisional - UMOT
            - Pencabutan Izin Usaha Mikro Obat Tradisional - UMOT
        - Izin Penyelenggaraan Puskesmas
            - Izin Penyelenggaraan Puskesmas - Baru
            - Izin Penyelegaraan Puskesmas - Perpanjangan
        - Surat Usulan Laboratorium Pemeriksaan Covid19
        - Sertifikat Standar Toko Obat (Segera)
            - Setifikat Baru Standar Toko Obat
        - Izin Berusaha Klinik Pemerintah Non BLU atau Non BLUD
            - Izin Berusaha Klinik Pemerintah Non BLU atau Non BLUD - Baru
            - Izin Berusaha Klinik Pemerintah Non BLU atau Non BLUD - Perpanjangan
            - Izin Berusaha Klinik Pemerintah Non BLU atau Non BLUD - Perubahan
    - Rekomendasi Sarana Kesehatan
        - Rekomendasi Kesehatan Izin Laik Fungsi Bangunan
    - Surat Terdaftar Penyehat Tradisional (STPT)
        - Sarana-Ijin Baru Surat Terdaftar Penyehat Tradisional - STPT
        - Sarana-Perpanjangan Surat Terdaftar Penyehat Tradisional - STPT
        - Sarana-Pencabutan Surat Terdaftar Penyehat Tradisional - STPT
        - Perorangan-Ijin Baru Surat Terdaftar Penyehat Tradisional - STPT
        - Perorangan-Perpanjangan Surat Terdaftar Penyehat Tradisional - STPT
        - Perorangan-Pencabutan Surat Terdaftar Penyehat Tradisional - STPT
    - Sertifikat Kesehatan
        - Surat Keterangan Kesesuaian Peruntukan Lokasi dan Lahan serta Pertimbangan Kebutuhan Rumah Sakit
            - Ijin Baru Surat Keterangan Kesesuaian Peruntukan Lokasi dan Lahan serta Pertimbangan Kebutuhan Rumah Sakit
            - Perpanjangan Surat Keterangan Kesesuaian Peruntukan Lokasi dan Lahan serta Pertimbangan Kebutuhan Rumah Sakit
            - Pencabutan Surat Keterangan Kesesuaian Peruntukan Lokasi dan Lahan serta Pertimbangan Kebutuhan Rumah Sakit
        - Surat Keterangan Laik Sehat Hotel
            - Surat Keterangan Baru Laik Sehat Hotel
            - Perpanjangan Surat Keterangan Laik Sehat Hotel
            - Penutupan Surat Keterangan Laik Sehat Hotel
        - Sertifikat Laik Sehat Hygiene Sanitasi Restoran/Rumah Makan
            - Sertifikasi Baru Laik Hygiene Sanitasi Rumah Makan / Restoran
            - Perpanjangan Sertifikasi Laik Hygiene Sanitasi Rumah Makan / Restoran
            - Penutupan Sertifikasi Laik Hygiene Sanitasi Rumah Makan / Restoran
        - Sertifikat Penyuluhan Keamanan Pangan
            - Perpanjangan Sertifikat Penyuluhan Keamanan Pangan
            - Penutupan Sertifikat Penyuluhan Keamanan Pangan
            - Permohonan Baru Sertifikat Penyuluhan Keamanan Pangan
        - Sertifikat Laik Hygiene Sanitasi Jasa Boga
            - Sertifikasi Laik Hygiene Sanitiasi Jasa Boga
            - Perpanjangan Sertifikat Laik Hygiene Sanitiasi Jasa Boga
            - Penutupan Sertifikat Laik Hygiene Sanitiasi Jasa Boga
- Layanan Perhubungan Angkutan dan Lalu Lintas
    1. ANDALALIN
        - Andal Lalin Kategori Rendah (R)
        - Andal Lalin Kategori Seang (S)
        - Andal Lalin Kategori Tinggi (T)
    2. Surat Keterangan Pemakaian Kios/Stand di Terminal Penumpang Umum
        - Surat Keterangan Baru Pemakaian Kios/Stand di Terminal Penumpang Umum
        - Surat Keterangan Perpanjangan Pemakaian Kios/Stand di Terminal Penumpang Umum
    3. Izin Insidentil
    4. Rekomendasi Perubahan Peruntukan Angkutan Umum menjadi Pribadi
        - Rekomendasi Perubahan Peruntukan Angkot
        - Rekomendasi Perubahan Peruntukan Taksi
    5. Rekomendasi Peremajaan/Pergantian Kendaraan Angkutan Umum
        - Rekomendasi Peremajaan Angkutan Penumpang Umum (Bus Kota)
        - Rekomendasi Peremajaan Angkutan umum (Angkota)
    6. Mutasi Izin Keluar Kendaraan
        - Jumlah Berat Bruto (JBB) > 3.500kg (PKB. Tandes)
        - Jumlah Berat Bruto (JBB) > 3.500kg (PKB. Wiyung)
    7. Izin Penyelenggaraan Tempat Parkir
        - Izin Baru Penyelenggaraan Tempat Parkir
        - Perpanjangan Penyelengaaraan Tempat Parkir
- Layanan Sumber Daya Air dan Bina Marga
    1. Arahan Sistem Drainase
    2. Perpanjangan Izin Penempatan Jaringan Utilitas
    3. Izin Pelaksanaan Kegiatan Pembangunan
        - Izin Pelaksanaan Kegiatan – Baru
        - Izin Pelaksanaan Kegiatan – Darurat
        - Izin Pelaksanaan Kegiatan – Perpanjangan
- Layanan Pemakaian Aset Daerah
    1. Persetujuan Perizinan Pemakaian Tanah (IPT)
        - Persetujuan SKRK Pecah atau Gabung IPT
            - Rekomendasi SKRK untuk Penggabungan IPT
            - Rekomendasi SKRK untuk Pemecahan IPT
        - Persetujuan SKRK Peresmian Pemutihan
        - Persetujuan Penjaminan Bangunan
        - Persetujuan Penjaminan Bangunan Baru
            - Persetujuan Penjaminan Bangunan Perpanjangan
            - Persetujuan Penjaminan Bangunan Baru
            - Persetujuan Pengalihan Hak IPT
    2. Perizinan Pemakian Rumah (IPR)
        - Retribusi IPR
            - Retribusi Tahunan IPR (Normal)
        - Izin Pemakaian Rumah
            - Baru Izin Pemakian Rumah (IPR)
            - Perpanjangan Izin Pemakaian Rumah (IPR)
            - Pengalihan Hak izin Pemakaian Rumah (IPR)
            - Rekomendasi Pengalihan Hak Izin Pemakaian Rumah (IPR)
    3. Perizinan Pemakian Gedung, Wisma/Kamar, Ruangan/Kelas
        - Pemakaian Gedung Diklat Kepegawaian/Pusat Pendidikan dan Pelatihan
        - Pemakaian Wisma/Penginapan Gelora 10 Nopember (Pembayaran dengan VA)
    4. Perizinan Pemakaian Tanah (IPT)
        - Pengganti IPT
        - Peningkatan Jangka Waktu IPT
        - Perubahan IPT
        - Perpanjangan Izin Pemakaian Tanah
        - Pengalihan Izin Pemakian Tanah
        - Retribusi IPT
        - Peresmian IPT
        - Pemutihan IPT
        - Permohonan Pecah atau Gabung IPT
            - Permohonan Penggabungan IPT
            - Permohonan Pemecahan IPT
        - Blokir IPT
        - Penghapusan Blokir IPT
        - Pengurangan Jangka Waktu IPT
- Layanan Penanggulangan Bencana
    1. Izin Penyelenggaraan Pengumpulan Sumbangan (Bencana)
- Layanan Pemadam Kebakaran dan Penyelamatan
    1. Izin Pemakaian Gedung/Fasilitas Pusat Pendidikan dan Pelatihan Keterampilan Tenaga Kebakaran
    2. Rekomendasi Sistem, Proteksi Kebakaran
- Layanan Perumahan Rakyat, Kawasan Permukiman & Pertanahan
    1. Persetujuan Bangunan Gedung (PBG)
        - PBG Non Rumah Tinggal Non Usaha Mikro Bukan Bangunan Gedung
        - PBG Non Rumah Tinggal Non Usaha Mikro Tidak Sederhana
        - PBG Menara Telekomunikasi
        - PBG Rumah Tinggal pengembang
        - PBG Non Rumah Tinggal Usaha Mikro
        - PBG Non Rumah Tinggal Non Usaha Mikro Sederhana
        - PBG Rumah Tinggal Tidak Sederhana
        - PBG Non Rumah Tinggal Melalui TPA
        - PBG Rumah Tinggal Sederhana
    2. Sertifikat Laik Fungsi (SLF) Bersyarat
        - Baru SLF Bersyarat NRT Sederhana
        - Baru SLF Bersyarat NRT Non Sederhana
    3. Izin Pemakaian Rusun
        - Pemberian Izin Pemakaian Rusun
        - Perpanjangan Izin Pemakaian Rusun
    4. Keterangan Rencana Kota (KRK)
        - KRK Peta Lokasi Menara Telekomunikasi
        - KRK Rumah Tinggal Sederhana
        - KRK Non Rumah tinggal
        - KRK Non Rumah Tinggal Melalui TPA/Siteplan
        - KRK Rumah Tinggal Tidak Sederhana
    5. Sertifikat Laik Fungsi (SLF)
        - Perizinan Baru Sertifikat Laik Fungsi (SLF) Non Rumah Tinggal Bangunan Sederhana = non rumah tinggal dengan jumlah lantai banguanan diatas 2 lantai dengan luas bangunna lebih dari 500 m2
        - Perizinan Baru Sertifikat laik fungsi (SLF) Non Rumah Tinggal Bangunan Tidak Sederhana = bangunan gedung non rumah tinggal dengan luas bangunan paling sedikit 2.500 m2, rumah susun, dan apartemen
    6. Rekomendasi Pertelaan
- Layanan Sosial Kemasyarakatan
    1. Izin pengumpulan sumbangan (sosial)
    2. Rekomendasi izin pengangkatan anak – adopsi
        - Rekomendasi Izin Adopsi
    3. Surat tanda pendaftaran lembaga kesejahteraan sosial (STP-LKS)
        - Baru Surat Tanda Pendaftaran lembaga Kesejahtearaan sosial (STP-LKS)
        - Perpanjangan Surat Tanda Pendaftaran Lembaga Kesejahteraan Sosial (STP-LKS)
        - Perubahan Surat Tanda Pendaftararan Lembaga Kesejahteraan Sosial (STP-LKS)
- Layanan Koperasi Usaha Kecil dan Menengah dan Perdagangan
    1. Keterangan Susunan Pengurusan Dan Pengawan Koperasi
        - Pembaruan Keterangan Susunan Pengurus dan Pengawas Koperasi
        - Keterangan Susunan Pengurus dan penagwas Koperasi
    2. Pelayanan Pemakaian Stan Sentra Makanan dan Minuman
        - Izin Pemakaian Stan Snetra Makanan dan Minuman
        - Izin Pemakaian Stan Makanan dan Minuman – Perpanjangan
- Layanan Perindustrian Ketenagakerjaan
    1. Pendaftaran Perjanjian Alih Daya
    2. Pencatatan Serikat Pekerja/Buruh
        - Pencatatan Federasi Serikat/Pekerja/Federasi Buruh
        - Pencatatan Konfederasi Serikat Pekerja/Konfederasi Buruh
        - Pemcatatan Setikat Pekerja/Serikat Buruh
    3. Pendaftaran Perjanjian Kerja Bersama (PKB)
        - Baru Perjanjian Kerja Bersama (PKB)
        - Perpanjangan Perjanjian Kerja Bersama (PKB)
        - Pembaharuan Perjanjian Kerja Bersama (PKB)
    4. Tanda Daftar Lembaga Pelatihan Kerja (LPK)
        - Lembaga Pelatihan Kerja (LPK) Pemerintah
            - Izin Baru Lembaga Pelatihan Kerja (LPK) Pemerintah
            - Perubahan Lembaga Pelatihan Kerja (LPK) Pemerintah
        - Lembaga Pelatihan Kerja (LPK) Perusahaan
            - Izin Baru Lembaga Pelatihan Kerja (LPK) Perushaan
            - Perubahan Lembaga Pelatihan Kerja (LPK) Perusahaan
    5. Tanda Daftar BKK
        - Tanda Daftar Bursa Kerja Khusus (BKK)
        - Perubahan Penanggung Jawab Tanda Daftar BKK
    6. Pencatatan lembaga Kerjas Sama (LKS) Bipartit
    7. Pencatatan Perjanjian Kerja Waktu Tertentu (PKWT)
    8. Pengesahan Peraturan Perusahaan (PP)
        - Pengesahan Baru Peraturan Perusahaan (PP)
        - Pembaharuan Peraturan Perusahaan (PP)
        - Perubahan Peraturan Perusahaan (PP)
- Layanan Pertanian dan Ketahanan Pangan
    1. Pemakaian Hutan Kota (segera hadir)
        - Sewa Stand/Area/Lokasi Spanduk Hutan Kota
        - Pemakaian Panggung/Lahan Hutan Kota
    2. Pemakaian Adventure Land Romokalisari (segera hadir)
        - Sewa Stand/Area/Lokasi Spanduk Adventure Land Romokalisari
        - Pemakaian Panggung/Lahan Adventure Land Romokalisari
    3. Keterangan Terdaftar Kelompok Usaha Garam Rakyat (KUGAR)
    4. Surat Persetujuan Pemakaian Stand Sentra Ikan Hias
        - Baru – Surat Persetujuan Pemakaian Stand Sentra Ikan Hias
        - Perpanjangan - Surat Persetujuan Pemakaian Stand Sentra Ikan Hias
    5. Keterangan Terdaftar Kelompok Wanita Tani (KWT)
    6. Surat Keterangan Pemenuhan Persyaratan Teknis untuk SIVET
        - Keterangan Pemenuhan Persyaratan Teknis Untuk Sivet ( Ambulatori)
        - Keterangan Pemenuhan Persyaratan Teknis Untuk Sivet (Klinik Hewan)
        - Keterangan Pemenuhan Persyaratan Teknis Untuk Sivet (Rumah Sakit Hewan)
    7. Surat Keterangan Pemenuhan Tempat Praktik Dokter Hewan & Rekomendasi Dinas Daerah Kota Surabaya
    8. Rekomendasi Nomor Kontrol Veteriner
    9. Keterangan Terdaftar Kelompok Usaha Bersama (KUB) Nelayana
    10. Rekomendasi Instalasi Karantina Hewan
        - Rekomendasi Instalasi Karantina Hewan Sementara
        - Rekomendasi Instalasi Karantina Produk Hewan Sementara
    11. Keterangan Terdaftar Kelompok Tani Peternak
    12. Surat Keterangan Pemenuhan Persyaratan Tempat Pelayanan Paramedik Veteriner
    13. Keterangan Terdaftar Kelompok Pengolah dan Pemasar Ikan (POKLAHSAR)
    14. Keterangan Terdaftar Kelompok Pembudidaya Ikan (POKDAKAN)
    15. Pemakaian Kebun Raya Mangrove (segera hadir)
        - Sewa Stand/Area/Ruangan/Lokasi Spanduk Kebun Raya Mangrove
        - Pemakaian Penggung/Lahan Kebun Raya Mangrove
    16. Keterangan Terdaftar Kelompok Petani
        - Keterangan Terdaftar Kelompok Tani
        - Keterangan Terdaftar Kelompok Tani Perkotaan
    17. Keterangan Terdaftar Kelompok Masyarakat Pengawas (POKMASWAS)
- Layanan Perpustakaan dan Kearsipan
    1. Tanda Daftar Perpustakaan
        - Tanda Daftar Perpustakaan – Baru
        - Tanda Daftar Perpustakaan – Perpanjangan
- Layanan Penelitian / Magang PKL
    1. Surat Keterangan Penelitian (SKP)
        1. Surat Keterangan Penelitian
- Layanan Metrologi Legal
    1. Layanan Tera/Tera Ulang
        - Tera di Kantor UPTD
        - Tera di Sidang Pasar
        - Tera di Tempat Terpasang UTTP (Loko)
        - Tera Ulang di Kantor UPTD
        - Tera Ulang di Sidang Pasar
        - Tera Ulang di Tempat Terpasang UTTP (Loko)
    2. Rekomendasi Tanda Daftar Reparasi
        - Rekomendasi Penerbitan Tanda Daftar Reparasi
        - Rekomendasi Perpanjangan Tanda Daftar Reparasi
        - Persetujuan Penambahan Cakupan Wilayah Kerja Tanda Daftar Reparasi
        - Rekomendasi Penambahan Ruang Lingkup Tanda Daftar Reparasi
- Layanan Kelurahan
    1. Rangkaian Pelayanan Surat Pernyataan Belum Memiliki Rumah
    2. Rangkaian pelayanan Surat Pengantar Nikah
    3. Rangkaian Pelayanan Surat Pernyataan Tidak Memiliki Rumah
    4. Rangkaian Pelayanan Pernyataan Belum Pernah Menikah
    5. Pelayanan Surat Kuasa Khusus Untuk Pembayaran pensiun
    6. Rangkaian Pelayanan Surat Pernyataan Belum Menikah Lagi Bagi Janda/Duda
    7. Pelayanan Surat Keterangan Izin suami/istri/izin orang tua, atau izin wali (persyaratan pekerja migran Indonesia)
    8. Rangkaian Pelayanan Surat Pengantar Nikah (untuk perempuan, yang akan dipoligami)
    9. Pelayanan Surat Kuasa Penunjukan Pelimpahan Nomor Porsi Jemaah Haji Meninggal Dunia (persyaratan pelimpahan nomor porsi haji)
    10. Pelayanan Surat Pernyataan, Surat Pernyataan Belum Pernah Menikah, Surat Persetujuan Orang Tua/Wali, Daftar Riwayat Hidup untuk Pendaftar Sebagai TNI
    11. Rangkaian Pelayanan Surat Pengantar Nikah (untuk laki-laki berstatus Kawin, yang akan berpoligami)
    12. Pelayanan Surat Permohonan Penerbitan BPKB (untuk kehilangan BPKB)
    13. Surat Keterangan Ahli Waris (SKAW)
        - Orang Tua dan Pasangan dalam Perkawinan Sebagai Pewaris (SKAW)
        - Anak Kandung yang Belum Menikah dan Belum Punya Anak Sebagai Pewaris (SKAW)
    14. Rangkaian Pelayanan Surat Pernyataan Penghasilan Untuk Non Formal
    15. Rangkaian Pelayanan Surat Keterangan Domisili (Lembaga Berbadan Hukum, lembaga Berbadan Usaha, Lembaga Non Berbadan Hukum dan Lembaga Non Berbadan Usaha)
- Layanan RT / RW
    1. Surat Pengantar RT RW
- Layanan Pajak dan Reklame
    1. Reklame Insidentil
    2. Izin Penyelenggaraan Reklame Permanen Sampai dengan 8 meter persegi
        - Izin Baru Reklame Permanen Sampai dengan 8 meter persegi

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
