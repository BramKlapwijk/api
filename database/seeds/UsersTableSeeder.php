<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'admin@example.nl',
            'password' => bcrypt(env('ADMIN_PASS'))
        ])->syncPermissions(\Spatie\Permission\Models\Permission::all());
    }
}
