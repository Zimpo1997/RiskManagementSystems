<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workgroup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tokenline'];

    public function agency()
    {
        return $this->hasMany(Agency::class);
    }

    public function mission()
    {
        return $this->belongsTo(Missions::class);
    }
}
