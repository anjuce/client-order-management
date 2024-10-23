<?php

namespace Tests\Unit;

use App\Services\ClientService;
use Tests\TestCase;

class ClientServiceTest extends TestCase
{
    public function testCreateClient()
    {
        $service = new ClientService();
        $client = $service->createClient(['name' => 'John Doe', 'email' => 'john@example.com']);
        $this->assertDatabaseHas('clients', ['name' => 'John Doe']);
    }
}
