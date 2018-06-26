<?php 

include '../content/bdd.php';

$sql = $bdd->prepare('DELETE FROM voiture WHERE id = '.$_POST['delete'].'');
$sql->execute();

header('location:/voitures/index.php');