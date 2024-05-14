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
            'email' => '0123456789',
            'username' => 'user@user.com',
            'password' => Hash::make( 'password' ),
            'name' => 'Abdelrahman Gad',
        ] );
    }

}
