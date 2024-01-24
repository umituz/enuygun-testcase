<?php

namespace App\Services\Http;

use App\Adapters\Log\LoggerAdapter;
use App\Traits\Logger;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

/**
 * Class HttpService
 */
class HttpService
{
    use Logger;

    public function __construct()
    {
        $loggerAdapter = new LoggerAdapter();
        //$fileLoggerAdapter = new FileLoggerAdapter(public_path('log.txt'));
        $this->setLoggerAdapter($loggerAdapter);
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
                return json_decode($response->body(), true);
            }

            return null;
        } catch (RequestException $exception) {
            $this->logError($exception);

            return null;
        }
    }
}
