<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'contact_no',
        'address',
        'pincode',
    ];

    public function orderproducts()
    {
        return $this->hasMany(orderproducts::class, 'order_id', 'id');
    }
    
}
