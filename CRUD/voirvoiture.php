<?php 

include '../content/head.php';

$sql = $bdd->query('SELECT voiture.id, voiture.annee, voiture.co2, voiture.consommation, voiture.modele, voiture.poids, voiture.vitesse_max, voiture.acceleration, marque.nom, type.classe, voiture.puissance, voiture.image FROM voiture, marque, type WHERE voiture.marque = marque.id_marque AND voiture.type = type.id_type AND voiture.id = '.$_GET['id'].'');

$car = $sql->fetch();
if(isset($_SESSION['id'])){
$favoris = $bdd->query('SELECT * FROM favoris, users, voiture WHERE voiture.id = favoris.id_voiture AND users.id = favoris.id_user AND favoris.id_user = "'.$_SESSION['id'].'" AND voiture.id = '.$car['id'].'');
$verifavoris = $favoris->fetch();
}

echo '
    <h1 class="uk-text-center">
        '.$car['nom'].' '.$car['modele'].' ';
        if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
            echo '
            <div id="delete" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                    <form action="/voitures/CRUD/delete.php" method="post">
                        <h2 class="uk-modal-title">Voulez-vous vraiment supprimer la '.$car['nom'].' '.$car['modele'].' ?</h2>
                        <button class="uk-modal-close uk-button uk-button-primary" type="button">Non</button>
                        <button name="delete" value="'.$car['id'].'" class="uk-button uk-button-danger">Oui</button>
                    </form>
                </div>
            </div>
            <a uk-tooltip="title: Modifier" href="/voitures/CRUD/ajoutervoiture.php?id='.$car['id'].'" uk-icon="icon: pencil"></a>
            <a uk-tooltip="title: Supprimer" uk-toggle="target: #delete" type="button" uk-icon="icon: trash"></a>
            ';
        }
        if(isset($_SESSION['pseudo'])){
            if($verifavoris){
                echo '<a value="'.$car['id'].'" id="heart" class="red" heart="yes" uk-icon="icon: heart"></a>';
            }else{
                echo '<a value="'.$car['id'].'" id="heart" class="white" heart="no" uk-icon="icon: heart"></a>';
            }
        }
        echo '
    </h1>
    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
        <div class="uk-card-media-left uk-cover-container">
            <img src="/voitures/img/'.$car['image'].'" alt="" uk-cover>
            <canvas width="600" height="400"></canvas>
        </div>
        <div>
            <div class="uk-card-body">
                <ul class="uk-subnav uk-subnav-pill" uk-switcher>
                    <li><a href="#">Caractéristiques</a></li>
                    <li><a href="#">Consommation</a></li>
                    <li><a href="#">Type</a></li>
                </ul>
                <ul class="uk-switcher uk-margin">
                    <li class="infos">
                        <p>Année de lancement : '.$car['annee'].'</p>
                        <p>Puissance : '.$car['puissance'].' chevaux</p>
                        <p>Poids : '.$car['poids'].'kg</p>
                        <p>Vitesse maximale : '.$car['vitesse_max'].'km/h</p>
                        <p>0 à 100km/h : '.$car['acceleration'].' secondes</p>
                    </li>
                    <li class="infos">
                        <p>Consommation : '.$car['consommation'].'l/100</p>
                        <p>CO² : '.$car['co2'].'g/km</p>
                        <p>Classe : ';
                        if($car['consommation'] <= 4.2){
                            echo 'A';
                        }else if($car['consommation'] <= 5.5){
                            echo 'B';
                        }else if($car['consommation'] <= 6.7){
                            echo 'C';
                        }else if($car['consommation'] <= 8){
                            echo 'D';
                        }else if($car['consommation'] <= 9.3){
                            echo 'E';
                        }else if($car['consommation'] <= 10.5){
                            echo 'F';
                        }else if($car['consommation'] > 10.5){
                            echo 'G';
                        }
                        echo '</p>
                        <p>Rapport poids/puissance : '.round($car['puissance']/$car['poids'], 2).' chevaux par kilo</p>
                    </li>
                    <li class="infos">
                        <p>Type : '.$car['classe'].'</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
';

include '../content/script.php';

?>