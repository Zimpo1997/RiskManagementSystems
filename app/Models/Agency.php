<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'workgroup_id',
    ];

    public function members()
    {

        return $this->hasMany(Member::class);
    }

    public function workgroup()
    {

        return $this->belongsTo(Workgroup::class);
    }

    public function mainrisks()
    {
        return $this->hasMany(Mainrisk::class);
    }

    public function agencies_join()
    {
        return $this->belongsToMany(Mainrisk::class, 'mainrisks_agencies_join');
    }
}
