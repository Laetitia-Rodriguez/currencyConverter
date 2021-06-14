<?php

namespace Convertisseur\Models;

class Currency {

    private $base;
    private $rates;

    // method to get all the currencies from the API
    public static function findAllCurrencies() {

        // free API openexchangerates.org ; endpoint for getting the currencies
        $results = file_get_contents('https://openexchangerates.org/api/currencies.json');
        $currencies = json_decode($results, true);
        return $currencies;

        var_dump($currencies);

    }
}