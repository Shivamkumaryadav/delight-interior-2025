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

        // dd($request->film_calculations);
        // store the calulated data into the session
        session()->put('film_calculations', $request->film_calculations);
        // dd(session()->get('film_calculations'));
        return redirect()->route('admin.calculator.show');
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
}
