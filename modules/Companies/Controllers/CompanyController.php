<?php

namespace Modules\Companies\Controllers;

use Core\Controller;
use Core\Auth;
use Modules\Companies\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        Auth::requireLogin();
        
        $companies = Company::all();
        
        $tableRows = array_map(function($company) {
            return [
                $company->id,
                "<strong>{$company->name}</strong>",
                $company->domain,
                '<span class="px-2 py-1 rounded-lg bg-emerald-50 text-emerald-600 text-xs font-bold">' . ucfirst($company->status) . '</span>',
                $company->created_at,
                '<div class="flex space-x-2">
                    <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
                    <button class="text-rose-600 hover:text-rose-900">Delete</button>
                </div>'
            ];
        }, $companies);

        $this->render('Companies/views/index', [
            'header' => 'Companies Management',
            'subtitle' => 'Overview of all tenants in the system.',
            'tableHeaders' => ['ID', 'Name', 'Domain', 'Status', 'Created At', 'Actions'],
            'tableRows' => $tableRows
        ], 'layouts/admin');
    }

    public function create()
    {
        Auth::requireLogin();
        $this->render('Companies/views/create', [], 'layouts/admin');
    }

    public function store()
    {
        Auth::requireLogin();
        
        $company = new Company();
        $company->name = $_POST['name'];
        $company->domain = $_POST['domain'];
        $company->status = $_POST['status'] ?? 'active';
        $company->save();

        header('Location: /admin/companies');
        exit;
    }
}
