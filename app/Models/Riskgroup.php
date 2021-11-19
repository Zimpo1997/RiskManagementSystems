<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riskgroup extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [];

    public function risksubjects()
    {
        return $this->hasMany(Risksubject::class);
    }

    public function riskcategories()
    {
        return $this->hasMany(Riskcategory::class);
    }
}
