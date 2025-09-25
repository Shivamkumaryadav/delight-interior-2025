<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Browsershot\Browsershot;

class InvoiceController extends Controller
{
    public function generate(Request $request)
    {
        $html = view('invoice')->render();

        // Generate filename with current date/time
        $fileName = 'invoice-' . now()->format('Y-m-d_H-i-s') . '.pdf';
        $pdfPath = public_path('pdf/' . $fileName);

        // Ensure folder exists
        if (!file_exists(dirname($pdfPath))) {
            mkdir(dirname($pdfPath), 0755, true);
        }

        // Generate PDF
        Browsershot::html($html)
            // ->format('A4')
             ->format('Legal')
            ->save($pdfPath);

        // Redirect to show route and pass fileName as route param
        return redirect()->route('admin.invoice.show', ['name' => $fileName]);
    }


    public function show(Request $request, $name)
    {
        return Inertia::render('Admin/Invoice/Index', [
            'pdf_url'  => asset('pdf/' . $name),
            'fileName' => $name,
        ]);
    }
}
