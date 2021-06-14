<?php

namespace Convertisseur\Models;

class Currency {

    // method to get all the currencies from the API
    public static function findAllCurrencies() {

        if (isset($_GET['currency-from'])) {
            // Free API currencyconverterapi.com ; endpoint for getting the currencies
            // With a free key they gave me when subscribe = ca47dea9c336ac0f5aa7 ;
            $results = file_get_contents('https://free.currconv.com/api/v7/currencies?apiKey=ca47dea9c336ac0f5aa7');
            $currencies = json_decode($results, true);
            var_dump($currencies);
            return $currencies;
        }
    }
}