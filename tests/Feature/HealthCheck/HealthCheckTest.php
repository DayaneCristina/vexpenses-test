<?php

namespace Tests\Feature\HealthCheck;

use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    /**
     * Teste de acesso ao healthcheck
     *
     * @return void
     */
    public function testHealthCheck()
    {
        $response = $this->get('/api/healthcheck');

        $response->assertStatus(200);
        $response->assertJson(
            [
                'success' => true,
                'method'  => 'GET',
                'code'    => 200,
                'data'    => null,
            ],
            true
        );
    }
}
