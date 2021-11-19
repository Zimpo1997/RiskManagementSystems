<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risksubject extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'name_th',
        'riskgroup_id',
        'riskcategories_id',
        'risktype_id',
        'risksubcategories_id',
        'is_standard',
        'publish',
    ];

    public function risksubcategories()
    {
        return $this->belongsTo(Risksubcategory::class);
    }
    public function risktype()
    {
        return $this->belongsTo(Risktype::class);
    }
    public function riskcategories()
    {
        return $this->belongsTo(Riskcategory::class);
    }
    public function riskgroup()
    {
        return $this->belongsTo(Riskgroup::class);
    }

    public function mainrisks()
    {
        return $this->hasMany(Mainrisk::class);
    }
}
