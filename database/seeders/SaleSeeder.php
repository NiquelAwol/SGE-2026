<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = Client::all();
        $products = Product::all();

        if ($clients->isEmpty() || $products->isEmpty()) {
            return;
        }

        $salesData = [
            [
                'client_index' => 0,
                'sale_date' => now()->subDays(5),
                'payment_method' => 'transferencia',
                'items' => [
                    ['product_index' => 0, 'quantity' => 1], // Wahl Magic Clip
                    ['product_index' => 3, 'quantity' => 2], // Pomada Suavecito
                ]
            ],
            [
                'client_index' => 1,
                'sale_date' => now()->subDays(4),
                'payment_method' => 'efectivo',
                'items' => [
                    ['product_index' => 1, 'quantity' => 1], // Andis Slimline
                    ['product_index' => 4, 'quantity' => 3], // Gel Elegance
                ]
            ],
            [
                'client_index' => 2,
                'sale_date' => now()->subDays(3),
                'payment_method' => 'datafono',
                'items' => [
                    ['product_index' => 2, 'quantity' => 1], // Tijera Kasho
                    ['product_index' => 5, 'quantity' => 2], // Capa Barbero
                ]
            ],
            [
                'client_index' => 3,
                'sale_date' => now()->subDays(2),
                'payment_method' => 'efectivo',
                'items' => [
                    ['product_index' => 3, 'quantity' => 5], // Pomada Suavecito
                    ['product_index' => 4, 'quantity' => 2], // Gel Elegance
                ]
            ],
            [
                'client_index' => 4,
                'sale_date' => now()->subDays(1),
                'payment_method' => 'transferencia',
                'items' => [
                    ['product_index' => 0, 'quantity' => 2], // Wahl Magic Clip
                    ['product_index' => 1, 'quantity' => 1], // Andis Slimline
                    ['product_index' => 5, 'quantity' => 3], // Capa Barbero
                ]
            ],
        ];

        foreach ($salesData as $data) {
            $client = $clients[$data['client_index']] ?? $clients->first();

            $sale = Sale::create([
                'client_id' => $client->id,
                'sale_date' => $data['sale_date'],
                'total' => 0,
                'status' => 'completada',
                'payment_method' => $data['payment_method'],
            ]);

            $total = 0;
            foreach ($data['items'] as $item) {
                $product = $products[$item['product_index']] ?? $products->first();
                $subtotal = $product->price * $item['quantity'];
                $total += $subtotal;

                SaleDetail::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'unit_price' => $product->price,
                    'subtotal' => $subtotal,
                ]);
            }

            $sale->update(['total' => $total]);
        }
    }
}
