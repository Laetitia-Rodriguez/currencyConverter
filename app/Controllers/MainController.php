<?php

namespace Convertisseur\Controllers;

use Convertisseur\Models\Currency;
use Convertisseur\Models\Rate;

class MainController {

    //function to show the homepage
    public function home() {
        // All the currencies from the API to display it in the two select balises
        $currencies = Currency::findAllCurrencies();

        // Converted amount returned by the API, when I give the currencies "from" and "to"
       // $convertedAmount = Rate::convertAmount();
        
        $this->show('home', ['currencies' => $currencies]);
    }

    // function to show the views
    private function show($viewName, $viewVars=[]) {
        // Fixed part of the URL
        // BASE_URI is determined in .htaccess
        // We can now use $baseUrl in all the views
        $baseUrl = $_SERVER['BASE_URI'];
        // templates header and footer and page which is in parameter
        include(__DIR__.'/../Views/inc/header.tpl.php');
        include(__DIR__.'/../Views/' . $viewName . '.tpl.php');
        include(__DIR__.'/../Views/inc/footer.tpl.php');
    }
}