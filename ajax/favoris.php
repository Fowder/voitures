<?php 
session_start();

include '../content/bdd.php';

$verif = $bdd->query('SELECT * FROM favoris WHERE id_voiture = '.$_GET['id'].' AND id_user = '.$_SESSION['id'].'');
$verifsql = $verif->fetch();

if($verifsql){

}else{
    $sql = $bdd->prepare('INSERT INTO favoris(id_voiture, id_user) VALUES (:voiture, :user)');
    $sql->execute(array(':voiture' => $_GET['id'], ':user' => $_SESSION['id']));
}

header('location:/voitures/index.php');