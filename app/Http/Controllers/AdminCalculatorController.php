<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminCalculatorController extends Controller
{
    public function index()
    {

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
        // dd(session()->get('film_calculations'));
        // get the film id from the session film_calculations
        $filmId = session()->get('film_calculations.film_type');
        $film = Film::select('id', 'name')->findOrFail($filmId);

        return Inertia::render('Admin/Calculator/Show', [
            'calculations' => session()->get('film_calculations') ?? null, //preventing from showing error if any case the session data is not set
            'film' => $film
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
