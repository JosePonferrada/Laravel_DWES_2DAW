<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        DB::table('frutas')->delete(); // Borrar todos los registros de la tabla frutas

        DB::table('frutas')->insert([
            [
                'nombre' => 'Manzana',
                'temporada' => 1,
                'pais' => 'España'
            ],
            [
                'nombre' => 'Naranja',
                'temporada' => 2,
                'pais' => 'Colombia'
            ],
            [
                'nombre' => 'Sandía',
                'temporada' => 1,
                'pais' => 'Francia'
            ],
            [
                'nombre' => 'Pera',
                'temporada' => 3,
                'pais' => 'España'
            ],
        ]);
    }
}
