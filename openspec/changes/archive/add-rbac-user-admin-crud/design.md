# Diseño: RBAC + seed de Admin + CRUD de usuarios

## Objetivos
- Proveer primitivos de RBAC (roles/permisos) que se integren de forma limpia con el sistema de autorización de Laravel.
- Mantener el alcance inicial de la IU enfocado: CRUD de usuarios protegido por el rol `Admin`.

## Elección de paquete ("Laravel-Trust")
Se utilizará `santigarcor/laratrust`.

### Riesgo de compatibilidad
Este proyecto está en Laravel `^11`. Algunos paquetes antiguos (por ejemplo de la era de Entrust) pueden no ser compatibles.

### Decisión pendiente
Este diseño asume que el paquete provee:
- Un modelo `Role`
- Un modelo `Permission`
- Tablas pivote para asignar roles/permisos a usuarios
- Traits/helpers para verificar roles/permisos

Si el paquete no es compatible con Laravel 11, la recomendación de respaldo sería `spatie/laravel-permission` (muy usado y compatible con Laravel 11). Este respaldo no se adopta a menos que lo confirmes.

## Integración de autorización
- Proteger las rutas del CRUD de usuarios con una capa de autorización que requiera el rol `Admin`.
- Preferir enforcement vía middleware (por ejemplo `role:Admin`) si el paquete lo soporta.
- Si no hay middleware de roles, aplicar control por Gates/Policies.

## Data seeding
- Sembrar el rol `Admin`.
- Sembrar el rol `User`.
- Sembrar un usuario admin por defecto (idealmente leyendo credenciales desde variables de entorno para evitar hardcodear secretos).
- Asegurar idempotencia (re-ejecutar seeders no crea duplicados).

## Diseño de IU (mínimo)
- Agregar un CRUD de usuarios accesible solo para Admin.
- Reutilizar la IU existente del boilerplate:
  - Layouts y sistema de temas (tema por defecto: *Echo*).
  - Componentes Blade existentes (botones, modales, tablas, formularios).
  - Vistas en `resources/views/pages/`.
  - Menú lateral configurado en `app/Main/SideMenu.php`.
- Capacidades:
  - Listar usuarios (paginación/búsqueda opcional después)
  - Crear usuario (name/email/password)
  - Editar usuario (name/email, opcionalmente resetear password)
  - Asignar rol del usuario limitado a `Admin` o `User`
  - Eliminar usuario (soft-delete opcional después)

## Estrategia de migraciones
- Usar migraciones publicadas por el vendor cuando el paquete lo soporte.
- Si no, crear migraciones propias con nombres claros y llaves foráneas.

## No objetivos
- IU para administración de roles/permisos.
- Auditoría/logs de cambios.
