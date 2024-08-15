<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;
use App\Services\CurrencyRateService;

class ExchangeRateController extends Controller
{
    public function index()
    {
        $rates = ExchangeRate::all();

        return view('welcome', compact('rates'));
    }
}
