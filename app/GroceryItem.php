<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroceryItem extends Model
{
    protected $fillable = ['name', 'inCart', 'bought'];
    protected $casts = [
        'inCart' => 'boolean',
        'bought' => 'boolean'
    ];

}
