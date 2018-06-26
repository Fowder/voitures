<?php 
include '../content/head.php';
?>

<body>
<div class="uk-container">
    <h1 class="uk-heading-primary uk-text-center">
        Liste des <?php echo $_POST['marque']; ?>
        <?php
        if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
        echo '  <a href="/voitures/CRUD/ajoutervoiture.php">
                    <button class="uk-button uk-button-primary">Ajouter une voiture</button>
                </a>';
        }
        ?>
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
$voitures = $bdd->query('SELECT voiture.id, voiture.image, marque.nom, voiture.modele, voiture.annee FROM voiture, marque WHERE marque.id_marque = voiture.marque AND marque.nom = "'.$_POST['marque'].'" ORDER BY marque.nom');

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

<?php

include '../content/script.php';

?>
</body>