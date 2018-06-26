<?php 
include 'content/head.php';
?>
<div class="uk-container">
    <h1 class="uk-heading-primary uk-text-center">
        Dernière voiture ajoutée
    </h1>
    <?php 

        $sql = $bdd->query('SELECT voiture.vitesse_max, voiture.puissance, voiture.annee, voiture.id, voiture.image, voiture.modele, marque.nom, voiture.modif FROM voiture, marque WHERE marque.id_marque = voiture.marque ORDER BY modif DESC LIMIT 1');
        $afficher = $sql->fetch();

    ?>
    <div class="uk-card uk-card-secondary uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
        <div class="uk-card-media-left uk-cover-container">
            <img src="/voitures/img/<?php echo $afficher['image']; ?>" alt="" uk-cover>
            <canvas width="600" height="400"></canvas>
        </div>
        <div>
            <div class="uk-card-body">
                <h3 class="uk-card-title"><?php echo $afficher['nom'].' '.$afficher['modele']; ?></h3>
                <h5>Année : <?php echo $afficher['annee']; ?></h5>
                <h5>Puissance : <?php echo $afficher['puissance']; ?> chevaux</h5>
                <h5>Vitesse maximale : <?php echo $afficher['vitesse_max']; ?>km/h</h5>
                <a href="/voitures/CRUD/voirvoiture.php?id=<?php echo $afficher['id']; ?>" class="uk-position-bottom-right uk-button uk-button-default">Voir ses infos</a>
            </div>
        </div>
    </div>
</div>
<?php
include 'content/script.php';
?>