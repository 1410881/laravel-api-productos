Backend API REST - Laravel 11

Este proyecto es una API REST para la gestión de productos y categorías.

Requisitos previos:
PHP 8.2 o superior
Composer
MySQL (puede ser XAMPP, Laragon o similar)

Instrucciones para ejecutar el proyecto:

1. Abre la terminal en la carpeta raíz del proyecto backend.

2. Instala las dependencias de PHP:
   composer install

3. Copia el archivo de configuración de entorno:
   cp .env.example .env

4. Genera la clave de la aplicación:
   php artisan key:generate

5. Configura tu base de datos en el archivo .env. Debes indicar el nombre de tu base de datos, usuario y contraseña:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nombre_de_tu_base_de_datos
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_contraseña

6. Ejecuta las migraciones para crear las tablas en la base de datos:
   php artisan migrate

7. Opcionalmente, si necesitas datos de prueba, puedes ejecutar los seeders:
   php artisan db:seed

8. Levanta el servidor de desarrollo:
   php artisan serve

El servidor estará disponible en http://127.0.0.1:8000

Endpoints principales:
GET /api/categorias
POST /api/categorias
PUT /api/categorias/{id}
DELETE /api/categorias/{id}
GET /api/productos
POST /api/productos
GET /api/productos/{id}
PUT /api/productos/{id}
DELETE /api/productos/{id}
