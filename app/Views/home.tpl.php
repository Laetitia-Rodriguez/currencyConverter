<?php

//viewVars from MainController
$currencies = $viewVars['currencies'];
var_dump($currencies);
//$convertedAmount = $viewVars['convertedAmount'];
//var_dump($convertedAmount);
?>

<form id="form" action="./Rate.php" method="get">
    <fieldset class="fieldset">
        <label class="form__label" for="amount">Montant</label>
       
        <input id="form__input" name="amount">
    </fieldset>
    <fieldset class="fieldset">
        <label class="form__label" for="currency-from">De</label>
        <select name="currency-from" id="currency-from">
            <option>-- Choisissez la devise à convertir --</option>
            <?php foreach ($currencies as $currency) :?>
                <option value="<?= $currency ?>">
                    <?= $currency['currencyName'] ?>
                </option>
            <?php endforeach ?>
        </select>
    </fieldset>
    <fieldset class="fieldset">
        <label class="form__label" for="currency-to">vers</label>
        <select name="currency-to" id="currency-to">
            <option>-- Choisissez la devise à obtenir --</option>
            <?php foreach ($currencies as $currency) :?>
                <option value="<?= $currency ?>">
                    <?= $currency ?>
                </option>
            <?php endforeach ?>
    </fieldset>
    <input type="submit" value="convertir">
    <!-- <p name="converted-amount"><?= $convertedAmount ?></p>  -->
</form>
