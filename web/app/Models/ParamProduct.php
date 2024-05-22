<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParamProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'param_id',
        'product_id',
        'value'
    ];
}
