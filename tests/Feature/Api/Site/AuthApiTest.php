<?php

namespace Tests\Feature\Api\Site;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;
    function setUp(): void
    {
        parent::setUp();
        Artisan::call( 'db:seed', [ '--class' => 'UserSeeder' ] );
    }

    public function test_user_can_register()
    {
        $password = $this->faker->password( 8 );

        $response = $this->postJson( '/api/register', [
            'name' => 'Abdelrahman Gad',
            'username'=> $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $password,
            'password_confirmation' => $password
        ] );

        $response->assertStatus( 200 );
    
    }

    public function test_user_can_login()
    {
        $user = User::first();

        $response = $this->postJson( '/api/login', [
            'email' => $user->email,
            'password' => 'password',
          ] );

        $response->assertStatus( 200 );
    }
}
