<?php

namespace App\Http\Controllers\Api;

use App\Services\Provider\TaskProviderService;

class ProvidersController extends BaseController
{
    private TaskProviderService $providerService;

    public function __construct(TaskProviderService $providerService)
    {
        $this->providerService = $providerService;
    }

    public function getProviderTaskList()
    {
        $data = $this->providerService->getTasks();

        return $this->ok(
            data: $data
        );
    }
}
