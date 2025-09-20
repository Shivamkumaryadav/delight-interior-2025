<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return Inertia::render('Frontend/Home',[
            'films' => $films
        ]);
    }
}
