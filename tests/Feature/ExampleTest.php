<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_can_create_client()
    {
        $response = $this->post('/clients', [
            'name' => 'Test Client',
            'email' => 'test@example.com',
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('clients', ['name' => 'Test Client']);
    }
}
