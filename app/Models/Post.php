<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;
class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'message',
    ];
    function user(){
        return $this->belongsTo(User::class);
    }
    function comments(){
        return $this->hasMany(Comment::class);
    }
    function tags(){
        return $this->hasMany(Tag::class);
    }
}
