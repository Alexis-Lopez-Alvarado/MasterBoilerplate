<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Muestra el dashboard principal.
     */
    public function dashboard(): View
    {
        // Pasamos datos vacíos para evitar errores en la vista de plantilla
        // TODO: Limpiar la vista 'pages.dashboard-overview-1' para quitar dependencias de variables fake
        return view('pages.dashboard-overview-1', [
            'ecommerce' => [], 
            'transactions' => []
        ]);
    }

    /**
     * Muestra la página de login.
     */
    public function login(): View
    {
        return view('login');
    }
}
