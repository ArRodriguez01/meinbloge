<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();
        $role = new Role();
        $role->name = 'user';
        $role->description = 'User';
        $role->save();
        $role= new Role();
        $role->name = 'guest';
        $role->description = 'Guest';
        $role->save();
        $role= new Role();
        $role->name = 'loader';
        $role->description = 'Loader';
        $role->save();
    }
}
