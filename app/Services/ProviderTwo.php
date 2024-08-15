<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ProviderTwo implements ExchangesProviderInterface
{
    public function getRates(): array
    {
        $response = Http::get('https://run.mocky.io/v3/9073c9e5-b8ef-41d9-a6b3-21dc32d28be0');
        return $this->transformResponse($response->json());
    }

    private function transformResponse(array $data): array
    {
        $rates = [];

        foreach ($data as $currencyData) {
            switch ($currencyData['shrtCode']) {
                case 'EUR':
                    $rates['EUR'] = $currencyData['amount'];
                    break;
                case 'USD':
                    $rates['USD'] = $currencyData['amount'];
                    break;
                case 'GBP':
                    $rates['GBP'] = $currencyData['amount'];
                    break;
            }
        }

        return $rates;
    }
}
