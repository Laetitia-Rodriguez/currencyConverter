<?php

namespace Convertisseur\Models;

class Rate {

        // Method to use the API endpoint to convert a currency to another one
        // https://docs.openexchangerates.org/docs/convert
         public static function convertAmount() {
            $amount = $_POST['amount'];
            $from = $_POST['currency-from'];
            $to = $_POST['currency-to'];
            // Free API openexchangerates.org ; endpoint for converting an amount
            $result = file_get_contents(`https://api.exchangerate.host/convert?from=$from&to=$to`);
            $convertedAmount = json_decode($result);
            return $convertedAmount;
            var_dump($convertedAmount);
        }
}

    