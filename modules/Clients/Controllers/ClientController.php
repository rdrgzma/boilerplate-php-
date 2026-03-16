<?php

namespace Modules\Clients\Controllers;

use Core\Controller;
use Core\Auth;
use Modules\Clients\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        Auth::requireLogin();
        
        $clients = Client::all();
        
        $tableRows = array_map(function($client) {
            return [
                $client->id,
                "<strong>{$client->name}</strong>",
                $client->email,
                $client->phone ?? 'N/A',
                $client->company_name ?? 'Individual',
                '<span class="px-2 py-1 rounded-lg bg-emerald-50 text-emerald-600 text-xs font-bold">Active</span>',
                '<div class="flex space-x-2">
                    <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
                    <button class="text-rose-600 hover:text-rose-900">Delete</button>
                </div>'
            ];
        }, $clients);

        $this->render('Clients/views/index', [
            'header' => 'Clients Management',
            'subtitle' => 'Manage your customer database and relationships.',
            'tableHeaders' => ['ID', 'Name', 'Email', 'Phone', 'Company', 'Status', 'Actions'],
            'tableRows' => $tableRows
        ], 'layouts/admin');
    }

    public function create()
    {
        Auth::requireLogin();
        $this->render('Clients/views/create', [], 'layouts/admin');
    }
}
