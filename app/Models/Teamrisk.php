<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teamrisk extends Model
{
    use HasFactory;

    public function users()
    {

        return $this->belongsToMany(User::class, 'users_teamrisks');
    }

    public function mainrisks()
    {
        return $this->belongsToMany(Mainrisk::class, 'mainrisks_teamrisks_join');
    }
}
