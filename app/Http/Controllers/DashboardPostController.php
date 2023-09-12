<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::latest()->where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'slug' => ['required', 'unique:posts'],
            'category_id' => ['required'],
            'body' => ['required']
        ]);

        $data['user_id'] = Auth::user()->id;
        $data['excerpt'] = Str::limit($data['body'], 20);

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'New post has been added !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'categories' => Category::all(),
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rule = [
            'title' => ['required', 'min:5', 'max:255'],
            'category_id' => ['required'],
            'body' => ['required']
        ];

        if($request->slug !== $post->slug) {
            $rule['slug'] = ['required', 'unique:posts'];
        } 

        $data = $request->validate($rule);


        $data['slug'] = $post->slug;
        $data['user_id'] = Auth::user()->id;
        $data['excerpt'] = Str::limit(strip_tags($request->body), 300);

        Post::firstWhere('id', $post->id)->update($data);
        return redirect()->route('posts.index')->with('success', 'Post has been updated !');
        


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return  redirect(route('posts.index'))->with('success', 'Post has been deleted !');
        
    }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
