<?php 

include '../content/head.php';

if(isset($_SESSION['pseudo'])){
$sql = $bdd->query('SELECT pseudo, email FROM users WHERE pseudo = "'.$_SESSION['pseudo'].'"');

$info = $sql->fetch();

$favoris = $bdd->query('SELECT marque.nom, voiture.id, voiture.image, voiture.modele, voiture.annee FROM voiture, users, marque, favoris WHERE marque.id_marque = voiture.marque AND favoris.id_user = users.id AND voiture.id = favoris.id_voiture AND favoris.id_user = '.$_SESSION['id'].' ORDER BY date DESC LIMIT 3');
$veriffavoris = $bdd->query('SELECT * FROM favoris WHERE id_user = '.$_SESSION['id'].'');

echo '
<div class="uk-container">
    ';
    if($_SESSION['admin'] == 1){
        echo '<h1>Vous êtes Admin !</h1>';
    }
    echo '
    <p class="white-text">Pseudo : '.$info['pseudo'].' <a href="/voitures/account/modifpassword.php">Modifier mon mot de passe</a></p>
    <p class="white-text">Email : '.$info['email'].'</p>
    <a href="viewfavoris.php" class="uk-button uk-button-primary margin">Voir mes favoris</a>
    ';
    if($veriffavoris->fetch()){
        echo '<h2 class="uk-text-center">3 derniers favoris ajoutés</h2>';
    }
    echo '
    <div class="uk-child-width-expand@s uk-text-center" uk-grid>
        ';
        while($car = $favoris->fetch()){
            echo '
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <p>'.$car['nom'].' '.$car['modele'].'</p>
                    <a href="/voitures/CRUD/voirvoiture.php?id='.$car['id'].'" class="uk-button uk-button-primary">Voir</a>
                </div>
            </div>
            ';
        }
    echo '
    </div>
</div>
';
}

include '../content/script.php';