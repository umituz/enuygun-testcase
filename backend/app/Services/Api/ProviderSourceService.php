<?php

namespace App\Services\Api;

use Exception;

class ProviderSourceService extends BaseApiService implements ApiServiceInterface
{
    public function getData($provider)
    {
        try {
            $url = $provider->url;
            $response = $this->httpService->getResult($url);

            if (! $response) {
                $this->logService->logInfo(__('No data received from the API'));

                return false;
            }

            $items = $response['developers'];

            if (empty($items)) {
                $this->logService->logInfo(__('No data available in the API response'));

                return false;
            }

            $this->developerService->saveWithTasks($items);

            $this->logService->logInfo(__('API data inserted successfully for : '.$provider->name));

            return true;
        } catch (Exception $exception) {
            $this->logService->logError($exception);

            return false;
        }
    }
}
