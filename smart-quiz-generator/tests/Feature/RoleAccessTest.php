<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleAccessTest extends TestCase
{
    use RefreshDatabase;

   public function test_mahasiswa_cannot_access_admin_page()
{
    $mahasiswa = User::factory()->create([
        'role' => 'mahasiswa'
    ]);

    $response = $this->actingAs($mahasiswa)
        ->get('/users');

    $response->assertStatus(403);
}
}