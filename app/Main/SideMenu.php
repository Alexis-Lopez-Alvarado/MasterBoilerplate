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
            
            "SISTEMA",
            [
                'icon' => "LogOut",
                'route_name' => "login", // Temporalmente apunta a login
                'params' => [],
                'title' => "Cerrar Sesión",
            ],
        ];
    }
}
