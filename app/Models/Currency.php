<?php

namespace Convertisseur\Models;

class Currency {

    private $base;
    private $rates;

    // method to get all the currencies from the API
    public static function findAll() {

        $results = file_get_contents('https://openexchangerates.org/api/currencies.json');
        $currencies = json_decode($results, true);
        $base = $results['base'];
        $rates = $results['rates'];

        var_dump($currencies);

    }
}