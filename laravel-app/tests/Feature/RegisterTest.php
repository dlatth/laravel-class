<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{
    public function test_register_page_can_be_rendered()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('회원가입');
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'name' => '테스트 사용자',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/home');
        
        $this->assertDatabaseHas('users', [
            'name' => '테스트 사용자',
            'email' => 'test@example.com',
        ]);
    }

    public function test_validation_errors_for_invalid_data()
    {
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'invalid-email',
            'password' => '123',
            'password_confirmation' => '456',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }
}
