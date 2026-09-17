<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Máquinas de Corte y Patilleras',
                'description' => 'Clippers inalámbricas, trimmers de precisión, shavers y cuchillas de repuesto.',
                'active' => true,
            ],
            [
                'name' => 'Tijeras y Navajas Profesionales',
                'description' => 'Tijeras de corte microdentadas, filo dulce, navajines tradicionales y hojas intercambiables.',
                'active' => true,
            ],
            [
                'name' => 'Ceras, Pomadas y Fijadores',
                'description' => 'Pomadas base agua, efecto mate, fijadores en spray y polvos de volumen para estilizado.',
                'active' => true,
            ],
            [
                'name' => 'Cuidado Facial, Barba y Aftershave',
                'description' => 'Geles de afeitar transparentes, lociones astringentes, aceites humectantes y tónicos.',
                'active' => true,
            ],
            [
                'name' => 'Mobiliario y Accesorios de Barbería',
                'description' => 'Capas de corte antiestáticas, cepillos degradados, pulverizadores continuos y desinfectantes.',
                'active' => true,
            ],
            [
                'name' => 'Electrónicos',
                'description' => 'Equipos y dispositivos electrónicos de barbería.',
                'active' => true,
            ],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['name' => $cat['name']], $cat);
        }
    }
}
