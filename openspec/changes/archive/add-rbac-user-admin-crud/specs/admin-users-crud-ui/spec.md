# Capability: IU CRUD de usuarios (solo Admin)

## ADDED Requirements

### Requirement: La gestión de usuarios es solo para Admin
La administración de usuarios MUST estar restringida a usuarios con el rol `Admin`.
#### Scenario: Admin puede acceder al índice de usuarios
- Given an authenticated user with the `Admin` role
- When the user visits la página de índice de gestión de usuarios
- Then the page is displayed

#### Scenario: Un no-admin no puede acceder al índice de usuarios
- Given an authenticated user without the `Admin` role
- When the user visits la página de índice de gestión de usuarios
- Then access is denied

### Requirement: Admin puede crear, editar y eliminar usuarios
Un usuario con rol `Admin` MUST poder realizar operaciones CRUD sobre usuarios y asignarles un rol permitido.
#### Scenario: Admin crea un usuario
- Given an authenticated user with the `Admin` role
- When the admin submits un formulario válido de creación de usuario
- Then the user is created

#### Scenario: Admin asigna rol limitado a Admin o User
- Given an authenticated user with the `Admin` role
- And an existing user
- When the admin updates el rol del usuario
- Then the role is set to `Admin` or `User`

#### Scenario: Admin edita un usuario
- Given an authenticated user with the `Admin` role
- And an existing user
- When the admin submits un formulario válido de edición de usuario
- Then the user is updated

#### Scenario: Admin elimina un usuario
- Given an authenticated user with the `Admin` role
- And an existing user
- When the admin confirms deletion
- Then the user is deleted
