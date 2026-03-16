<?php

namespace Modules\Documents\Controllers;

use Core\Controller;
use Core\Auth;
use Modules\Documents\Models\Document;
use Modules\Clients\Models\Client;

class DocumentController extends Controller
{
    public function index()
    {
        Auth::requireLogin();
        
        $documents = Document::all();
        
        $tableRows = array_map(function($doc) {
            $ext = pathinfo($doc->filename, PATHINFO_EXTENSION);
            $icon = '📄';
            if (in_array($ext, ['pdf'])) $icon = '📕';
            if (in_array($ext, ['jpg', 'png'])) $icon = '🖼️';
            
            return [
                $doc->id,
                "$icon <strong>{$doc->filename}</strong>",
                $doc->category ?? 'General',
                ($doc->client_name ?? "Client #{$doc->client_id}"),
                round($doc->file_size / 1024, 1) . ' KB',
                $doc->created_at,
                '<div class="flex space-x-2">
                    <button class="text-indigo-600 hover:text-indigo-900">Download</button>
                    <button class="text-rose-600 hover:text-rose-900">Delete</button>
                </div>'
            ];
        }, $documents);

        $this->render('Documents/views/index', [
            'header' => 'Document Management',
            'subtitle' => 'Securely store and share files with your clients.',
            'tableHeaders' => ['ID', 'Filename', 'Category', 'Subject', 'Size', 'Uploaded', 'Actions'],
            'tableRows' => $tableRows
        ], 'layouts/admin');
    }

    public function create()
    {
        Auth::requireLogin();
        $clients = Client::all();
        $this->render('Documents/views/create', ['clients' => $clients], 'layouts/admin');
    }
}
