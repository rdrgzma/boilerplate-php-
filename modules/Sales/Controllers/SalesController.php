<?php

namespace Modules\Sales\Controllers;

use Core\Controller;
use Core\Auth;
use Modules\Sales\Models\Sale;
use Modules\Sales\Models\SaleItem;
use Modules\Clients\Models\Client;
use Modules\Products\Models\Product;

class SalesController extends Controller
{
    public function index()
    {
        Auth::requireLogin();
        
        // Mocking data for visualization in this demo context
        $sales = Sale::all();
        
        $this->render('Sales/views/index', [
            'header' => 'Sales Management',
            'subtitle' => 'Track your revenue and manage customer orders.',
            'sales' => $sales
        ], 'layouts/admin');
    }

    public function create()
    {
        Auth::requireLogin();
        
        $clients = Client::all();
        $products = Product::all();

        $this->render('Sales/views/create', [
            'header' => 'New Sale',
            'subtitle' => 'Create a new transaction and add products.',
            'clients' => $clients,
            'products' => $products
        ], 'layouts/admin');
    }

    public function store()
    {
        Auth::requireLogin();
        
        // Simplified store logic for the boilerplate
        $data = $_POST;
        $companyId = $_SESSION['user']['company_id'] ?? 1;

        $sale = new Sale();
        $sale->company_id = $companyId;
        $sale->client_id = (int)$data['client_id'];
        $sale->total_amount = (float)($data['total_amount'] ?? 0);
        $sale->status = 'completed';
        $sale->save();

        if (isset($data['items']) && is_array($data['items'])) {
            foreach ($data['items'] as $item) {
                $saleItem = new SaleItem();
                $saleItem->sale_id = $sale->id;
                $saleItem->product_id = (int)$item['product_id'];
                $saleItem->quantity = (float)$item['quantity'];
                $saleItem->unit_price = (float)$item['price'];
                $saleItem->subtotal = (float)$item['quantity'] * (float)$item['price'];
                $saleItem->save();
            }
        }

        header('Location: /admin/sales');
        exit;
    }

    public function show($id)
    {
        Auth::requireLogin();
        
        $sale = Sale::find($id);
        if (!$sale) {
            header('Location: /admin/sales');
            exit;
        }

        $client = Client::find($sale->client_id);
        
        // In a real system, we'd use a relationship or a custom query
        // Here we'll simulate the items
        $items = []; 

        $this->render('Sales/views/show', [
            'header' => 'Sale Details',
            'subtitle' => 'Invoice overview and transaction details.',
            'sale' => $sale,
            'client' => $client,
            'items' => $items
        ], 'layouts/admin');
    }
}
