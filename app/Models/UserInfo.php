<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    public function address() {
        return $this->belongsTo(User::class);
    }

    public function age() {
        return $this->belongsTo(User::class);
    }
}
