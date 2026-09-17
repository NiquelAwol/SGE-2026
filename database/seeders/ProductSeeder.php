<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maquinas = Category::where('name', 'like', '%Máquinas%')->first();
        $tijeras = Category::where('name', 'like', '%Tijeras%')->first();
        $ceras = Category::where('name', 'like', '%Ceras%')->first();
        $cuidado = Category::where('name', 'like', '%Cuidado%')->first();
        $accesorios = Category::where('name', 'like', '%Mobiliario%')->first();

        $products = [
            [
                'name' => 'Wahl Magic Clip Cordless 5 Star',
                'description' => 'Máquina de corte profesional con cuchilla Stagger-Tooth para degradados perfectos.',
                'price' => 480000.00,
                'stock' => 15,
                'category_id' => $maquinas?->id,
                'active' => true,
            ],
            [
                'name' => 'Andis Slimline Pro Li Trimmer',
                'description' => 'Patillera inalámbrica para delineados precisos, contornos y rasurados limpios.',
                'price' => 395000.00,
                'stock' => 12,
                'category_id' => $maquinas?->id,
                'active' => true,
            ],
            [
                'name' => 'Tijera Filo Dulce Kasho Japanese 6.0 pulg',
                'description' => 'Tijera de corte ergonómica en acero japonés de alta durabilidad.',
                'price' => 220000.00,
                'stock' => 8,
                'category_id' => $tijeras?->id,
                'active' => true,
            ],
            [
                'name' => 'Pomada Fijadora Suavecito Firme Hold 4oz',
                'description' => 'Pomada soluble en agua con fijación extra firme y aroma clásico inconfundible.',
                'price' => 65000.00,
                'stock' => 45,
                'category_id' => $ceras?->id,
                'active' => true,
            ],
            [
                'name' => 'Gel de Afeitar Elegance Plus 500ml',
                'description' => 'Fórmula lubricante transparente para un afeitado suave con visibilidad total de líneas.',
                'price' => 42000.00,
                'stock' => 30,
                'category_id' => $cuidado?->id,
                'active' => true,
            ],
            [
                'name' => 'Capa de Barbero Antiestática Todo Barberos',
                'description' => 'Capa impermeable repelente al agua y cabello con ajuste elástico reforzado.',
                'price' => 35000.00,
                'stock' => 25,
                'category_id' => $accesorios?->id,
                'active' => true,
            ],
        ];

        foreach ($products as $prod) {
            Product::updateOrCreate(['name' => $prod['name']], $prod);
        }
    }
}
