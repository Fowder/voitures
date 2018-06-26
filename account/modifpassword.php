<?php 
include '../content/head.php';
?>

<div class="uk-container">
    <form method="post" action="confirmmodifpassword.php">
        <fieldset class="uk-fieldset">
            <legend class="uk-legend uk-text-center">Modifier mot de passe</legend>
            <div class="uk-margin">
                <input class="uk-input" name="actualpassword" type="password" placeholder="Ancien mot de passe">
            </div>
            <div class="uk-margin">
                <input class="uk-input" name="newpassword" type="password" placeholder="Nouveau mot de passe">
            </div>
            <div class="uk-margin">
                <input class="uk-input" name="confirmnewpassword" type="password" placeholder="Confirmer nouveau mot de passe">
            </div>
            <div class="uk-margin">
                <button type="submit" class="uk-button uk-button-primary">Confirmer</button>
            </div>
        </fieldset>
    </form>
</div>

<?php
include '../content/script.php';
?>