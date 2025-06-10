<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1!'), // Enkripsi password
            'role' => 'admin',
            'status' => 'active', // Atau status default yang Anda inginkan
            'email_verified_at' => now(), // Jika Anda ingin menandai email sebagai terverifikasi
        ]);
    }
}
