<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risktype extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [];

    public function risksubjects()
    {
        return $this->hasMany(Risksubject::class);
    }

    public function risksubcategories()
    {
        return $this->hasMany(Risksubcategory::class);
    }

    public function riskcategories()
    {
        return $this->belongsTo(Riskcategory::class);
    }
}
