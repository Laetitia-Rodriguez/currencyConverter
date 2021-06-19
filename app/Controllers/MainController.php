<?php

namespace Convertisseur\Controllers;

class MainController {
    
    //function to show the homepage
    public function home() {

       $this->show('home');
    }

    
    //function to show the homepage with amount converted
    public function convertAmount() {

        $this->show('home');
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
?>
