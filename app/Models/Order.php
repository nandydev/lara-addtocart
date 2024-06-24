<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name', 'price', 'quantity', 'total', 'payment_method', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
