<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminCalculatorController extends Controller
{
    public function index()
    {
        // session()->forget('invoice_items');
        $items = session()->get('invoice_items', []);


        return Inertia::render('Admin/Calculator/Index', [
            'films' => Film::select('id', 'name')->get(),
            'items' => $items
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'film_name' => 'required',
            'length' => 'required|numeric|min:1',
            // 'film_type' => 'required',
            'price' => 'required|numeric|min:1',
            'gst' => 'required|numeric|min:1',
            'sgst' => 'required|numeric|min:1',
        ]);

        // Get current items from session (or empty array if none exist)
        $items = session()->get('invoice_items', []);

        // Add the new validated item
        $items[] = [
            'film_name'   => $request->film_name,
            'length'      => $request->length,
            'price'       => $request->price,
            'gst'         => $request->gst,
            'sgst'        => $request->sgst,
            'totalPrice' => $request->length * $request->price,
        ];

        // Store back into session
        session()->put('invoice_items', $items);

        return redirect()->route('admin.calculator.index');
    }


    public function show(Request $request)
    {
        $invoiceData = session()->get('invoice_items') ?? [];

        $totalGST = 0;
        $totalSGST = 0;
        $overallSubtotal = 0;
        $grandTotal = 0;

        // Calculate GST, SGST, and grand total for each item
        foreach ($invoiceData as &$item) {
            $baseAmount = $item['price'] * $item['length']; // total without taxes

            $gstAmount = ($baseAmount * $item['gst']) / 100;
            $sgstAmount = ($baseAmount * $item['sgst']) / 100;

            $item['subtotal'] = $baseAmount;
            $item['gst_amount'] = $gstAmount;
            $item['sgst_amount'] = $sgstAmount;
            $item['total_with_tax'] = $baseAmount + $gstAmount + $sgstAmount;

            $totalGST += $gstAmount;
            $totalSGST += $sgstAmount;
            $overallSubtotal += $baseAmount;
            $grandTotal += $item['total_with_tax'];
        }
        unset($item); // break reference

        // Pass data to Inertia view
        return Inertia::render('Admin/Calculator/Show', [
            'calculations' => $invoiceData,
            'totals' => [
                'subtotal' => $overallSubtotal,
                'total_gst' => $totalGST,
                'total_sgst' => $totalSGST,
                'grand_total' => $grandTotal,
            ],
        ]);
    }


    public function removeItem(Request $request)
    {
        $request->validate([
            'index' => 'required|integer',
        ]);

        $items = session()->get('invoice_items', []);

        if (isset($items[$request->index])) {
            // Remove the item
            unset($items[$request->index]);
            // Reindex the array
            $items = array_values($items);
            session()->put('invoice_items', $items);
        }

        return redirect()->route('admin.calculator.index');
    }

    public function destroy()
    {
        session()->forget('invoice_items');
        session()->flash('success', 'All invoice items have been cleared successfully.');
        return redirect()->route('admin.calculator.index');
    }
}
