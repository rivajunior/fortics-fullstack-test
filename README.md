# fortics-fullstack-test

> Para rodar o projeto é necessário ter o Docker instalado em sua máquina.

Execute
```bash
cd laradock
cp .env-example .env
docker-compose up -d nginx mysql
docker-compose workspace bash
cp .env.example .env
php artisan key:generate
composer install
yarn install
exit
docker-compose restart nginx
docker-compose workspace bash
php artisan migrate --seed
```
