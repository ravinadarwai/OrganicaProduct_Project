<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishModel extends Model
{
    use HasFactory;
    protected $table = 'fishmeats';
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