<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dairymodel extends Model
{
    use HasFactory;
    protected $table = 'dairyproducts';
    protected $fillable = [
        'prono',
        'name',
        'date',
        'quant',
        'sprice',
        'cprice',
        'description',
        'image',
    ];
}