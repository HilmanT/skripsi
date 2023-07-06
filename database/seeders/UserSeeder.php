<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $doctorRole = Role::firstOrCreate(['name' => 'dokter']);

        $user1 = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.test',
            'password' => Hash::make('admin123'),
        ]);
        $user1->assignRole($adminRole);

        $user2 = User::create([
            'name' => 'Dokter',
            'email' => 'dokter@gmail.test',
            'password' => Hash::make('dokter123'),
        ]);
        $user2->assignRole($doctorRole);
    }
}
