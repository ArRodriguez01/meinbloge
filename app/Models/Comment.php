<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=[
        'message',
        'post_id',
        'user_id',
    ];
    function post(){
        return $this->belongsTo(Post::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}
