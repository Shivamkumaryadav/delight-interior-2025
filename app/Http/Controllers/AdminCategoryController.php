<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminCategoryController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $query = Category::with('projects');

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        // $categories = $query->paginate(2)->withQueryString();
        $categories = $query->paginate(1)->onEachSide(2)->withQueryString();

        return Inertia::render('Admin/Categories/Index', [
            'categories' => $categories,
            'search' => $search
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|min:3|unique:categories,name',
            'image' => 'required|image|mimes:png,jpeg,jpg|max:2048',
        ]);

        $attributes = [
            'name' => $request->name,
            'slug' => str()->slug($request->name),
        ];

        // Upload the image if exists
        if ($request->hasFile('image')) {
            // Save in "storage/app/public/categories"
            $imagePath = $this->uploadImage('image', 'categories');
            $attributes['image'] = $imagePath;
        }

        // Create category
        Category::create($attributes);

        // Flash success and redirect
        session()->flash('success', 'Category has been created.');
        return to_route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return Inertia::render('Admin/Categories/Edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:3|unique:categories,name,' . $category->id
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => str()->slug($request->name)
        ]);

        session()->flash('success', 'Category has been updated.');
        return to_route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', 'Category has been deleted.');
        return to_route('admin.categories.index');
    }
}
