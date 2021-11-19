<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploadfile extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $fillable = ['filepath','filename','filesize','filetype','fileextension'];

    public function uploadfileable()
    {
        return $this->morphTo();
    }
}
