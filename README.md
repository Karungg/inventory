# Project Website Pengajuan Cuti

## Deskripsi

Project ini adalah backend dari aplikasi <a href="https://github.com/Karungg/flutter-inventory">flutter inventory</a>

## 🛠️ Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini secara lokal:

1. **Clone repository**

```bash
git clone https://github.com/Karungg/inventory.git
cd inventory
```

2. **Install dependensi menggunakan composer**

```
composer install
```

3. **Copy .env**

```
cp .env.example .env
```

4. **Ubah konfigurasi pada file .env sesuai kebutuhan**

```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

5. **Buat key aplikasi**
```
php artisan key:generate
```

6. **Jalankan migrasi dan seeder**

```
php artisan migrate
php artisan db:seed
```

7. **Jalankan aplikasi dan Queue**

```
php artisan serve
php artisan queue:work
```

Buka aplikasi di browser <a href="http://localhost:8000">http://localhost/</a>
