<?php

namespace App\Services\Api;

use App\Services\Base\DeveloperService;
use App\Services\Http\HttpService;
use App\Services\Log\LogService;

/**
 * Class BaseService
 */
class BaseApiService
{
    protected HttpService $httpService;

    protected DeveloperService $developerService;

    protected LogService $logService;

    public function __construct(
        HttpService $httpService,
        DeveloperService $developerService,
        LogService $logService,
    ) {
        $this->httpService = $httpService;
        $this->developerService = $developerService;
        $this->logService = $logService;
    }
}
