# Capability: Base RBAC (roles y permisos)

## ADDED Requirements

### Requirement: Esquema de roles y permisos
El sistema MUST contar con un esquema de base de datos para representar roles, permisos y sus asignaciones a usuarios.
#### Scenario: Las migraciones proveen las tablas base de RBAC
- Given the application database is empty
- When migrations are executed
- Then the database contains las tablas requeridas para representar roles, permisos y sus asignaciones a usuarios

### Requirement: Verificación de roles/permisos disponible en el código
La aplicación MUST poder evaluar autorización basada en roles (inicialmente `Admin`/`User`) para controlar acceso a páginas protegidas.
#### Scenario: La aplicación puede verificar si un usuario es Admin
- Given a user record exists
- And the user has the `Admin` role assigned
- When the application evaluates la autorización para páginas solo Admin
- Then the user is allowed

#### Scenario: El sistema contempla roles Admin y User
- Given the RBAC schema exists
- When roles are created for initial use
- Then roles are limited to `Admin` and `User`

#### Scenario: Se niega el acceso a usuarios que no son Admin
- Given a user record exists
- And the user does not have the `Admin` role assigned
- When the application evaluates la autorización para páginas solo Admin
- Then the user is denied
