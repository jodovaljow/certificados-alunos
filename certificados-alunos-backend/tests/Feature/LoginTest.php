<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function testSeeder()
    {
        $this->seed(UserSeeder::class);

        $this->assertDatabaseCount('users', 51);

        $this->assertDatabaseHas('users', [
            'email' => 'jow@unit.br',
        ]);
    }

    /**
     * @dataProvider loginProvider
     */
    public function testLogin($email, $password, $expected)
    {
        $this->seed(UserSeeder::class);

        $response = $this->post(
            '/api/login',
            [
                'email' => $email,
                'password' => $password,
            ]
        );

        $response->assertStatus($expected);

        if ($expected == 200) {
            $this->assertAuthenticated();
        } else {
            $this->assertGuest();
        }
    }

    public function loginProvider()
    {
        return [
            'login ok' => ['jow@unit.br', 'password', 200],
            'login não ok' => ['jow@unit.br', 'not_password', 403],
        ];
    }
}
