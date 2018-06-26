<?php 
include 'content/head.php';
?>

<body>
<div class="uk-container">
    <h1 class="uk-heading-primary uk-text-center">
        Liste des voitures
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
                <form action="" method="post">
                    <th class="uk-text-center">Marque<button name="tri" value="nom" type="submit" uk-icon="triangle-up"></button></th>
                    <th class="uk-text-center">Modèle<button name="tri" value="modele" type="submit" uk-icon="triangle-up"></button></th>
                    <th class="uk-text-center">Année<button name="tri" value="annee" type="submit" uk-icon="triangle-up"></button></th>
                    <th class="uk-text-center">Plus</th>
                </form>
            </tr>
        </thead>
        <tbody>
<?php 
$query = 'SELECT voiture.id, voiture.image, marque.nom, voiture.modele, voiture.annee FROM voiture, marque WHERE marque.id_marque = voiture.marque';
if(isset($_POST['tri'])){
    $tri = $_POST['tri'];
    $query .= ' ORDER BY '.$tri;
}else{
    $query .= ' ORDER BY marque.nom';
}
$voitures = $bdd->query($query);

while($voiture = $voitures->fetch()){
    echo '  <tr>
                <td class="uk-text-center">'.$voiture['nom'].'</td>
                <td class="uk-text-center" uk-tooltip="title:<img src=\'img/'.$voiture['image'].'\'/>; pos: bottom">'.$voiture['modele'].'</td>
                <td class="uk-text-center">'.$voiture['annee'].'</td>
                <td class="uk-text-center"><a href="CRUD/voirvoiture.php?id='.$voiture['id'].'">Voir plus</a></td>
            </tr>';
}
?> 
        </tbody>
    </table>
</div>

<?php

include 'content/script.php';

?>
</body>