<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function postCommenter() {
        return $this->belongsTo(Post::class);
    }

    public function commenter() {
        return $this->belongsTo(User::class);
    }

}
