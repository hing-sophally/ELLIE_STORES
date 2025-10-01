<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'total_price',
        'status',
        'notes',
    ];

    // Relation to User (customer)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Optional: Relation to order items if needed
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
