<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'sale_date',
        'total',
        'status',
        'payment_method',
    ];

    /**
     * Relación N:1 - Una venta pertenece a un cliente.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Relación 1:N - Una venta contiene múltiples detalles.
     */
    public function details()
    {
        return $this->hasMany(SaleDetail::class);
    }

    /**
     * Relación N:N - Una venta tiene muchos productos a través de sale_details.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'sale_details')
                    ->withPivot('quantity', 'unit_price', 'subtotal')
                    ->withTimestamps();
    }
}
