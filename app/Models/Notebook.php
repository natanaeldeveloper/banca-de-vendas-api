<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'stand_id',
        'reference_date',
        'finished'
    ];

    public function stand()
    {
        return $this->belongsTo(Stand::class, 'stand_id', 'id');
    }
}
