# Project Context

## Purpose
Boilerplate para iniciar aplicaciones web modernas con Laravel, con una IU ya avanzada basada en Blade + Tailwind y un sistema de temas.

## Tech Stack
- Backend: Laravel 11 (PHP 8.2+)
- Frontend: Blade + Tailwind CSS 3.x
- Build tool: Vite
- Server: Compatible con Apache/Nginx e IIS (incluye `web.config`)

## Project Conventions

### Code Style
- Laravel conventions (Controllers, Models, routes en `routes/web.php`).
- Vistas Blade en `resources/views/`.
- Preferir reutilizar componentes existentes en `resources/views/components/`.

### Architecture Patterns
- Boilerplate “limpio” (sin bloatware) para iniciar proyectos desde cero.
- Layouts modulares y sistema de temas (tema por defecto: *Echo*).

### Testing Strategy
- (Por definir) Agregar pruebas según se requiera por features.

### Git Workflow
- (Por definir)

## Domain Context
- IU basada en plantilla con componentes Blade listos para usar (botones, modales, tablas, etc.).
- Vistas principales en `resources/views/pages/`.
- Vistas de referencia de la plantilla en `resources/views/_examples/`.
- Menú lateral configurado en `app/Main/SideMenu.php`.

## Important Constraints
- Mantener consistencia visual: al agregar IU nueva, reutilizar layouts/componentes/estilos del tema actual.
- Evitar introducir librerías de IU nuevas si ya existe un componente equivalente en Blade.

## External Dependencies
- Node.js & NPM requeridos para compilar assets (Vite/Tailwind).
