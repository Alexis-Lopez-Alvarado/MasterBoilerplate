# Capability: Seed de rol y usuario Admin por defecto

## ADDED Requirements

### Requirement: El rol Admin existe después del seeding
El sistema MUST crear (si no existe) el rol `Admin` al ejecutar seeders.
#### Scenario: El rol Admin se crea una sola vez
- Given the database has no roles
- When the database seeders are run
- Then existe un rol llamado `Admin`

### Requirement: El rol User existe después del seeding
El sistema MUST crear (si no existe) el rol `User` al ejecutar seeders.
#### Scenario: El rol User se crea una sola vez
- Given the database has no roles
- When the database seeders are run
- Then existe un rol llamado `User`

#### Scenario: Re-ejecutar seeders es idempotente
- Given a role named `Admin` already exists
- When the database seeders are run again
- Then no se crea un rol duplicado `Admin`

### Requirement: El usuario admin por defecto existe después del seeding
El sistema MUST crear un usuario admin por defecto (si no existe) y asignarle el rol `Admin`.
#### Scenario: Se crea el usuario admin por defecto y se le asigna el rol Admin
- Given the database has no users
- When the database seeders are run
- Then existe un usuario admin por defecto
- And that user has the `Admin` role
