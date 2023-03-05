<?php

namespace Database\Seeders;

use App\Models\Caminada;
use Illuminate\Database\Seeder;

class CaminadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caminada::factory()->count(3)->create()->each(function ($customer) {
            $customer->save();
        });
    }
}
