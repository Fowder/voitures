<?php 

include '../content/bdd.php';

$sql = $bdd->query('SELECT * FROM users WHERE pseudo = "'.$_POST['pseudo'].'"');

$verif = $sql->fetch();

if($verif['password'] == $_POST['password']){
    session_start();
    $_SESSION['id'] = $verif['id'];
    $_SESSION['pseudo'] = $verif['pseudo'];
    $_SESSION['admin'] = $verif['admin'];
    header('location:/voitures/index.php');
}else{
    echo 'Ce compte n\'a pu être trouvé.';
    die;
}