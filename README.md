# CV. ABE Informatika

Aplikasi pelayanan servis CV. ABE Informatika. Pengunjung bisa mengecek status barang dari halaman publik. Tim internal mencatat penerimaan, pengerjaan teknisi, invoice, dan laporan.

## Yang bisa dilakukan

- Halaman publik: beranda, profil, dan cek status servis lewat serial number atau nomor RMA
- Penerimaan barang dan data servis
- Nomor servis otomatis berurutan (`0000001`, `0000002`, …)
- Invoice otomatis `INV/tanggal/nomor servis`
- Laporan servis dan laporan transaksi, bisa disaring per bulan serta diekspor ke Excel atau PDF
- Tiga peran: admin, teknisi, dan user

Sesi login berlaku paling lama 10 jam. Setelah itu pengguna harus masuk lagi.

## Teknologi

- PHP 8.2+
- Laravel 12
- MySQL
- Blade, Bootstrap 5, Bootstrap Icons
- Spatie Permission, Maatwebsite Excel, DomPDF

## Menjalankan

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Isi koneksi database di `.env`, lalu:

```bash
php artisan migrate --seed
php artisan serve
```

Aplikasi terbuka di `http://127.0.0.1:8000`.

`migrate:fresh --seed` menghapus seluruh data di database. Pakai hanya saat memasang dari awal.

## Akun awal

Password semua akun seed adalah `Password`.

| Peran | Email | Setelah login |
| --- | --- | --- |
| Admin | admin@gmail.com | `/homeadmin` |
| User | user@gmail.com | `/homeuser` |
| Teknisi | teknisi@gmail.com | `/hometeknisi` |

## Halaman utama

| Alamat | Isi |
| --- | --- |
| `/` | Beranda |
| `/profil` | Profil perusahaan |
| `/cek-servis` | Cek kondisi barang |
| `/login` | Masuk panel internal |
| `/state` | Data servis |
| `/create` | Penerimaan barang |
| `/index` | Laporan data servis |
| `/trx` | Invoice |
| `/index2` | Laporan transaksi |
| `/order` | Laporan status, filter per bulan |
