<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provider;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $providers = [
            [
                'name' => 'Wahl Clipper Corporation Colombia',
                'contact_person' => 'Carlos Gómez',
                'phone' => '3112223344',
                'email' => 'ventas@wahl.co',
                'address' => 'Zona Industrial El Poblado, Medellín',
                'active' => true,
            ],
            [
                'name' => 'Andis Professional Tools SAS',
                'contact_person' => 'María Fernanda Ruiz',
                'phone' => '3145556677',
                'email' => 'contacto@andis.co',
                'address' => 'Av. El Dorado # 68C-61, Bogotá',
                'active' => true,
            ],
            [
                'name' => 'Barber Pro Supplies Valle',
                'contact_person' => 'Julián Castro',
                'phone' => '3178889900',
                'email' => 'distribuciones@barberpro.com',
                'address' => 'Calle 15 # 28-40, Cali, Valle del Cauca',
                'active' => true,
            ],
            [
                'name' => 'Elegance Hair Care Colombia',
                'contact_person' => 'Andrea Morales',
                'phone' => '3163334455',
                'email' => 'soporte@elegance.com.co',
                'address' => 'Cra 7 # 19-28, Pereira, Risaralda',
                'active' => true,
            ],
            [
                'name' => 'Insumos Barberos del Eje Cafetero',
                'contact_person' => 'Roberto Valencia',
                'phone' => '3137778899',
                'email' => 'pedidos@insumosbarberos.com',
                'address' => 'Cra 4 # 10-12, Cartago, Valle del Cauca',
                'active' => true,
            ],
        ];

        foreach ($providers as $provider) {
            Provider::updateOrCreate(['name' => $provider['name']], $provider);
        }
    }
}
