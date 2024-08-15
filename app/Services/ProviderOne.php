<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ProviderOne implements ExchangesProviderInterface
{
    public function getRates(): array
    {
        $response = Http::get('https://run.mocky.io/v3/cde25982-a259-47d2-90d8-978f1216134c');
        return $this->transformResponse($response->json());
    }

    private function transformResponse(array $data): array
    {
        $rates = [];

        foreach ($data as $currencyData) {
            switch ($currencyData['shortCode']) {
                case 'EUR':
                    $rates['EUR'] = $currencyData['price'];
                    break;
                case 'USD':
                    $rates['USD'] = $currencyData['price'];
                    break;
                case 'GBP':
                    $rates['GBP'] = $currencyData['price'];
                    break;
            }
        }

        return $rates;
    }
}
