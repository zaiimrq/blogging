<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'title' => 'All Post',
            'posts' => Post::latest()->filter(request(['search','author', 'category']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'title' => 'Post Detail',
            'post' => $post
        ]);
    }
}
