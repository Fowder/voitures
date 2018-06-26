<?php 

session_start();

include '../content/bdd.php';

$sql = $bdd->query('DELETE FROM favoris WHERE id_user = '.$_SESSION['id'].'');

header('location:viewfavoris.php');

?>