<?php

namespace Modules\Users\Controllers;

use Core\Controller;
use Core\Auth;
use Modules\Users\Models\User;

class UserController extends Controller
{
    public function index()
    {
        Auth::requireLogin();
        
        $users = User::all();
        
        $tableRows = array_map(function($user) {
            return [
                $user->id,
                "<strong>{$user->name}</strong>",
                $user->email,
                '<span class="px-2 py-1 rounded-lg bg-indigo-50 text-indigo-600 text-xs font-bold">' . strtoupper($user->role) . '</span>',
                '<span class="inline-flex items-center px-2 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded-md">Active</span>',
                '<div class="flex space-x-2">
                    <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
                    <button class="text-rose-600 hover:text-rose-900">Delete</button>
                </div>'
            ];
        }, $users);

        $this->render('Users/views/index', [
            'header' => 'Team Management',
            'subtitle' => 'Manage user access and roles for your organization.',
            'tableHeaders' => ['ID', 'Name', 'Email', 'Role', 'Status', 'Actions'],
            'tableRows' => $tableRows
        ], 'layouts/admin');
    }

    public function create()
    {
        Auth::requireLogin();
        $this->render('Users/views/create', [], 'layouts/admin');
    }

    public function store()
    {
        Auth::requireLogin();
        
        $user = new User();
        $user->company_id = $_SESSION['user']['company_id'] ?? 1;
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->role = $_POST['role'] ?? 'user';
        $user->status = 'active';
        $user->save();

        header('Location: /admin/users');
        exit;
    }
}
