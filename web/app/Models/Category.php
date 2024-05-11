<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'platform_id'
    ];
    
    public function platform() {
        return $this->belongsTo('App\Models\Platform');
    }

    public function params() {
        return $this->hasMany('App\Models\Param');
    }
}
