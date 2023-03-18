<?php

namespace Database\Seeders;

use App\Models\Institution_Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Institution_PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Institution_Person::factory()->count(20)->create();
    }
}
