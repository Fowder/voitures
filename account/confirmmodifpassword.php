<?php 
session_start();

include '../content/bdd.php';

$verifpassword = $bdd->query('SELECT * FROM users WHERE id = '.$_SESSION['id'].'');

$fetchverifpassword = $verifpassword->fetch();

if($_POST['newpassword'] == $_POST['confirmnewpassword']){
    if($fetchverifpassword['password'] == $_POST['actualpassword']){
        $changepassword = $bdd->prepare('UPDATE users SET `password` = "'.$_POST['newpassword'].'" WHERE id = '.$_SESSION['id'].'');
        $changepassword->execute();
        session_destroy();
        header('location:/voitures/index.php');
    }else{
        echo 'Votre ancien mot de passe ne correspond pas. Veuillez réessayer.';
    }
}else{
    echo 'Vos 2 nouveaux mots de passe ne correspondent pas. Veuillez réessayer.';
}

?>