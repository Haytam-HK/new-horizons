<?php
session_start();
unset($_SESSION["id_etudiant_login"]);
header('location:../../authentification/etudiant/index/index.php');
?>