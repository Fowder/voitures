<?php 

include '../content/head.php';

?>
<body>
    <div class="uk-container">

        <?php 
        if(isset($_GET['id'])){
        $searchid = $bdd->query('SELECT voiture.annee, voiture.puissance, voiture.poids, voiture.image, voiture.vitesse_max, voiture.acceleration, voiture.consommation, voiture.co2, type.classe, voiture.id, marque.nom, voiture.modele FROM voiture, marque, type WHERE marque.id_marque = voiture.marque AND type.id_type = voiture.type AND voiture.id = '.$_GET['id'].'');
        $fetchid = $searchid->fetch();
        }
        if(isset($_GET['id'])){
            echo '<h1 class="uk-text-center">Modifier la '.$fetchid['nom'].' '.$fetchid['modele'].'</h1>';
        }else{
            echo '<h1 class="uk-text-center">Ajouter une voiture</h1>';
        }
        ?>

        <form class="uk-form-horizontal uk-margin-large" action="validationajoutvoiture.php" method="post">
            <div class="uk-margin">
                <label class="uk-form-label" for="marque-select">Marque</label>
                <div class="uk-form-controls">
                    <select class="uk-select" name="marque" id="marque-select">
                        <?php 
                        if(isset($_GET['id'])){
                            $sqlmarque = $bdd->query('SELECT id_marque FROM marque, voiture WHERE voiture.marque = marque.id_marque AND voiture.id = '.$fetchid['id'].'');
                            $fetchmarque = $sqlmarque->fetch();
                        }else{
                            echo '<option value="none">Choisir une marque</option>';
                        }

                        if(isset($_GET['id']) && $fetchid['id'] == $_GET['id']){
                            echo '<option value="'.$fetchmarque['id_marque'].'">'.$fetchid['nom'].'</option>';
                        }

                        $sql = $bdd->query('SELECT * FROM marque ORDER BY nom');

                        while($voiture = $sql->fetch()){
                            if($fetchid['nom'] != $voiture['nom']){
                                echo '<option value="'.$voiture['id_marque'].'">'.$voiture['nom'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <?php
            if(isset($_GET['id'])){
                
            }else{
                echo '
                <div class="uk-margin">
                    <label class="uk-form-label" for="input-disabled">Ajouter une marque</label>
                    <div class="uk-form-controls">
                        <input name="addmarque" class="uk-input" id="input-disabled" type="text" placeholder="Compléter seulement si la marque n\'est pas dans la liste ci-dessus">
                    </div>
                </div>
                ';
            }
            ?>

            <div class="uk-margin">
                <label class="uk-form-label" for="modele">Modèle</label>
                <div class="uk-form-controls">
                    <input name="modele" <?php if(isset($_GET['id'])){echo 'value="'.$fetchid['modele'].'"';} ?> class="uk-input" id="modele" type="text" placeholder="Modèle précis de la voiture">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="annee">Année</label>
                <div class="uk-form-controls">
                    <input name="annee" <?php if(isset($_GET['id'])){echo 'value="'.$fetchid['annee'].'"';} ?> class="uk-input" id="annee" type="number" placeholder="Année de la voiture">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="puissance">Puissance</label>
                <div class="uk-form-controls">
                    <input name="puissance" <?php if(isset($_GET['id'])){echo 'value="'.$fetchid['puissance'].'"';} ?> class="uk-input" id="puissance" type="number" placeholder="Puissance en chevaux">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="Poids">Poids</label>
                <div class="uk-form-controls">
                    <input name="poids" <?php if(isset($_GET['id'])){echo 'value="'.$fetchid['poids'].'"';} ?> class="uk-input" id="Poids" type="number" placeholder="Poids de la voiture">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="Image">Image</label>
                <div class="uk-form-controls">
                    <input name="image" <?php if(isset($_GET['id'])){echo 'value="'.$fetchid['image'].'"';} ?> class="uk-input" id="Image" type="text" placeholder="Nom de l'image">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="Vitesse Max">Vitesse Max</label>
                <div class="uk-form-controls">
                    <input name="vitesse_max" <?php if(isset($_GET['id'])){echo 'value="'.$fetchid['vitesse_max'].'"';} ?> class="uk-input" id="Vitesse Max" type="number" placeholder="Vitesse maximale de la voiture">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="Acceleration">Acceleration</label>
                <div class="uk-form-controls">
                    <input name="acceleration" <?php if(isset($_GET['id'])){echo 'value="'.$fetchid['acceleration'].'"';} ?> class="uk-input" id="Acceleration" type="number" step="0.1" placeholder="Acceleration de 0 à 100 km/h">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="Consommation">Consommation</label>
                <div class="uk-form-controls">
                    <input name="consommation" <?php if(isset($_GET['id'])){echo 'value="'.$fetchid['consommation'].'"';} ?> class="uk-input" id="Consommation" type="number" step="0.1" placeholder="Consommation (l/100km)">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="CO²">CO²</label>
                <div class="uk-form-controls">
                    <input name="co2" <?php if(isset($_GET['id'])){echo 'value="'.$fetchid['co2'].'"';} ?> class="uk-input" id="CO²" type="number" placeholder="CO² (g/km)">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-select">Type</label>
                <div class="uk-form-controls">
                    <select name="type" class="uk-select" id="form-horizontal-select">
                        <?php 
                        if(isset($_GET['id'])){
                            $sqltype = $bdd->query('SELECT id_type FROM type, voiture WHERE voiture.type = type.id_type AND voiture.id = '.$fetchid['id'].'');
                            $fetchtype = $sqltype->fetch();
                        }else{
                            echo '<option value="none">Choisir une type</option>';
                        }

                        if(isset($_GET['id']) && $fetchid['id'] == $_GET['id']){
                            echo '<option value="'.$fetchtype['id_type'].'">'.$fetchid['nom'].'</option>';
                        }

                        $sql = $bdd->query('SELECT * FROM type ORDER BY classe');

                        while($voiture = $sql->fetch()){
                            if($fetchid['nom'] != $voiture['classe']){
                                echo '<option value="'.$voiture['id_type'].'">'.$voiture['classe'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <center>
                <button <?php if(isset($_GET['id'])){echo 'name="modifier" value="'.$fetchid['id'].'"';}else{echo 'name="ajouter"';} ?>class="uk-button uk-button-primary valider" type="submit">Valider</button>
            </center>

        </form>
    </div>
    
<?php include '../content/script.php'; ?>
</body>