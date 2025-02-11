<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = ['shopping_id', 'product_id', 'amount', 'unitprice'];

    public $timestamps = false; // Deshabilitar timestamps

    public function shopping()
    {
        return $this->belongsTo(Shopping::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
