<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'stand_id',
        'name',
    ];

    public function stand()
    {
        return $this->belongsTo(Stand::class, 'stand_id', 'id');
    }

    public function prices()
    {
        return $this->hasMany(ProductPrice::class, 'stand_id', 'id');
    }
}
