# Propuesta: Administrar usuarios por roles/permisos (Laravel-Trust) + seed de Admin + IU CRUD de usuarios

## Resumen
Agregar control de acceso basado en roles (roles + permisos) al proyecto usando un paquete “Trust” para Laravel (referido como **Laravel-Trust**) y proveer una configuración inicial de administración:
- Introducir el esquema/migraciones de base de datos para roles, permisos y asignaciones.
- Crear un rol por defecto `Admin`.
- Crear un usuario admin por defecto y asignarle el rol `Admin`.
- Agregar una IU solo para Admin para gestionar usuarios (CRUD).

Este es el primer incremento; más adelante se puede agregar una IU para administrar roles/permisos.

## Motivación
El proyecto necesita una manera confiable de controlar el acceso a funcionalidades administrativas (iniciando por la administración de usuarios) mediante la asignación de roles y/o permisos.

## Alcance
- Agregar la base de RBAC (roles + permisos + tablas pivote).
- Asegurar que los primitivos de autorización se puedan usar en controllers/routes/views.
- Agregar una IU mínima de administración de usuarios solo para Admin (index/create/edit/delete).
- Sembrar el rol `Admin` y el usuario admin por defecto.

## Fuera de alcance (para este cambio)
- Una IU completa para administrar roles y permisos.
- Modelado de permisos más fino que lo necesario para proteger el CRUD de usuarios.
- Comportamiento multi-tenant.

## Preguntas abiertas (requieren confirmación)
- ¿Cuáles deben ser las **credenciales del admin por defecto**?
  - Nombre, email, password (¿o debe salir de `.env`?).
- ¿El CRUD de usuarios debe permitir asignar roles, o solo campos básicos del usuario por ahora?

## Suposiciones
- La versión de Laravel es `^11` (según `composer.json`).
- El proyecto usa vistas Blade y rutas web.
- El paquete a utilizar es `santigarcor/laratrust`.
- De momento solo existirán 2 roles: `Admin` y `User`.
- El CRUD de usuarios debe reutilizar la IU existente del boilerplate (layouts, componentes Blade y estilos del tema actual).
- La ruta `/dashboard` eventualmente requerirá autenticación/autorización (hoy no está protegida en rutas).

## Criterios de aceptación
- La base de datos tiene el esquema de roles/permisos y se puede migrar.
- Existe un rol `Admin` después de ejecutar seeders.
- Existe un usuario admin por defecto después de ejecutar seeders y tiene el rol `Admin`.
- Existe una IU CRUD de usuarios accesible solo para Admin.
