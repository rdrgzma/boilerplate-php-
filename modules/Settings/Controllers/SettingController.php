<?php

namespace Modules\Settings\Controllers;

use Core\Controller;
use Core\Auth;
use Modules\Settings\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        Auth::requireLogin();
        
        $formFields = [
            ['label' => 'Company Name', 'type' => 'text', 'name' => 'company_name', 'placeholder' => 'Enter company name'],
            ['label' => 'System Domain', 'type' => 'text', 'name' => 'domain', 'placeholder' => 'e.g. portal.mycompany.com'],
            ['label' => 'Primary Currency', 'type' => 'select', 'name' => 'currency', 'options' => [
                'BRL' => 'Brazilian Real (R$)',
                'USD' => 'US Dollar ($)',
                'EUR' => 'Euro (€)'
            ]],
            ['label' => 'Timezone', 'type' => 'select', 'name' => 'timezone', 'options' => [
                'America/Sao_Paulo' => 'America/Sao Paulo',
                'UTC' => 'UTC'
            ]],
            ['label' => 'System Description', 'type' => 'textarea', 'name' => 'description', 'placeholder' => 'Brief organization description']
        ];

        $this->render('Settings/views/index', [
            'header' => 'Organization Settings',
            'subtitle' => 'Manage your company preferences and system configuration.',
            'formFields' => $formFields
        ], 'layouts/admin');
    }

    public function save()
    {
        Auth::requireLogin();
        $companyId = $_SESSION['user']['company_id'] ?? 1;

        foreach ($_POST as $key => $value) {
            // Find existing setting or create new
            $pdo = \Core\Database::getConnection();
            $stmt = $pdo->prepare("INSERT OR REPLACE INTO settings (company_id, key, value, updated_at) VALUES (:company_id, :key, :value, CURRENT_TIMESTAMP)");
            $stmt->execute([
                'company_id' => $companyId,
                'key' => $key,
                'value' => $value
            ]);
        }
        
        header('Location: /admin/settings?success=1');
        exit;
    }
}
