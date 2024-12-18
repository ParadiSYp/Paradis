<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['dish_id', 'quantity'];

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}