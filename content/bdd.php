<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=voiture;charset=utf8', 'root', 'simplonco');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>