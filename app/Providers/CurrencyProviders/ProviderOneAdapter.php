<?php

namespace App\Providers\CurrencyProviders;

use App\Providers\CurrencyProviderInterface;
use Illuminate\Support\Facades\Http;

class ProviderOneAdapter implements CurrencyProviderInterface
{
    protected $url;

    public function __construct()
    {
        $this->url = 'https://run.mocky.io/v3/cde25982-a259-47d2-90d8-978f1216134c';
    }

    public function fetchRates(): array
    {
        $response = Http::get($this->url);
        $data = $response->json();

        return $this->transformResponse($data);
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
