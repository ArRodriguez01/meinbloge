<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class AllPublicationsController extends Controller
{
    public function index()
    {
        return view('allpublications.index',[
            'users' =>User::all(),
            'posts'=>Post::all(),
           'comments'=>Comment::all()
        ]);

    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('allpublications'));
    }
}
