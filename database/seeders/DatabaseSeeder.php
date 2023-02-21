<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run()
    {
        // La creación de datos de roles debe ejecutarse primero
        $this->call(RoleSeeder::class);
        // Los usuarios necesitarán los roles previamente generados
        $this->call(UserSeeder::class);
    }
}
