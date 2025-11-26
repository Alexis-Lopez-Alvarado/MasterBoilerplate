# Master Boilerplate 🚀

**Laravel 11 + Tailwind CSS + Vite Starter Kit**

Este repositorio contiene un boilerplate base altamente optimizado para el desarrollo de aplicaciones web modernas. Integra la robustez de Laravel con un diseño moderno basado en componentes y utilidades CSS.

---

## 🛠 Stack Tecnológico

*   **Backend**: Laravel 11 (PHP 8.2+)
*   **Frontend**: Blade + Tailwind CSS 3.x
*   **Build Tool**: Vite
*   **Server**: Compatible con Apache/Nginx e IIS (web.config incluido)

## ✨ Características Principales

*   **Estructura Limpia**: Rutas, controladores y vistas depurados ("Lobotomizados") para iniciar proyectos desde cero sin bloatware.
*   **Layouts Modulares**: Sistema de temas integrado (Tema por defecto: *Echo*).
*   **Componentes UI**: Biblioteca extensa de componentes Blade listos para usar (Botones, Modales, Tablas, etc.).
*   **Autenticación Base**: Vistas de Login y Dashboard listas.
*   **Ready for Production**: Configuración optimizada de assets.

## 🚀 Instalación y Configuración

### Prerrequisitos
*   PHP >= 8.2
*   Composer
*   Node.js & NPM

### Pasos de Instalación

1.  **Clonar el repositorio**
    ```bash
    git clone https://github.com/Alexis-Lopez-Alvarado/MasterBoilerplate.git
    cd MasterBoilerplate
    ```

2.  **Instalar Dependencias**
    ```bash
    composer install
    npm install
    ```

3.  **Configuración de Entorno**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Compilar Assets (Frontend)**
    ```bash
    npm run build
    ```

5.  **Base de Datos**
    *   Configura tus credenciales en `.env`.
    *   Ejecuta las migraciones: `php artisan migrate`.

## 📂 Estructura de Carpetas Clave

*   `app/Main/SideMenu.php` -> Configuración del menú lateral.
*   `resources/views/pages/` -> Vistas principales (Dashboard, etc.).
*   `resources/views/_examples/` -> (Referencia) Vistas originales de la plantilla para consulta de estilos.
*   `resources/views/components/` -> Componentes reutilizables.

---
*Desarrollado por [Alexis Lopez Alvarado]*
