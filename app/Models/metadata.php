<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metadata extends Model
{
    protected $table = 'metas';

    use HasFactory;
    protected $fillable = ['description', 'keyword', 'title', 'url'];
}