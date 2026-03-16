<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // PROTEÇÃO: Só passa daqui se estiver logado!
        Auth::requireLogin();

        $user = Auth::user();

        $this->render('admin/dashboard', [
            'title' => 'Painel Administrativo',
            'userName' => $user['name']
        ]);
    }

    public function demo()
    {
        // Passamos os dados que o layout e os componentes precisam
        $data = [
            'title' => 'Admin Dashboard',
            'header' => 'Overview Dashboard',
            'subtitle' => 'Welcome back, here\'s what\'s happening with your store today.',
            
            // Dados para os Cards (Componente)
            'cards' => [
                [
                    'title' => 'Average Revenue',
                    'value' => '$12,450.00',
                    'change' => '+12.5%',
                    'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                    'color' => 'indigo'
                ],
                // ... outros cards
            ],

            // Dados para a Tabela (Componente)
            'tableHeaders' => ['Order ID', 'Customer', 'Product', 'Amount', 'Status', 'Date'],
            'tableRows' => [
                ['#ORD-7392', 'Alex Thompson', 'Premium Plan', '$299.00', '<span class="px-2 py-1 rounded-lg bg-emerald-50 text-emerald-600 text-xs font-bold">Paid</span>', 'Oct 24, 2025'],
                // ... outras linhas
            ],

            // Dados para o Form (Componente)
            'formFields' => [
                ['label' => 'Full Name', 'type' => 'text', 'name' => 'name', 'placeholder' => 'Enter customer name'],
                // ... outros campos
            ],
        ];

        // Renderiza usando o layout 'layout.php' (que já definimos no Controller)
        $this->render('admin/demo', $data, 'layouts/admin');
    }
}