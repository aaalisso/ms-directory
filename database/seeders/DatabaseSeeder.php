<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\PersonSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UbigeoSeeder');
        $this->command->info('Ubigeo seeded');
        $this->call('PersonSeeder');
        $this->command->info('Person seeded');
        $this->call('InstitutionSeeder');
        $this->command->info('Institution seeded');
        $this->call('UserSeeder');
        $this->command->info('User seeded');
        $this->call('Institution_PersonSeeder');
        $this->command->info('InstPerson seeded');
    }
}
