<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class AdminSessionController extends Controller {
    public function index() {
        return Inertia::render( 'Auth/AdminLogin' );
    }

    public function store( AdminStoreRequest $request ) {
        if ( !Auth::attempt( $request->validated(), $remember = false ) ) {
            throw ValidationException::withMessages( [
                'email' => "Provided credentials doesn't match with our records"
            ] );
        }

        session()->flash( 'success', 'Welcome back!' );
        return to_route( 'admin.dashboard' );
    }
}
