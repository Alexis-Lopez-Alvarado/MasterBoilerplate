# Tareas: Agregar RBAC + seed de Admin + CRUD de usuarios

1. Confirmar el paquete exacto de Composer para “Laravel-Trust” y su versión soportada para Laravel 11.
2. Agregar el paquete vía Composer y ejecutar package discovery.
3. Publicar la configuración del paquete (si aplica).
4. Publicar/generar migraciones RBAC (roles, permisos, pivots) y correr `php artisan migrate`.
5. Integrar el/los trait(s) de RBAC en `App\\Models\\User` según lo requiera el paquete.
6. Agregar reglas de middleware / Gate / Policy para forzar acceso al CRUD de usuarios solo para Admin.
7. Crear seeders:
   - Crear el rol `Admin` si no existe.
   - Crear el usuario admin por defecto si no existe (credenciales desde env).
   - Asignar el rol `Admin` al usuario admin por defecto.
8. Crear el CRUD de usuarios (Admin):
   - Rutas (agrupadas + protegidas)
   - Controller (index/create/store/edit/update/destroy)
   - Vistas (Blade) para listado/formulario
   - Validación básica y manejo de errores
9. Agregar una entrada de navegación hacia la gestión de usuarios visible solo para Admin.
10. Validación:
   - Prueba rápida de migración + seeding
   - Verificar que un no-admin no puede acceder al CRUD
   - Verificar que un admin sí puede hacer CRUD
