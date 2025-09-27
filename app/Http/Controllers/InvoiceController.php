<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Browsershot\Browsershot;

class InvoiceController extends Controller
{
public function generate(Request $request)
{
    $client = $request->input('bill_to', []);
    $company = $request->input('company', [
        'name' => 'DELIGHT INTERIOR SERVICE',
        'address' => '11, Vaishali Sadan, Old Nagardas Rd., Mogra Pada, Andheri (E), Mumbai - 400 069',
        'email' => 'delightinterior@gmail.com',
        'phone' => '9821105937',
        'gstn' => '27AESSP1449MIZZ',
    ]);
    $itemsRaw = $request->input('items', []);
    $payment = $request->input('payment', ['term' => '100% advance']);
    $bank = $request->input('bank_details', [
        'name' => 'Union Bank of India',
        'branch' => 'Andheri East Branch Mumbai - 400 069',
        'account_number' => '315301010060059',
        'ifsc' => 'UBIN0531533'
    ]);

    // Map incoming items to template structure
    $items = [];
    foreach ($itemsRaw as $item) {
        $items[] = [
            'description' => $item['film_name'] ?? '',
            'hsn' => $item['hsn'] ?? '',
            'quantity' => $item['length'] ?? 0,
            'rate' => $item['price'] ?? 0,
            'total' => $item['totalPrice'] ?? 0,
            'cgst_rate' => $item['gst'] ?? 0,
            'cgst_amount' => $item['gst_amount'] ?? 0,
            'sgst_rate' => $item['sgst'] ?? 0,
            'sgst_amount' => $item['sgst_amount'] ?? 0,
            'igst_amount' => 0,
        ];
    }

    $totalsRaw = $request->input('totals', []);
    $totals = [
        'subtotal' => $totalsRaw['subtotal'] ?? 0,
        'cgst' => $totalsRaw['total_gst'] ?? 0,
        'sgst' => $totalsRaw['total_sgst'] ?? 0,
        'cgst_rate' => 9,
        'sgst_rate' => 9,
        'grand_total' => $totalsRaw['grand_total'] ?? 0,
        'amount_in_words' => $this->convertNumberToWords($totalsRaw['grand_total'] ?? 0),
    ];

    $invoice = [
        'number' => $request->input('invoice.number', '78'),
        'date' => $request->input('invoice.date', now()->format('d-m-Y'))
    ];

    // dd($invoice);
    // Render Blade view with dynamic data
    $html = view('invoice', compact('client', 'company', 'items', 'payment', 'bank', 'totals', 'invoice'))->render();

    // Generate PDF
    $fileName = 'invoice-' . now()->format('Y-m-d_H-i-s') . '.pdf';
    $pdfPath = public_path('pdf/' . $fileName);
    if (!file_exists(dirname($pdfPath))) {
        mkdir(dirname($pdfPath), 0755, true);
    }

    Browsershot::html($html)
        ->format('A4')
        ->save($pdfPath);

    return redirect()->route('admin.invoice.show', ['name' => $fileName]);
}



    public function show(Request $request, $name)
    {
        return Inertia::render('Admin/Invoice/Index', [
            'pdf_url'  => asset('pdf/' . $name),
            'fileName' => $name,
        ]);
    }

    // Helper function to convert number to words
    private function convertNumberToWords($number)
    {
        $f = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);
        return ucfirst($f->format($number)) . ' only';
    }
}
