<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderproducts extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'order_id' , 'product_id', 'name' , 'image' , 'sprice' ,  'total_amount' , 'status'] ;

    public $timestamps = true; // Add this line to enable timestamps

    public function order()
    {
        return $this->hasMany(Orderproducts::class, 'id');
    }
}