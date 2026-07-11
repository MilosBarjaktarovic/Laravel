ShopProject

Laravel domaći projekat.

## Kako pokrenuti

1. Klonirajte repozitorijum:

    ```bash
    git clone https://github.com/MilosBarjaktarovic/Laravel.git

    ```

2. Uđite u folder projekta:

bash
Copy code
cd Laravel/ShopProject
Instalirajte zavisnosti:

bash
Copy code
composer install
Napravite .env fajl:

bash
Copy code
cp .env.example .env

Podesite bazu u .env:

makefile
Copy code
DB_DATABASE=shop_project
DB_USERNAME=root
DB_PASSWORD=

3. Pokrenite migracije:

bash
Copy code
php artisan migrate
Pokrenite lokalni server:

bash
Copy code
php artisan serve
Otvorite u browseru:

cpp
Copy code
http://127.0.0.1:8000
Stranice
Home

About

Shop

Contact
