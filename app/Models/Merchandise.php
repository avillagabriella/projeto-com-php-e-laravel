<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Merchandise extends Model
{
   
    protected $table = 'merchandises';
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'amount',
        'supplier',
        'barcode',
        'weight',
        'cost_price',
        'sale_price',
        'main_photo'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
