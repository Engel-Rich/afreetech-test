<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    //

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
