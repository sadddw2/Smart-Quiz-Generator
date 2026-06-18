<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserCrudTest extends TestCase
{
    use RefreshDatabase;

 public function test_admin_can_update_user()
{
    $admin = User::factory()->create([
        'role' => 'admin',
    ]);

    $user = User::factory()->create([
        'role' => 'mahasiswa',
    ]);

    $response = $this->actingAs($admin)
        ->get('/users/'.$user->id.'/edit');

    $response->assertStatus(200);
    $response->assertSee($user->name);
}
    public function test_admin_can_delete_user()
{
    $admin = User::factory()->create([
    'role' => 'admin',
]);

$user = User::factory()->create([
    'role' => 'mahasiswa',
]);

    $response = $this->actingAs($admin)
        ->delete('/users/'.$user->id);

    $response->assertStatus(302);

    $this->assertDatabaseMissing('users', [
        'id' => $user->id
    ]);
}
}