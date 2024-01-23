<?php

namespace App\Services\Provider;

use App\Services\Http\HttpService;

class Provider2TaskService implements TaskProviderInterface
{
    private $httpService;

    public function __construct(HttpService $httpService)
    {
        $this->httpService = $httpService;
    }

    public function getTasks(): array
    {
        $url = config('services.providers.provider2.url');
        $response = $this->httpService->getResult($url);

        if ($response) {
            return $response;
        }

        return [];
    }
}
