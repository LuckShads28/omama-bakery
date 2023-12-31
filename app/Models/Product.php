<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
        'product_pict',
        'price',
        'is_best_seller'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
