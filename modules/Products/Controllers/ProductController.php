<?php

namespace Modules\Products\Controllers;

use Core\Controller;
use Core\Auth;
use Modules\Products\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        Auth::requireLogin();
        
        $products = Product::all();
        
        $tableRows = array_map(function($product) {
            return [
                $product->id,
                "<strong>{$product->name}</strong>",
                "$" . number_class($product->price ?? 0, 2),
                $product->category ?? 'General',
                '<span class="px-2 py-1 rounded-lg bg-emerald-50 text-emerald-600 text-xs font-bold">In Stock</span>',
                '<div class="flex space-x-2">
                    <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
                    <button class="text-rose-600 hover:text-rose-900">Delete</button>
                </div>'
            ];
        }, $products);

        $this->render('Products/views/index', [
            'header' => 'Products & Services',
            'subtitle' => 'Manage your inventory and service offerings.',
            'tableHeaders' => ['ID', 'Name', 'Price', 'Category', 'Status', 'Actions'],
            'tableRows' => $tableRows
        ], 'layouts/admin');
    }

    public function create()
    {
        Auth::requireLogin();
        $this->render('Products/views/create', [], 'layouts/admin');
    }
}

function number_class($val, $prec) {
    return number_format((float)$val, $prec, '.', ',');
}
