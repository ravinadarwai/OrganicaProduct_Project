<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminmodel extends Model
{
    use HasFactory;

    protected $table = 'addproducts'; 
    protected $fillable = [
        'vegeno',
        'name',
        'date',
        'category',
        'quant',
        'sprice',
        'cprice',
        'description',
        'image',
    ];
}
