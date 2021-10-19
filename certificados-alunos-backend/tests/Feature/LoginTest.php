<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    protected $seeder = UserSeeder::class;

    public function testSeeder()
    {
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
        $response = $this->post(
            '/api/login',
            [
                'email' => $email,
                'password' => $password,
            ]
        );

        $response->assertStatus($expected);
    }

    public function loginProvider()
    {
        return [
            'login ok' => ['jow@unit.br', 'password', 200],
            'login não ok' => ['jow@unit.br', 'not_password', 403],
        ];
    }
}
