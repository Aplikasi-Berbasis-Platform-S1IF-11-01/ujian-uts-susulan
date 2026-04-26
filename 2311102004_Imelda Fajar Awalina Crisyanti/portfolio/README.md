# Web Portfolio Laravel AJAX

Project ini adalah web portfolio berbasis Laravel. Landing page menampilkan data diri, skill, project, dan kontak melalui AJAX/fetch dari backend. Dashboard admin digunakan untuk mengubah konten tanpa mengedit file tampilan secara langsung.

## Fitur
- Landing page portfolio modern
- Data profile, skill, dan project diambil memakai AJAX dari endpoint backend
- Dashboard admin untuk mengubah deskripsi, foto, skill, dan project
- Database SQLite agar bisa jalan tanpa MySQL XAMPP

## Cara Menjalankan

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Buka:

```text
http://127.0.0.1:8000
```

Dashboard admin:

```text
http://127.0.0.1:8000/admin
```

## Catatan
Folder `vendor/` tidak perlu di-upload ke GitHub. Folder ini akan otomatis dibuat setelah menjalankan `composer install`.
