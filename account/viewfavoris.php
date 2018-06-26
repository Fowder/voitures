<?php 
include '../content/head.php';
?>

<body>
<div class="uk-container">
    <h1 class="uk-heading-primary uk-text-center">
        Liste des favoris <?php echo '<a class="uk-button uk-button-primary" href="#confirm-delete-fav" uk-toggle>Vider les favoris</a>'; ?>
    </h1>
    <table class="uk-table uk-table-divider">
        <caption></caption>
        <thead>
            <tr>
                <th class="uk-text-center">Marque</th>
                <th class="uk-text-center">Modèle</th>
                <th class="uk-text-center">Année</th>
                <th class="uk-text-center">Plus</th>
            </tr>
        </thead>
        <tbody>
<?php 
$voitures = $bdd->query('SELECT marque.nom, voiture.id, voiture.image, voiture.modele, voiture.annee FROM voiture, users, marque, favoris WHERE marque.id_marque = voiture.marque AND favoris.id_user = users.id AND voiture.id = favoris.id_voiture AND favoris.id_user = '.$_SESSION['id'].'');

while($voiture = $voitures->fetch()){
    echo '  <tr>
                <td class="uk-text-center">'.$voiture['nom'].'</td>
                <td class="uk-text-center" uk-tooltip="title:<img src=\'/voitures/img/'.$voiture['image'].'\'/>; pos: bottom">'.$voiture['modele'].'</td>
                <td class="uk-text-center">'.$voiture['annee'].'</td>
                <td class="uk-text-center"><a href="/voitures/CRUD/voirvoiture.php?id='.$voiture['id'].'">Voir plus</a></td>
            </tr>';
}
?> 
        </tbody>
    </table>
</div>
<div id="confirm-delete-fav" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Êtes-vous sûr de vouloir supprimer tous vos favoris ?</h2>
        <button class="uk-button uk-button-primary uk-modal-close" type="button">Non</button>
        <a href="/voitures/account/viderfavoris.php" class="uk-button uk-button-danger" type="button">Oui</a>
    </div>
</div>

<?php

include '../content/script.php';

?>
</body>