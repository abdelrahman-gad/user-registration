<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {
        \App\Models\User::factory()->create( [
            'email' => 'user@user.com',
            'username' => 'abdelrahmangad95@gmail.com',
            'password' => Hash::make( 'password' ),
            'name' => 'Abdelrahman Gad',
        ] );
    }

}
