<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'name',
        'price',
        'old_price',
        'location',
        'icon',
        'status',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
