<?php 

include '../content/bdd.php';

$sql = $bdd->query('SELECT nom FROM marque WHERE nom LIKE "'.$_GET['marque'].'%"');

while($car = $sql->fetch()){
    $voiture = $car['nom'];
    echo $voiture.',';
}