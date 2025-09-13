<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'blogs'; // <-- Use blogs table
    protected $fillable = ['title', 'content', 'image'];
}



