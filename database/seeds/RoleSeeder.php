<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'user',
            'admin',
        ];

        foreach ($roles as $role) {
            try {
                \Spatie\Permission\Models\Role::create([
                    'name' => $role,
                    'guard_name' => 'web'
                ]);
            } catch (\Spatie\Permission\Exceptions\RoleAlreadyExists $e) {
            }
        }
    }
}
