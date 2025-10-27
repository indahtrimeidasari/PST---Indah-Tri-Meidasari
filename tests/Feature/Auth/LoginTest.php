<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{
    use RefreshDatabase; // Reset database setiap test

    /** @test */
    public function admin_dapat_login_dan_diarahkan_ke_admin_dashboard()
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@example.com',
            'password' => '123456',
        ]);

        $response->assertRedirect('/admin');
        $this->assertAuthenticatedAs($admin);
    }

    /** @test */
    public function pegawai_dapat_login_dan_diarahkan_ke_pegawai_dashboard()
    {
        $pegawai = User::factory()->create([
            'email' => 'pegawai@example.com',
            'password' => Hash::make('123456'),
            'role' => 'pegawai',
        ]);

        $response = $this->post('/login', [
            'email' => 'pegawai@example.com',
            'password' => '123456',
        ]);

        $response->assertRedirect('/pegawai');
        $this->assertAuthenticatedAs($pegawai);
    }

    /** @test */
    public function pelanggan_dapat_login_dan_diarahkan_ke_halaman_utama()
    {
        $user = User::factory()->create([
            'email' => 'pelanggan@example.com',
            'password' => Hash::make('123456'),
            'role' => 'pelanggan',
        ]);

        $response = $this->post('/login', [
            'email' => 'pelanggan@example.com',
            'password' => '123456',
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function login_gagal_dengan_email_atau_password_salah()
    {
        $response = $this->post('/login', [
            'email' => 'salah@example.com',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
}
