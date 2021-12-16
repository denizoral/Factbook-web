<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTags extends Model
{
    use HasFactory;

    //A user could have more than one tag and this tag could be attached to more than one user
    public function tags() {
        return $this->belongsToMany(User::class);
    }
}
