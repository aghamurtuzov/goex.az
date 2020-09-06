<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'agha',
            'email' => 'agha@mail.ru',
            'first_name' => 'Agha',
            'last_name' => 'Murtuzov',
            'ip_address' => '124.35.15',
            'status' => true,
            'date' => Date::now(),
            'phone' => '55555555',
            'password' => Hash::make('123456'),
        ]);
        $user = User::create([
            'username' => 'Saiq',
            'email' => 'saiq@mammadoff.com',
            'first_name' => 'Saiq',
            'last_name' => 'Mammadoff',
            'ip_address' => '124.35.15',
            'date' => Date::now(),
            'status' => true,
            'phone' => '55555555',
            'password' => Hash::make('123456'),
        ]);
        $user = User::create([
            'username' => 'Kenan',
            'email' => 'kenan@mammadoff.com',
            'first_name' => 'Kenan',
            'last_name' => 'Asadov',
            'ip_address' => '124.35.15',
            'date' => Date::now(),
            'status' => true,
            'phone' => '55555555',
            'password' => Hash::make('123456'),
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
