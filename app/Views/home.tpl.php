<form id="form" action="result.php" method="POST">
    <fieldset class="fielset">
        <label class="form__label">Montant</label>
        <input name="amount">
    </fieldset>
    <fieldset class="fielset">
        <label class="form__label" for="currency-from">De</label>
        <select name="currency-from" id="currency-from">
            <option value="#">
                #
            </option>
        </select>
    </fieldset>
    <fieldset class="fielset">
        <label class="form__label" for="currency-to">vers</label>
        <select name="currency-to" id="currency-to">
            <option value="##">
               ##
            </option>
        </select>
    </fieldset>
    <input type="submit" value="convertir">
</form>