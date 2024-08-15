<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;

class ExchangeRateController extends Controller
{
    public function index()
    {
        $rates = ExchangeRate::all();
        $cheapestRates = $rates->sortBy('rate');

        return view('welcome', ['rates' => $rates, 'cheapestRates' => $cheapestRates]);
    }
}
