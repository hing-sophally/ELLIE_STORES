<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'category_id',
        'price',
        'stock',
        'description',
        'image',
    ];

    // Relation to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
