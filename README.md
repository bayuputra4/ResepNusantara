# 🍳 ResepKu - Website Resep Masakan Rumahan Indonesia

Selamat datang di **ResepKu**! Ini adalah project tugas akhir mata kuliah Web Programming. Web ini dibuat khusus untuk membantu anak kos, ibu muda, dan pemula yang ingin masak tapi bingung mau masak apa atau bingung cari resep yang bahannya gampang dicari di warung.

## ✨ Fitur Utama
- 🔍 **Pencarian Resep:** Cari resep berdasarkan nama masakan atau bahan (misal: ngetik "tempe" atau "telur").
- 🗂️ **Kategori:** Filter resep berdasarkan waktu makan (Sarapan, Makan Siang, Camilan, Minuman).
- 📖 **Detail Resep:** Menampilkan bahan-bahan, estimasi waktu, tingkat kesulitan, dan langkah-langkah memasak.
- 🏗️ **Struktur MVC:** Menggunakan arsitektur Model-View-Controller (PHP) agar kode rapi dan mudah dikelola.
- 📱 **Responsive:** Tampilan sudah disesuaikan untuk layar HP maupun Desktop.

## 🛠️ Teknologi yang Digunakan
- **Frontend:** HTML5, CSS3, Vanilla JavaScript (DOM & Fetch API).
- **Backend:** PHP (OOP & MVC).
- **Database:** JSON (sebagai data dummy resep).

## 📁 Struktur Folder (MVC)
Project ini sudah menerapkan pola arsitektur MVC:
- `models/` : Mengelola data resep dari file JSON (`Resep.php`).
- `views/` : Mengatur tampilan antarmuka web (`resep-view.php`).
- `controllers/` : Menghubungkan Model dan View serta mengatur alur request (`ResepController.php`).
- `index.php` : Pintu masuk utama aplikasi (Router).
- `style.css` & `script.js` : File untuk styling dan interaksi di sisi client.
- `resep.json` : Kumpulan data resep masakan.
- `images/` : Menyimpan aset gambar dan logo.

## 🚀 Cara Menjalankan Project (Localhost)
Karena project ini menggunakan PHP, kamu butuh local server seperti XAMPP.

1. Install **XAMPP** dan jalankan modul **Apache**.
2. Pindahkan seluruh folder project ini ke dalam folder `htdocs` XAMPP (contoh: `C:\xampp\htdocs\ResepNusantara`).
3. Buka browser dan akses: `http://localhost/ResepNusantara/index.php`
4. Web siap digunakan!

---
Dibuat untuk memenuhi Tugas Web Programming - Sprint 1 s/d 7.
**Author:** [bayuputra4](https://github.com/bayuputra4)
