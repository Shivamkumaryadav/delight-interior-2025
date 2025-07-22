<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminFilmRequest;
use App\Http\Resources\AdminFilmResource;
use App\Models\Category;
use App\Models\Film;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminFilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = AdminFilmResource::collection(Film::paginate(10));
        return Inertia::render('Admin/Films/Index', [
            'films' => $films
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Films/Create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminFilmRequest $request)
    {
        // dd($request->all());
        // image is not required i will handle it later with traits
        Film::create([
            'name' => $request->name,
            'description' => $request->description,
            'uv_rejection' => $request->uv_rejection,
            'thickness' => $request->thickness,
            'warranty' => $request->warranty,
            'price' => $request->price,
            'image' => 'images',
            'slug' => str()->slug($request->name),
            'category_id' => $request->category

        ]);
        session('success', 'Film has been created.');
        return redirect()->route('admin.films.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        return Inertia::render('Admin/Films/Edit',[
            'film' => $film
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $film->update($request->validated());
        session('success', 'Film has been updated.');
        return redirect()->route('admin.films.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        // unlink the uploaded file later
        $film->delete();
        session('success', 'Film has been deleted.');
        return redirect()->route('admin.films.index');
    }
}
