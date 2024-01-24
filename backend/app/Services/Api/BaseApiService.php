<?php

namespace App\Services\Api;

use App\Adapters\Log\FileLoggerAdapter;
use App\Adapters\Log\LoggerAdapter;
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

        $loggerAdapter = new LoggerAdapter();
        //$fileLoggerAdapter = new FileLoggerAdapter(public_path('log.txt'));
        $this->setLoggerAdapter($loggerAdapter);
    }
}
