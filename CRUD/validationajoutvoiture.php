<?php 

include '../content/head.php';

if($_POST['marque'] == 'none'){
    $verif = $bdd->query('SELECT * FROM marque WHERE nom = "'.$_POST['addmarque'].'"');
    if($verif->fetch()){
        echo 'Marque déjà ajoutée';
        include '../content/script.php';
        die;
    }else{
            $sql = $bdd->prepare('INSERT INTO marque(nom) VALUES (:marque)');
            $sql->execute(array(':marque' => $_POST['addmarque']));
            $search = $bdd->query('SELECT * FROM marque WHERE nom = "'.$_POST['addmarque'].'"');
            $fetch = $search->fetch();
            $marque = $fetch['id_marque'];
            $add = $bdd->prepare('INSERT INTO voiture(annee, modele, puissance, poids, image, vitesse_max, acceleration, consommation, co2, marque, type) VALUES (:annee, :modele, :puissance, :poids, :image, :vitesse_max, :acceleration, :consommation, :co2, :marque, :type)');
            $add->execute(array(':modele' => $_POST['modele'], ':puissance' => $_POST['puissance'], ':poids' => $_POST['poids'], ':image' => $_POST['image'], ':vitesse_max' => $_POST['vitesse_max'], 'acceleration' => $_POST['acceleration'], 'consommation' => $_POST['consommation'], ':co2' => $_POST['co2'], ':marque' => $marque, ':type' => $_POST['type'], ':annee' => $_POST['annee']));
    }
}else{
    if(isset($_POST['ajouter'])){
        $add = $bdd->prepare('INSERT INTO voiture(annee, modele, puissance, poids, image, vitesse_max, acceleration, consommation, co2, marque, type) VALUES (:annee, :modele, :puissance, :poids, :image, :vitesse_max, :acceleration, :consommation, :co2, :marque, :type)');
        $add->execute(array(':modele' => $_POST['modele'], ':puissance' => $_POST['puissance'], ':poids' => $_POST['poids'], ':image' => $_POST['image'], ':vitesse_max' => $_POST['vitesse_max'], 'acceleration' => $_POST['acceleration'], 'consommation' => $_POST['consommation'], ':co2' => $_POST['co2'], ':marque' => $_POST['marque'], ':type' => $_POST['type'], ':annee' => $_POST['annee']));    
    }else if(isset($_POST['modifier'])){
        $modifier = $bdd->prepare('UPDATE voiture SET annee = '.$_POST['annee'].', modele = "'.$_POST['modele'].'", puissance = '.$_POST['puissance'].', poids = '.$_POST['poids'].', image = "'.$_POST['image'].'", vitesse_max = '.$_POST['vitesse_max'].', acceleration = '.$_POST['acceleration'].', consommation = '.$_POST['consommation'].', co2 = '.$_POST['co2'].', marque = '.$_POST['marque'].', type = '.$_POST['type'].' WHERE id = '.$_POST['modifier'].'');
        $modifier->execute(); 
    }
}

header('location:../index.php');