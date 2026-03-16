<?php

namespace Modules\Reports\Controllers;

use Core\Controller;
use Core\Auth;
use Modules\Finance\Models\Transaction;
use Modules\Clients\Models\Client;
use Modules\Products\Models\Product;

class ReportController extends Controller
{
    public function index()
    {
        Auth::requireLogin();
        
        // Em um sistema real, aqui haveria agregação de dados do DB
        $metrics = [
            'revenue' => 42500,
            'orders' => 124,
            'new_clients' => 12,
            'leads' => 45
        ];

        $this->render('Reports/views/index', [
            'header' => 'Business Intelligence',
            'subtitle' => 'Detailed analytics and performance metrics for your organization.',
            'metrics' => $metrics
        ], 'layouts/admin');
    }
}
