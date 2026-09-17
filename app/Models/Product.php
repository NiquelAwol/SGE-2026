<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'active',
    ];

    /**
     * Relación N:1 - Un producto pertenece a una categoría.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relación 1:N - Un producto puede estar en múltiples detalles de venta.
     */
    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }

    /**
     * Relación N:N - Un producto participa en múltiples ventas.
     */
    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'sale_details')
                    ->withPivot('quantity', 'unit_price', 'subtotal')
                    ->withTimestamps();
    }
}
