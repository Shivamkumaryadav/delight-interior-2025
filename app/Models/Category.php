<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image'
    ];

    public function films()
    {
        return $this->hasMany(Film::class);
    }

    public function projects()
    {
        return $this->hasMany(Film::class);
    }
}
