<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VegeModel extends Model
{
    use HasFactory;

    protected $table = 'addproducts';

    protected $fillable = [
        'vegeno',
        'name',
        'date',
        'quant',
        'sprice',
        'cprice',
        'description',
       'image',
    ];}
