<?php

namespace Modules\ServiceOrders\Controllers;

use Core\Controller;
use Core\Auth;
use Modules\ServiceOrders\Models\ServiceOrder;
use Modules\Clients\Models\Client;

class ServiceOrderController extends Controller
{
    public function index()
    {
        Auth::requireLogin();
        
        $orders = ServiceOrder::all();
        
        $tableRows = array_map(function($order) {
            $statusColors = [
                'pending' => 'bg-amber-50 text-amber-600',
                'in_progress' => 'bg-indigo-50 text-indigo-600',
                'completed' => 'bg-emerald-50 text-emerald-600',
                'cancelled' => 'bg-rose-50 text-rose-600'
            ];
            
            $color = $statusColors[$order->status] ?? 'bg-slate-50 text-slate-600';
            
            return [
                "ORD-{$order->id}",
                "<strong>" . ($order->client_name ?? "Client #{$order->client_id}") . "</strong>",
                substr($order->description, 0, 50) . '...',
                $order->technician ?? 'Unassigned',
                '<span class="px-2 py-1 rounded-lg text-xs font-bold ' . $color . '">' . strtoupper(str_replace('_', ' ', $order->status)) . '</span>',
                $order->created_at,
                '<div class="flex space-x-2">
                    <button class="text-indigo-600 hover:text-indigo-900">Manage</button>
                </div>'
            ];
        }, $orders);

        $this->render('ServiceOrders/views/index', [
            'header' => 'Service Orders',
            'subtitle' => 'Track and manage field work requests and technical tasks.',
            'tableHeaders' => ['Order ID', 'Client', 'Description', 'Technician', 'Status', 'Date', 'Actions'],
            'tableRows' => $tableRows
        ], 'layouts/admin');
    }

    public function create()
    {
        Auth::requireLogin();
        $clients = Client::all();
        $this->render('ServiceOrders/views/create', ['clients' => $clients], 'layouts/admin');
    }
}
