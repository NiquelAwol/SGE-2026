<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\Models\Product;
use App\Models\Client;
use App\Models\Provider;
use App\Models\Sale;
use App\Models\SaleDetail;

class Clase4ModelsAndRelationsTest extends TestCase
{
    use RefreshDatabase;

    protected bool $seed = true;

    public function test_categories_and_products_relationship()
    {
        $category = Category::where('name', 'like', '%Máquinas%')->first();
        $this->assertNotNull($category, 'Debe existir una categoría');

        // Test Category -> Products (1:N)
        $this->assertGreaterThanOrEqual(1, $category->products->count());

        // Test Product -> Category (N:1)
        $product = $category->products->first();
        $this->assertEquals($category->id, $product->category->id);
    }

    public function test_clients_and_sales_relationship()
    {
        $client = Client::first();
        $this->assertNotNull($client, 'Debe existir al menos un cliente');

        // Test Client -> Sales (1:N)
        $this->assertGreaterThanOrEqual(1, $client->sales->count());

        // Test Sale -> Client (N:1)
        $sale = $client->sales->first();
        $this->assertEquals($client->id, $sale->client->id);
    }

    public function test_sales_and_products_many_to_many_with_details()
    {
        $sale = Sale::with(['details', 'products'])->first();
        $this->assertNotNull($sale, 'Debe existir al menos una venta');

        // Test Sale has details
        $this->assertGreaterThanOrEqual(1, $sale->details->count());

        // Test Sale has products through pivot
        $this->assertGreaterThanOrEqual(1, $sale->products->count());

        // Test pivot data
        $firstProduct = $sale->products->first();
        $this->assertNotNull($firstProduct->pivot->quantity);
        $this->assertNotNull($firstProduct->pivot->unit_price);
        $this->assertNotNull($firstProduct->pivot->subtotal);
    }

    public function test_minimum_five_records_per_table_from_seeders()
    {
        $this->assertGreaterThanOrEqual(5, Category::count(), 'Deben existir mínimo 5 categorías');
        $this->assertGreaterThanOrEqual(5, Product::count(), 'Deben existir mínimo 5 productos');
        $this->assertGreaterThanOrEqual(5, Client::count(), 'Deben existir mínimo 5 clientes');
        $this->assertGreaterThanOrEqual(5, Provider::count(), 'Deben existir mínimo 5 proveedores');
        $this->assertGreaterThanOrEqual(5, Sale::count(), 'Deben existir mínimo 5 ventas');
    }

    public function test_tinker_style_creation_and_inverse_relation()
    {
        $category = Category::first();

        $newProduct = Product::create([
            'name' => 'Wahl Legend 5 Star Test',
            'description' => 'Máquina clipper de precisión para pruebas',
            'price' => 460000,
            'stock' => 5,
            'category_id' => $category->id,
            'active' => true,
        ]);

        $this->assertEquals($category->name, $newProduct->category->name);
        $this->assertTrue($category->products->contains('id', $newProduct->id));
    }
}
