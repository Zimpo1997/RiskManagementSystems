<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'fname',
        'card_number',
        'birthday',
        'sex',
        'tel',
        'agencies_id',
        'position',
        'degree',
        'member_id',
        'add_home',
        'add_road',
        'add_moo',
        'add_district',
        'add_amphure',
        'add_province',
    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function agencies()
    {

        return $this->belongsTo(Agency::class);
    }

    public function mainrisks()
    {
        return $this->hasMany(Mainrisk::class);
    }
}
