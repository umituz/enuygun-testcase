<?php

namespace App\Services\Api;

use App\Services\Base\DeveloperService;
use App\Services\Http\HttpService;
use App\Traits\Logger;

/**
 * Class BaseService
 */
class BaseApiService
{
    use Logger;

    protected HttpService $httpService;
    protected DeveloperService $developerService;

    public function __construct(
        HttpService $httpService,
        DeveloperService $developerService
    ) {
        $this->httpService = $httpService;
        $this->developerService = $developerService;
    }
}
