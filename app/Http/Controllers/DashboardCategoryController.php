<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       Gate::authorize('is_admin');

       return view('dashboard.admin.index', [
        "categories" => Category::latest()->get(),
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'New category has been added !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.admin.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rule = [
            'name' => ['required']
        ];

        if($request->name !== $category->name) {
            $rule['slug'] =  ['required', 'unique:categories'];
        }

        $data = $request->validate($rule);

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category has been deleted !');
    }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->category);
        return response()->json(['slug' => $slug]);
    }
}
