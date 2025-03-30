<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Responses\DefaultResponse;

class HealthCheckController extends Controller
{
    /**
     * Healthcheck
     *
     * POST api/healthcheck
     *
     * @return JsonResponse
     */
    public function healthCheck(): JsonResponse
    {
        return $this->response(new DefaultResponse());
    }
}
