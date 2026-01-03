<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     */
    public static function menu(): array
    {
        return [
            "MENU PRINCIPAL",
            [
                'icon' => "Home", // Cambié el icono a 'Home' que es más estándar, o 'GaugeCircle' si prefieres
                'route_name' => "dashboard",
                'params' => [],
                'title' => "Dashboard",
            ],

            [
                'icon' => "Users",
                'route_name' => "admin.users.index",
                'params' => [],
                'title' => "Usuarios",
            ],
            
            "SISTEMA",
            [
                'icon' => "LogOut",
                'route_name' => "logout",
                'params' => [],
                'title' => "Cerrar Sesión",
            ],
        ];
    }
}
