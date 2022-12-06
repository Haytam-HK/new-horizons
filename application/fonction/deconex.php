<?php
session_start();
unset($_SESSION["id_administrateur_login"]);
header('location:../../authentification/administratif/index/index.php');

?>