<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
class UserSeeder extends Seeder
{
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_guest=Role::where('name', 'guest')->first();
        $role_loader=Role::where('name', 'loader')->first();
        $user = new User();
        $user->name = 'User';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);
        $user = new User();
        $user->name = 'Guest';
        $user->email = 'guest@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_guest);
        $user = new User();
        $user->name = 'Loader';
        $user->email = 'loader@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_loader);
     }
}
