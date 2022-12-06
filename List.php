<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$bd='pfe';
$conn= mysqli_connect($servername, $username, $password, $bd)
or die('Erreur :'.mysqli_connect_error());

$SQl_100="SELECT * FROM etudiant";
var_dump($SQL_100);
$req_100=mysqli_query($conn,$SQL_100);
if(!$req)
echo mysqli_error($conn);
echo '<table border="1">
<tr><td>Nom Prenom</td><td>Login</td><td>Password</td></tr>';
while($res=mysqli_fetch_assoc($req_100)){
    foreach($_SESSION["passwords"] as $password){
        if(password_verify($password, $res["password"]))
        echo "<tr><td>".$res["nom"]." ".$res["prenom"]."</td><td>".$res["login"]."</td><td>".$res["password"]."</td></tr>";
    }
}
echo "</table>";
//  print_r($_SESSION["emails"]);
//  echo "<br><br>";
//  print_r($_SESSION["passwords"]);
$conn->close();
?>