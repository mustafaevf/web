<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'img'
    ];

    public function category() {
        return $this->hasMany('App\Models\Category');
    }
}
