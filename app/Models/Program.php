<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'rp_name',
        'rp_token_line',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_programs');
    }

    public function mainrisks()
    {

        return $this->hasMany(Mainrisk::class);
    }
}
