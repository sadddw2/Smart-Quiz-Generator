<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KuisTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_create_kuis_page()
{
    $admin = User::factory()->create([
        'role' => 'admin'
    ]);

    $response = $this->actingAs($admin)
        ->get('/kuis/create');

    $response->assertStatus(200);
}
}