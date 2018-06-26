<?php 

session_start();
include '../content/bdd.php';

$verifycars = $bdd->query('SELECT COUNT(*) as total FROM voiture');
$fetchverifycars = $verifycars->fetch();
$total = $fetchverifycars['total'];

$sql = $bdd->prepare('UPDATE users SET cars = '.$total.' WHERE id = '.$_SESSION['id'].'');
$sql -> execute();

?>