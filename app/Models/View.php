<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = ['viewable_id', 'viewable_type', 'view_date', 'views_count','ip_address', 'country'];

    public function viewable()
    {
        return $this->morphTo();
    }
}
