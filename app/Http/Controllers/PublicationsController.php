<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PublicationsController extends Controller
{
    public function index()
    {
        return view('publications.index',[
           'posts'=>Post::with('user')->latest()->get(),
           'comments'=>Comment::with('user')->latest()->get()
        ]);
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('publications'));
    }

}
