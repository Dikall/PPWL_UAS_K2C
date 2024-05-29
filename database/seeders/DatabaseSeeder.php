<?php

namespace Database\Seeders;

use App\Models\Saldo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin
        User::create([
            'name' => 'Admin',
            'email' => 'Emak@uas.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
        ]);

        // Create Users
        $user1 = User::create([
            'name' => 'Doni',
            'email' => 'Doni@uas.com',
            'password' => Hash::make('12345'),
            'role' => 'user',
        ]);

        $user2 = User::create([
            'name' => 'Dina',
            'email' => 'Dina@uas.com',
            'password' => Hash::make('12345'),
            'role' => 'user',
        ]);

        // Create Saldos for Users
        Saldo::create([
            'user_id' => $user1->id,
            'saldo' => 1000.00,
        ]);

        Saldo::create([
            'user_id' => $user2->id,
            'saldo' => 2000.00,
        ]);
    }
}
