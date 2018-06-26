<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voitures</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.6/css/uikit.min.css" />
    <link rel="stylesheet" href="/voitures/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet"> 
    <?php 
    session_start();
    include 'bdd.php'; ?>
    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li class="uk-active"><a href="/voitures/index.php">Accueil</a></li>
                <li class="uk-active"><a id="add-cars" car="<?php echo $_SESSION['id']; ?>" href="#_">Liste des voitures
                        <?php
                            if(isset($_SESSION['pseudo'])){
                                $countcars = $bdd->query('SELECT COUNT(*) as total FROM voiture');
                                $fetchcountcars = $countcars->fetch();
                                $i = intval($fetchcountcars['total']);
                                $carsactual = $bdd->query('SELECT cars FROM users WHERE id = '.$_SESSION['id'].'');
                                $fetchcarsactual = $carsactual->fetch();
                                $cars = intval($fetchcarsactual['cars']);
                                if($i > $cars){
                                    echo '&nbsp;<span class="uk-label uk-label-warning">'.($i - $cars).'</span>';
                                }else{

                                }
                            }
                        ?>
                    </span>
                </a></li>
            </ul>
        </div>
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
            <?php
            if(isset($_SESSION['pseudo'])){
                echo'
                <div id="deconnexion" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <h2 class="uk-modal-title">Voulez-vous vraiment vous déconnecter ?</h2>
                        <a class="uk-modal-close uk-button uk-button-primary" type="button">Non</a>
                        <a href="/voitures/connexion/deconnexion.php" class="uk-button uk-button-danger">Oui</a>
                    </div>
                </div>
                <div class="uk-margin">
                    <form class="uk-search uk-search-default" action="/voitures/ajax/resultsearch.php" method="post">
                        <span class="uk-search-icon-flip" uk-search-icon></span>
                        <input class="uk-search-input" id="recherche" autocomplete="off" type="search" placeholder="Rechercher">
                        <div>
                            <button name="marque" class="uk-button uk-button-secondary" id="content-ajax"></button>
                        </div>
                    </form>
                </div>
                <li class="uk-active"><a href="/voitures/account/infos.php">'.$_SESSION['pseudo'].'</a></li>
                <li class="uk-active"><a uk-toggle="target: #deconnexion">Déconnexion</a></li>';
            }else{
                echo '
                <div id="connexion" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <h2 class="uk-modal-title">Connexion</h2>
                        <form action="/voitures/connexion/connexion.php" method="post">
                        <div class="uk-margin">
                            <input class="uk-input" name="pseudo" type="text" placeholder="Pseudo">
                        </div>
                        <div class="uk-margin">
                            <input class="uk-input" name="password" type="password" placeholder="Mot de passe">
                        </div>
                        <button class="uk-button uk-button-primary" type="submit">Me connecter</button>
                        </form>
                    </div>
                </div>
                <li class="uk-active"><a uk-toggle="target: #connexion">Connexion</a></li>';
            }
            ?>
            </ul>
        </div>
    </nav>
</head>