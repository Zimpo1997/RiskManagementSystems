<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riskcategory extends Model
{
    use HasFactory;

    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [];

    public function risksubjects()
    {
        return $this->hasMany(Risksubject::class);
    }

    public function risktypes()
    {
        return $this->hasMany(Risktype::class);
    }

    public function riskgroup()
    {
        return $this->belongsTo(Riskgroup::class);
    }
}
