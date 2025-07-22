<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminCalculatorController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Calculator/Index', [
            'films' => Film::select('id', 'name')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'length' => 'required|numeric|min:1',
            'film_type' => 'required',
            'price' => 'required|numeric|min:1',
            'gst' => 'required|numeric|min:1',
            'sgst' => 'required|numeric|min:1',

        ]);
    }
}
