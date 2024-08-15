<?php

namespace App\Providers\CurrencyProviders;

use App\Providers\CurrencyProviderInterface;
use Illuminate\Support\Facades\Http;

class ProviderTwoAdapter implements CurrencyProviderInterface
{
    protected $url;

    public function __construct()
    {
        $this->url = 'https://run.mocky.io/v3/9073c9e5-b8ef-41d9-a6b3-21dc32d28be0';
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
