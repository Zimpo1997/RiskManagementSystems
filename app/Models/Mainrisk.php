<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mainrisk extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'risksubject_id',
        'isdate',
        'istime',
        'riskepoint_id',
        'riskseverities_id',
        'risk_detail',
        'risk_inmanage',
        'risk_note',
        'member_id',
        'agencies_id',
        'program_id',
        'respon_workgroup_id',
        'riskstep_id',
        'risk_comment',
    ];

    public function risksubject()
    {
        return $this->belongsTo(Risksubject::class);
    }

    public function riskepoint()
    {
        return $this->belongsTo(Riskepoint::class);
    }

    public function riskseverities()
    {
        return $this->belongsTo(Riskseverities::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function agencies()
    {
        return $this->belongsTo(Agency::class);
    }

    public function riskstep()
    {
        return $this->belongsTo(Riskstep::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function respon_workgroup()
    {
        return $this->belongsTo(Workgroup::class, 'respon_workgroup_id', 'id');
    }

    public function teamrisks_join()
    {
        return $this->belongsToMany(Teamrisk::class, 'mainrisks_teamrisks_join');
    }

    public function agencies_join()
    {
        return $this->belongsToMany(Agency::class, 'mainrisks_agencies_join');
    }

    public function uploadfiles()
    {
        return $this->morphOne(Uploadfile::class, 'uploadfileable');
    }
}
