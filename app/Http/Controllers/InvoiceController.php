<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class InvoiceController extends Controller
{
    public function generate(Request $request)
    {
        // Render Blade to HTML
        $html = view('invoice', $data)->render();

        // Generate PDF
        $pdfPath = public_path('pdf/generated.pdf');
        Browsershot::html($html)
            ->format('A4')
            ->save($pdfPath);
    }
}
