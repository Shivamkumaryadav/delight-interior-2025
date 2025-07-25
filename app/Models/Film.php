<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
     protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'uv_rejection',
        'thickness',
        'warranty',
        'price',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
