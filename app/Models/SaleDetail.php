<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'unit_price',
        'subtotal',
    ];

    /**
     * Relación N:1 - El detalle pertenece a una venta.
     */
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    /**
     * Relación N:1 - El detalle referencia a un producto.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
