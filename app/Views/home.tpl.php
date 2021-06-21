<?php
session_start();
/*
Call to the free API exchangerate-api.com for getting all the currencies
*/

// It works with a free key they gave me when subscribe = f695dcb28e35ed5560d70040 ;
// Endpoint for getting the currencies
$responseCurrencies = file_get_contents('https://v6.exchangerate-api.com/v6/f695dcb28e35ed5560d70040/codes');
$resultsCurrencies = json_decode($responseCurrencies, true);
// print_r($resultsCurrencies);

/*
Call to the API for converting an amount
*/
if (!empty($_POST['amount']) && !empty($_POST['currencyFrom']) && !empty($_POST['currencyTo'])) {
    // I get the $_POST datas from the form

    $amount = $_POST['amount'];
    $from = $_POST['currencyFrom'];
    $to = $_POST['currencyTo'];
    
    // Endpoint's free API exchangerate to convert an amount
    $responseConvertedAmount = file_get_contents('https://v6.exchangerate-api.com/v6/f695dcb28e35ed5560d70040/pair/' . $from . '/' . $to . '/' . $amount);
    $resultConvertedAmount = json_decode($responseConvertedAmount, true);
    // print_r($resultConvertedAmount['conversion_result']);
    // print_r($resultConvertedAmount);
    // return $resultConvertedAmount;
    $datas = [$_POST['amount'], $_POST['currencyFrom'], $_POST['currencyTo'], $resultConvertedAmount['conversion_result']];
    // print_r($datas);
    function post_redirect($baseUrl, $resultConvertedAmount)
    {
        $_SESSION['post_data'] = [$_POST, $resultConvertedAmount['conversion_result']];
        header("Location: " . $baseUrl);
    }
    // print_r($_SESSION['post_data']);
    
    post_redirect($baseUrl, $resultConvertedAmount);
    exit;
}

else {
?>
    <form id="form" action="" method="POST">
        <fieldset class="fieldset">
            <label class="form__label" for="amount">Montant</label>
            <input id="form__input" name="amount">
        </fieldset>
        <fieldset class="fieldset">
            <label class="form__label" for="currency-from">De</label>
            <select name="currencyFrom" id="currency-from">
                <option>-- Choisissez une devise --</option> 
                <?php 
                    
                    for ($i=0 ; $i<count($resultsCurrencies['supported_codes']) ; $i++) {
                        echo "<option value=" . $resultsCurrencies['supported_codes'][$i][0] . ">" . $resultsCurrencies['supported_codes'][$i][1] .
                        "</option>";
                    }
                    ?>
                    
            </select>
        </fieldset>
        <fieldset class="fieldset">
            <label class="form__label" for="currency-to">vers</label>
            <select name="currencyTo" id="currency-to"> 
            <option>-- Choisissez une devise --</option> 
                <?php 
                    for ($i=0 ; $i<count($resultsCurrencies['supported_codes']) ; $i++) {
                        echo "<option value=" . $resultsCurrencies['supported_codes'][$i][0] . ">" . $resultsCurrencies['supported_codes'][$i][1] .
                        "</option>";
                    } ?>
            </select>
        </fieldset>
        <input type="submit" value="convertir">
    </form>
    <!-- It displays only after submit form -->
    <?php
    if (!empty($_SESSION['post_data'][1])) {
        echo"<p>Le résultat de la conversion est : " . ($_SESSION['post_data'][1]) . "</p>";
    }
    
    //print_r($_SESSION['post_data']);
}

