<?php

namespace Modules\Appointments\Controllers;

use Core\Controller;
use Core\Auth;
use Modules\Appointments\Models\Appointment;
use Modules\Clients\Models\Client;

class AppointmentController extends Controller
{
    public function index()
    {
        Auth::requireLogin();
        
        $appointments = Appointment::all();
        
        $tableRows = array_map(function($app) {
            return [
                $app->id,
                "<strong>" . ($app->client_name ?? "Client #{$app->client_id}") . "</strong>",
                "📅 " . $app->date,
                "🕒 " . $app->time,
                '<span class="px-2 py-1 rounded-lg bg-indigo-50 text-indigo-600 text-xs font-bold">' . strtoupper($app->status ?? 'scheduled') . '</span>',
                '<div class="flex space-x-2">
                    <button class="text-indigo-600 hover:text-indigo-900">Reschedule</button>
                    <button class="text-rose-600 hover:text-rose-900">Cancel</button>
                </div>'
            ];
        }, $appointments);

        $this->render('Appointments/views/index', [
            'header' => 'Appointments & Scheduling',
            'subtitle' => 'Manage your calendar and client meetings.',
            'tableHeaders' => ['ID', 'Client', 'Date', 'Time', 'Status', 'Actions'],
            'tableRows' => $tableRows
        ], 'layouts/admin');
    }

    public function create()
    {
        Auth::requireLogin();
        $clients = Client::all();
        $this->render('Appointments/views/create', ['clients' => $clients], 'layouts/admin');
    }
}
