<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'name' => 'Barbero Real Studio',
                'phone' => '3104567890',
                'email' => 'barbero.real@gmail.com',
                'address' => 'Calle 10 # 5-20, Centro, Cartago',
                'active' => true,
            ],
            [
                'name' => 'Andrés Ospina Barber Shop',
                'phone' => '3157891234',
                'email' => 'aospina.barber@gmail.com',
                'address' => 'Cra 4 # 12-45, Álamos, Pereira',
                'active' => true,
            ],
            [
                'name' => 'Peluquería y Estilo Urbano',
                'phone' => '3189998877',
                'email' => 'estilourbano@hotmail.com',
                'address' => 'Carrera 6 # 8-32, San Jerónimo, Cartago',
                'active' => true,
            ],
            [
                'name' => 'David Barber VIP',
                'phone' => '3123456781',
                'email' => 'davidbarbervip@gmail.com',
                'address' => 'Calle 14 # 3-15, El Prado, Cartago',
                'active' => true,
            ],
            [
                'name' => 'Master Fade Barbería Cartago',
                'phone' => '3001234567',
                'email' => 'masterfade@gmail.com',
                'address' => 'Av. Del Río # 25-10, Pereira',
                'active' => true,
            ],
        ];

        foreach ($clients as $client) {
            Client::updateOrCreate(['email' => $client['email']], $client);
        }
    }
}
