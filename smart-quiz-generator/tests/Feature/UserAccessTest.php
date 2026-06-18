<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserAccessTest extends TestCase
{
    public function test_guest_cannot_access_dashboard()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }
}