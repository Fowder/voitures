<?php 

session_start();

session_destroy();

header('location:/voitures/index.php');

?>