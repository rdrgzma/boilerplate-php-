<?php

namespace Modules\Finance\Controllers;

use Core\Controller;
use Core\Auth;
use Modules\Finance\Models\Transaction;

class FinanceController extends Controller
{
    public function index()
    {
        Auth::requireLogin();
        
        $transactions = Transaction::all();
        
        $tableRows = array_map(function($transaction) {
            $isIncome = $transaction->type === 'income';
            $typeClass = $isIncome ? 'bg-emerald-50 text-emerald-600' : 'bg-rose-50 text-rose-600';
            $amountPrefix = $isIncome ? '+' : '-';
            
            return [
                $transaction->id,
                "<strong>{$transaction->description}</strong>",
                '<span class="px-2 py-1 rounded-lg text-xs font-bold ' . $typeClass . '">' . strtoupper($transaction->type) . '</span>',
                '<span class="font-mono font-bold ' . ($isIncome ? 'text-emerald-600' : 'text-rose-600') . '">' . $amountPrefix . '$' . number_format($transaction->amount, 2) . '</span>',
                $transaction->date ?? $transaction->created_at,
                '<span class="px-2 py-1 rounded-lg bg-slate-100 text-slate-600 text-xs font-bold">' . ucfirst($transaction->status ?? 'paid') . '</span>',
                '<div class="flex space-x-2">
                    <button class="text-indigo-600 hover:text-indigo-900">View</button>
                </div>'
            ];
        }, $transactions);

        $this->render('Finance/views/index', [
            'header' => 'Finance & Cash Flow',
            'subtitle' => 'Monitor your revenue, expenses and transactions.',
            'tableHeaders' => ['ID', 'Description', 'Type', 'Amount', 'Date', 'Status', 'Actions'],
            'tableRows' => $tableRows
        ], 'layouts/admin');
    }

    public function create()
    {
        Auth::requireLogin();
        $this->render('Finance/views/create', [], 'layouts/admin');
    }
}
