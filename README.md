=========================================================
  API REST - GESTIÓN DE PRODUCTOS Y CATEGORÍAS
  Backend desarrollado en Laravel 11
=========================================================

1. REQUISITOS PREVIOS
---------------------------------------------------------
- PHP >= 8.2
- Composer
- MySQL (XAMPP / Laragon / Docker)
- Postman o Thunder Client (para pruebas)

2. INSTALACIÓN
---------------------------------------------------------
1. Clonar el repositorio.
2. Abrir la terminal en la raíz del proyecto y ejecutar:
   composer install
3. Copiar el archivo de entorno:
   cp .env.example .env
4. Generar la clave de la aplicación:
   php artisan key:generate
5. Configurar la base de datos en el archivo .env:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nombre_de_tu_bd
   DB_USERNAME=root
   DB_PASSWORD=
6. Ejecutar las migraciones y seeders:
   php artisan migrate --seed
   (Si solo quieres migrar sin seeders: php artisan migrate)
7. Levantar el servidor local:
   php artisan serve
   El servidor estará disponible en: http://127.0.0.1:8000

3. ESTRUCTURA DE BASE DE DATOS
---------------------------------------------------------
- Tabla 'categorias':
  - id (PK)
  - nombre (string, unique)
  - slug (string, unique)
  - descripcion (text, nullable)
  - timestamps

- Tabla 'productos':
  - id (PK)
  - name (string)
  - description (text, nullable)
  - price (decimal 8,2)
  - stock (integer)
  - category_id (FK -> categorias.id, onDelete cascade)
  - timestamps

4. ENDPOINTS DE LA API
---------------------------------------------------------
Todas las rutas están bajo el prefijo /api

--- CATEGORÍAS ---
- GET    /api/categorias         -> Lista todas las categorías
- POST   /api/categorias         -> Crea una nueva categoría
- PUT    /api/categorias/{id}    -> Actualiza una categoría existente
- DELETE /api/categorias/{id}    -> Elimina una categoría

--- PRODUCTOS ---
- GET    /api/productos          -> Lista todos los productos (con su categoría)
- POST   /api/productos          -> Crea un nuevo producto
- GET    /api/productos/{id}     -> Muestra un producto específico
- PUT    /api/productos/{id}     -> Actualiza un producto existente
- DELETE /api/productos/{id}     -> Elimina un producto

5. EJEMPLOS DE PETICIONES Y RESPUESTAS
---------------------------------------------------------
--- CREAR PRODUCTO (POST /api/productos) ---
Body (JSON):
{
  "name": "Camiseta Overskull",
  "description": "Camiseta negra edición limitada",
  "price": 89.90,
  "stock": 50,
  "category_id": 1
}

Respuesta Exitosa (201 Created):
{
  "success": true,
  "message": "Producto creado correctamente",
  "data": {
    "id": 1,
    "name": "Camiseta Overskull",
    "description": "Camiseta negra edición limitada",
    "price": 89.90,
    "stock": 50,
    "category_id": 1,
    "created_at": "...",
    "updated_at": "..."
  }
}

--- ERROR DE VALIDACIÓN (422 Unprocessable Entity) ---
Respuesta de Error:
{
  "success": false,
  "message": "Error de validación",
  "errors": {
    "name": ["El campo nombre es requerido"],
    "price": ["El campo precio es requerido"]
  }
}

--- ERROR 404 (No encontrado) ---
{
  "success": false,
  "message": "Recurso no encontrado",
  "errors": []
}

6. MANEJO DE ERRORES Y VALIDACIONES
---------------------------------------------------------
- Se utilizan Form Requests (StoreProductoRequest, CategoriaRequest)
  para validar los datos de entrada.
- Todas las respuestas siguen el estándar:
  - success: boolean
  - message: string
  - data: objeto o array (solo en éxito)
  - errors: objeto con campos fallidos (solo en error de validación)

7. TECNOLOGÍAS UTILIZADAS
---------------------------------------------------------
- Laravel 11
- MySQL
- Eloquent ORM
- Laravel Sanctum (opcional, para futura autenticación)

8. NOTAS ADICIONALES
---------------------------------------------------------
- El backend está preparado para ser consumido por un frontend en Vue 3.
- Se recomienda tener CORS configurado para permitir peticiones desde
  http://localhost:5173 (puerto por defecto de Vite).
