<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user   = User::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'username'     => 'Super Admin',
                'email' => 'superadmin@admin.com',
                'pass' => 'superadmin',
                'role' => 'superadmin',
                'password' => Hash::make('superadmin'),
            ]
        );
    }
}
