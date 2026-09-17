<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'active',
    ];

    /**
     * Relación 1:N - Un cliente puede tener múltiples ventas.
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
