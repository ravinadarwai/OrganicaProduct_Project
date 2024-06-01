<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FruitModel extends Model
{
    use HasFactory;
    protected $table = 'fruits';
    protected $fillable = [
        'prono',
        'name',
        'date',
        'quant',
        'sprice',
        'cprice',
        'description',
        'image',
    ];}
