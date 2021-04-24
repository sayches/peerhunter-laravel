<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\User::create([
            'name'       => 'Super Admin',
            'email'      => 'admin@peerhunter.com',
            'password'   => Hash::make('password')
        ]);
        $admin->assignRole('admin');
    }
}
