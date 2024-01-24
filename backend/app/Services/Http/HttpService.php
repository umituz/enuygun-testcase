<?php

namespace App\Services\Http;

use App\Services\Log\LogService;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

/**
 * Class HttpService
 */
class HttpService
{
    private LogService $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    public function get($url)
    {
        return Http::timeout(10)->get($url);
    }

    public function getResult($url)
    {
        try {
            $response = $this->get($url);

            if ($response->successful()) {
                $this->logService->logInfo(__('HTTP Request is successful'));

                return json_decode($response->body(), true);
            }

            return null;
        } catch (RequestException $exception) {
            $this->logService->logError($exception);

            return null;
        }
    }
}
