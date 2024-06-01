<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrendyModel extends Model
{
    use HasFactory;
    protected $table = 'trendyproducts';
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
