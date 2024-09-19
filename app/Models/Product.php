<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements hasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'category_id',
        'name',
        'price',
        'old_price',
        'location',
        'icon',
        'status',
        'description',
        'cost',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function registerAllMediaConversions(): void
    {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->nonOptimized();

    }
    public function views()
    {
        return $this->morphMany(View::class, 'viewable');
    }
}
