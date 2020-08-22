<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = [
        'allergies' => 'array'
    ];

    public function category(){
        return $this->belongsTO(Category::class);
    }
}
