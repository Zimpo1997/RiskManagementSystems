<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risksubcategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [];

    public function risksubjects()
    {
        return $this->hasMany(Risksubject::class);
    }
    public function risktype()
    {
        return $this->belongsTo(Risktype::class);
    }
}
