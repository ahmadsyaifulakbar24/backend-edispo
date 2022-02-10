<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'parent_id' => null,
            'name' => 'Admin',
            'username' => 'admin',
            'position_name' => 'admin',
            'role' => 'admin',
            'active' => '1',
            'password' => Hash::make('12345678'),
        ]);
    }
}
