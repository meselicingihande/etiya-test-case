<?php

namespace App\Providers\CurrencyProviders;

use App\Providers\CurrencyProviderInterface;
use Illuminate\Support\Facades\Http;

class ProviderOneAdapter implements CurrencyProviderInterface
{
    protected $url;

    public function __construct(string $url)
    {
        $this->url = $url;
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
