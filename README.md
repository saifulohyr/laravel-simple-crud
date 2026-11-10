# Laravel Simple Login & CRUD

Aplikasi Laravel bawaan (tanpa package tambahan seperti Breeze/Jetstream/Vite build) dengan autentikasi native (`Auth::attempt`, register, logout) dan CRUD tabel sederhana (`products`) menggunakan Blade native + SQLite.

## Fitur
- Login, Register, Logout menggunakan controller & session native Laravel
- Proteksi route `products` dengan middleware `auth`
- CRUD Produk (`id`, `name`, `price`, `stock`, `description`)
- Pencarian produk + pagination
- UI HTML/CSS polos tanpa library UI eksternal

## Cara Menjalankan

```bash
git clone https://github.com/saifulohyr/laravel-simple-crud.git
cd laravel-simple-crud
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Buka `http://127.0.0.1:8000`.

### Akun Demo Seeder
- Email: `admin@example.com`
- Password: `password`

## Menjalankan Test

```bash
php artisan test
```
