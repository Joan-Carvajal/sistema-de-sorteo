
Puedes acceder al proyecto desplegado en un servidor en : 
https://sistema-de-sorteo-main-s09e38.laravel.cloud/

Requisitos previos

PHP >= 8.4
Composer
MySQL, SQLite, PosgreSQL

Clonar repositorio (si quieres lo descargas)
git clone [[URL_DEL_REPOSITORIO] promocion-automoviles](https://github.com/Joan-Carvajal/sistema-de-sorteo.git)

Instalar dependencias

composer install

Configurar el archivo .env
Copiar el archivo .env.example a .env y configurar las variables de entorno:
cp .env.example .env

Nota : si estas en windows lo puedes hacer manual

Editar el archivo .env para configurar la conexión a la base de datos:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tu base de datos
DB_USERNAME=root (tu usuario)
DB_PASSWORD= tu contraseña

Generar la clave de la aplicación
php artisan key:generate

Una vez conectado a la base de datos puedes correr las migraciones con los seeders para registar los departamentos y ciudades en la base de datos:

php artisan migrate --seed

puedes correr las vistas de vite:
npm install
npm run dev

Nota: si estas usando laravel Herd usa: npm run build

y listo puedes correr el servidor : 
php artisan serve
ingresas a : http://localhost:8000

 si estas usando xamp o herd seria : http:/tu-app.test

y comenzar a usar la aplicacion.
