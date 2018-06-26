<?php 
session_start();

include '../content/bdd.php';

$sql = $bdd->prepare('DELETE FROM favoris WHERE id_user = '.$_SESSION['id'].' AND id_voiture = '.$_GET['id'].'');
$sql->execute();

header('location:/voitures/index.php');