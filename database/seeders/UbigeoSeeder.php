<?php

namespace Database\Seeders;

use App\Models\Ubigeo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UbigeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ubigeo::factory()->count(30)->create();
    }
}
