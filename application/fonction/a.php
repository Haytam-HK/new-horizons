<?php
include("../connexion.php");
require("0.php");

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>bv</title>
    <meta name="description" content="Interface App">

    <link rel="apple-touch-icon" href="R.png" width="600px">
    <link rel="shortcut icon" href="R.png">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/scss/style.css">

<style>
#sub3{
  border: none;
  background-color: #363636;
  color: rgb(255, 255, 255);
  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
}
h3{
    margin-top:-4px;
    font-family: Helvetica;
    color: rgb(24 94 145);
    font-size: 34px;
    font-weight: bold;
    text-align: Left;
    text-shadow: 0 2px 1px #79a06d, 
      -1px 3px 1px #82ad75, 
      -2px 5px 1px #8ebf80;


}

</style>
</head>
<body>

      <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
   <!-- logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="../lg.png" alt="Logo" style="width:800px;height:150px;margin-top:-20px;margin-bottom:-25px;"></a>
                 <a class="navbar-brand hidden" href="#"><img src="../lg.png"  alt="Logo"></a> 
                 <!-- <h5>New Horizons</h5> -->
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
            <form action="#" method="POST" enctype="multipart/form-data">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#"  > <i class="menu-icon fa fa-user"></i><input id="sub3" type="submit" value="Profil" name="sub16" ></a>
                    </li>
                    <li class="active">
                        <a href="#"  > <i class="menu-icon fa fa-plus"></i><input id="sub3" type="submit" value="Filieres" name="sub3"></a>
                    </li>
                    <li class="active">
                        <a href="#"  > <i class="menu-icon fa fa-plus"></i><input id="sub3" type="submit" value="Classes" name="sub7"></a>
                    </li>
                    <li class="active">
                        <a href="#"  > <i class="menu-icon fa fa-book"></i><input id="sub3" type="submit" value="Cours" name="sub12"></a>
                    </li>
                    <li class="active">
                        <a href="#"  > <i class="menu-icon fa fa-sticky-note-o"></i><input id="sub3" type="submit" value="Notes" name="sub13"></a>
                    </li>
                    <li class="active">
                        <a href="#"  > <i class="menu-icon fa fa-table"></i><input id="sub3" type="submit" value="Absence" name="sub14"></a>
                    </li>
                    <li class="active"> 
                        <a><i class="menu-icon fa  fa-sign-out "></i><input id="sub3" type="submit" value="Deconnexion" name="sub4"></a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                    <h3>New Horizons</h3>
                        <div class="form-inline">
                          <!--  icon haut-->
                        </div>
                    </div>
            </div>
        
        </header>
        <!-- Header-->
        <?php
if(isset($_POST["sub4"])){
    header("Location:../authentification\administratif\index");
}
?>
<center>
<?php
// PARTIE : FILIERES -------------------------------------------------------------------------------------------
if(isset($_POST["sub3"])){
    // header("Location:../authentification\administratif\index");
    echo "<table border='1'>
          <tr><td><b>Filière</b></td><td><b>Nombre De Matieres</b></td><td><b>&nbsp;Détails</b></td></tr>";
        // Afficher Filière
        $SQL4="SELECT * FROM filiere";
        $req4=mysqli_query($conn,$SQL4);
        $p=1;
        while($res=mysqli_fetch_assoc($req4)){
        echo "<tr><td>".$res["nom_filiere"]."</td><td>".$res["nombre_matiere"]."</td><td><input type='submit' name='sub10' value='Voir Plus' style='border:none;'></td></tr>";
        // if($p%2==0)
        // echo "<style>td{ background-color: rgb(128, 128, 255)}</style>";
        // else
        // echo "<style>td{ background-color: rgb(51, 153, 255)}</style>";
        $p++;
        }
        //Ajouter Filière
    echo" <tr><td><input type='text' name='nomfiliere' placeholder='Nom de La filière'></td>
          <td><input type='text' name='nombre_matieres' placeholder='Nombre de Matieres'></td>
          <td><input type='submit' name='subfl' value='Ajouter Filière'></td></tr>";
    echo "</table>";
}
$_SESSION["a"]=0;
if(isset($_POST["subfl"])){
    $nom=$_POST["nomfiliere"];
    $nombre=$_POST["nombre_matieres"];
    $SQL="INSERT INTO filiere(idf, nom_filiere, nombre_matiere)
          VALUES(NULL, '$nom', '$nombre')";
    $req=mysqli_query($conn,$SQL);
    if(!$req)
    echo mysqli_error($conn);
    else
    $_SESSION["a"]=1;
    $_SESSION["nom"]=$nom;
    $_SESSION["nombre"]=$nombre;
}
if($_SESSION["a"]==1){
    for($i=1; $i<=$_SESSION["nombre"]; $i++){
        echo "<input type='text' name='matiere$i' placeholder='Nom de matiere$i'>
              <input type='text' name='confession$i' placeholder='Confession de matiere$i'><br>";
    }
    echo "<input type='submit' name='sub66' value='Ajouter les matiers'>";
    $SQL3="SELECT * FROM filiere WHERE nom_filiere='{$_SESSION['nom']}'";
    $req3=mysqli_query($conn,$SQL3);
    if(!$req3)
    echo mysqli_error($conn);
    while($res=mysqli_fetch_assoc($req3))
    $_SESSION["idf"]=$res["idf"];

}
if(isset($_POST["sub66"])){
    for($i=1; $i<=$_SESSION["nombre"]; $i++){
        $nom=$_POST["matiere$i"];
        $confession=$_POST["confession$i"];
        $SQL2="INSERT INTO matiere(id_matiere, nom_matiere, confession, idf)
               VALUES (NULL, '$nom', '$confession', '{$_SESSION["idf"]}')";
        $req2=mysqli_query($conn,$SQL2);
        if(!$req2)
        echo mysqli_error($conn);
    }
}
// -------------------------------------------------------------------------------------------------------------
// PARTIE : CLASSES --------------------------------------------------------------------------------------------
if(isset($_POST["sub7"])){
    echo "<table border='1'>
          <tr><td><b>Classe</b></td><td><b>Filière</b></td><td><b>Année Scolaire</b></td><td><b>&nbsp;Détails</b></td></tr>";
          // Affichier les classes
          $SQL5="SELECT * FROM class NATURAL JOIN filiere";
          $req5=mysqli_query($conn,$SQL5);
          $_classe_total=mysqli_num_rows($req5);
          $cm=0;
          while($res5=mysqli_fetch_assoc($req5)){
            $cm++;
            if($cm==1)
            $_SESSION["_classe_first"]=$res5["id_classe"];
            if($cm==$_classe_total)
            $_SESSION["_classe_last"]=$res5["id_classe"];
          echo "<tr><td>".$res5["nom_classe"]."</td><td>".$res5["nom_filiere"]."</td><td>".$res5["annee_scolaire"]."</td><td><input type='submit' name='sub8".$res5["id_classe"]."' value='Voir Plus' style='border:none;'></td></tr>";
          }
          // Ajouter classe
          echo "<tr><td><input type='text' name='nomclasse' placeholder='Nom de La Classe'></td>
          <td><select name='fl'>".
          $SQL6="SELECT * FROM filiere";
          $req6=mysqli_query($conn,$SQL6);
          while($res=mysqli_fetch_assoc($req6)){
          echo "<option value=".$res["idf"].">".$res["nom_filiere"]."</option>";
         }
          echo"</select></td>";
            echo"
          <td><input type='text' name='annee_scolaire' placeholder='Année Scolaire'></td>
          <td><input type='submit' name='subclass' value='Ajouter Classe'></td></tr>";
        echo "</table>";
        
    }

// Afficher etudiants d'une classe
for($k=$_SESSION["_classe_first"]; $k<=$_SESSION["_classe_last"]; $k++){
if(isset($_POST["sub8".$k])){
    // echo $_SESSION["_classe_last"]." : ".$_SESSION["_classe_first"];
$idclass=$k;
$_SESSION["idclass"]=$k;
$SQL8="SELECT id_classe, idf, nom_classe, annee_scolaire, nom_filiere, count(id_etudiant) as total FROM filiere NATURAL JOIN class NATURAL JOIN etudiant where id_classe='$idclass'";
$req8=mysqli_query($conn,$SQL8);
if(!$req8)
echo mysqli_error($conn);
$res8=mysqli_fetch_assoc($req8);
$SQL9="SELECT * FROM etudiant NATURAL JOIN class WHERE id_classe='{$_SESSION["idclass"]}' ORDER BY id_etudiant ASC";
$req9=mysqli_query($conn,$SQL9);
if(!$req9)
echo mysqli_error($conn);
$_SESSION["idclass"]=$res8["id_classe"];
$_SESSION["idfiliere"]=$res8["idf"];
echo "<table border='1'>
<tr><td><b>Classe :</b>".$res8["nom_classe"]."</td><td><b>Annee :</b>".$res8["annee_scolaire"]."</td><td><b>Filiere :</b>".$res8["nom_filiere"]."</td><td><b>Nombre de Eleves :</b>".$res8["total"]."</td></tr>
<tr><th colspan='2'>Nom et Prenom</th><th>Login</th><th>Mot de passe</th></tr>";
while($res9=mysqli_fetch_assoc($req9)){
echo "<tr><td colspan='2'>".$res9["nom"]." ".$res9["prenom"]."</td><td>".$res9["login"]."</td><td>".$res9["password"]."</td></tr>";
}
// Ajouter Etudiant
echo "<tr><td><input type='text' name='nom'></td>
      <td><input type='text' name='prenom'></td>
      <td><input type='text' name='login' value=".email()."></td>
      <td><input type='text' name='password' value=".password()."></tr>
      <tr><td colspan='4' align='center'><input type='Submit' name='sub9' value='Ajouter Etudiant'></td></tr>";
echo "</table>";
}
}

if(isset($_POST["subclass"])){
    $nomclass=$_POST["nomclasse"];
    $annee_scolaire=$_POST["annee_scolaire"];
    $fl=$_POST["fl"];
    $SQL7="INSERT INTO class(id_classe, nom_classe, annee_scolaire, idf)
           VALUES(NULL, '$nomclass', '$annee_scolaire', '$fl')";
    $req7=mysqli_query($conn,$SQL7);
    if(!$req7)
    echo mysqli_error($conn);
}

if(isset($_POST["sub9"])){
    $nomet=strtoupper($_POST["nom"]);
    $prenomet=strtolower($_POST["prenom"]);
    $loginet=$_POST["login"];
    // $passwordet=$_POST["password"];
    $passwordet=password_hash($_POST["password"], PASSWORD_BCRYPT);
    $SQL10="SELECT * FROM etudiant WHERE login='$loginet'";
    $req10=mysqli_query($conn,$SQL10);
    $res10=mysqli_num_rows($req10);
    if($res10==0){
        $SQL11="INSERT INTO etudiant(id_etudiant, nom, prenom, login, password, id_classe, idf)
                VALUES(NULL, '$nomet', '$prenomet', '$loginet', '$passwordet', '{$_SESSION["idclass"]}', '{$_SESSION["idfiliere"]}')";
        $req11=mysqli_query($conn,$SQL11);
        if(!$req11)
        echo mysqli_error($conn);
        else
        echo "done";   
    }
    else
    echo "email déja kayne";
}// -------------------------------------------------------------------------------------------------------------
// PARTIE : NOTES ----------------------------------------------------------------------------------------------
if(isset($_POST["sub13"])){
    if(isset($_SESSION["note_matiere_id"]))
    unset($_SESSION["note_matiere_id"]);
    //Choisir classe et filière pour afficher les etudiant et les matiers corespendent
    echo "<table border='0'>";
    echo "<tr>
            <td><select name='classe_note'>";
            $SQL22="SELECT * FROM class";
            $req22=mysqli_query($conn,$SQL22);
            while($res22=mysqli_fetch_assoc($req22)){
            echo "<option value='{$res22["id_classe"]}'>{$res22["nom_classe"]}</option>";
            }
    echo "</select></td><td><select name='classe_flr_note'>";
    $SQL23="SELECT * FROM filiere";
            $req23=mysqli_query($conn,$SQL23);
            while($res23=mysqli_fetch_assoc($req23))
            echo "<option value='{$res23["idf"]}'>".$res23["nom_filiere"]."</option>";
    
    echo "</select></td>
            <td><input type='text' name='classe_semestre_note'></td>
            <td><input type='submit' name='classe_sub_note' value='Afficher'</td></tr>";
    echo "</table>";
}
if(isset($_POST["classe_sub_note"])){
    $classe_note=$_POST["classe_note"];
    $_SESSION["classe_note"]=$classe_note;
    $_SESSION["classe_semestre_note"]=$_POST["classe_semestre_note"];
    $classe_flr_note=$_POST["classe_flr_note"];

    echo "<center><h5>Fichier De Note :</h3></center>";
    $SQL24="SELECT * FROM matiere WHERE idf='$classe_flr_note'";
    $req24=mysqli_query($conn,$SQL24);
    if(!$req24)
    echo mysqli_error($conn);
    echo "<br><table border='1'><tr><td></td>";
    $nbrmatiere_note=mysqli_num_rows($req24);
    while($res24=mysqli_fetch_assoc($req24)){
    if(isset($_SESSION["note_matiere_id"]))
    array_push($_SESSION["note_matiere_id"], $res24["id_matiere"]);
    else{
    $_SESSION["note_matiere_id"]=array();
    array_push($_SESSION["note_matiere_id"], $res24["id_matiere"]);
    }
    echo "<th>".$res24["nom_matiere"]."</th>";
    }
    echo "</tr>";
    $SQL25="SELECT * FROM etudiant WHERE id_classe='$classe_note'";
    $req25=mysqli_query($conn,$SQL25);
    if(!$req25)
    echo mysqli_error($conn);
    $te=0;
    while($res25=mysqli_fetch_assoc($req25)){
        
    echo "<tr>";
    echo "<td>".$res25["nom"]." ".$res25["prenom"]."</td>";

    for($i=0; $i<$nbrmatiere_note; $i++){
    echo "<td align='center'>
          <input type='text' name='note".$_SESSION["note_matiere_id"][$i].($te+1)."' size='10'></td>";
    }
    $te++;
    echo "</tr>";
    }
    echo "</table>";
    echo "<br><center><input type='submit' name='sub_note' value='Ajouter Note'></center>";
}
if(isset($_POST["sub_note"])){
    // print_r($_SESSION["note_matiere_id"]);
    $te1=0;
    $SQL26="SELECT * FROM etudiant WHERE id_classe='{$_SESSION["classe_note"]}'";
    $req26=mysqli_query($conn,$SQL26);
    while($res26=mysqli_fetch_assoc($req26)){
        $note_id_etudiant=$res26["id_etudiant"];
    $te1++;
    for($j=0; $j<count($_SESSION["note_matiere_id"]); $j++){

    if(!empty($_POST["note".$_SESSION["note_matiere_id"][$j].$te1])){
        $note_id_mat=$_SESSION["note_matiere_id"][$j];

        // echo $res26["nom"]." :".$_POST["note".$_SESSION["note_matiere_id"][$j].$te1];

    $SQL27="INSERT INTO note(id_note, valeur, semestre, id_etudiant, id_matiere)
            VALUES(NULL, '{$_POST["note".$_SESSION["note_matiere_id"][$j].$te1]}', '{$_SESSION["classe_semestre_note"]}', '$note_id_etudiant', '$note_id_mat')";
    $req27=mysqli_query($conn,$SQL27);
    if(!$req27)
    echo mysqli_error($conn);
    }
    }
}
}
// -------------------------------------------------------------------------------------------------------------
// PARTIE : ABSENCE --------------------------------------------------------------------------------------------
if(isset($_POST["sub14"])){
    if(isset($_SESSION["abs_matiere_id"]))
    unset($_SESSION["abs_matiere_id"]);
    //Choisir classe et filière pour afficher les etudiant et les matiers corespendent
    echo "<table border='0'>";
    echo "<tr>
            <td><select name='classe_abs'>";
            $SQL16="SELECT * FROM class";
            $req16=mysqli_query($conn,$SQL16);
            while($res16=mysqli_fetch_assoc($req16)){
            echo "<option value='{$res16["id_classe"]}'>{$res16["nom_classe"]}</option>";
            // echo $res17["idf"];
            }
    echo "</select></td><td><select name='classe_flr'>";
    $SQL17="SELECT * FROM filiere";
            $req17=mysqli_query($conn,$SQL17);
            while($res17=mysqli_fetch_assoc($req17))
            echo "<option value='{$res17["idf"]}'>".$res17["nom_filiere"]."</option>";
    
    echo "</select></td>
            <td><input type='date' name='date_abs'></td>
            <td><input type='submit' name='classe_sub' value='Afficher'</td></tr>";
    echo "</table>";
    // echo mysqli_num_rows($req17);
    // echo mysqli_num_rows($req16);
}
if(isset($_POST["classe_sub"])){
    $classe_abs=$_POST["classe_abs"];
    $_SESSION["classe_abs"]=$classe_abs;
    $classe_flr=$_POST["classe_flr"];
    $_SESSION["date_abs"]=$_POST["date_abs"];

    echo "<center><h5>Fichier d'absence de : ".$_SESSION["date_abs"]."</h3></center>";
    $SQL19="SELECT * FROM matiere WHERE idf='$classe_flr'";
    $req19=mysqli_query($conn,$SQL19);
    if(!$req19)
    echo mysqli_error($conn);
    echo "<br><table border='1'><tr><td></td>";
    $nbrmatiere=mysqli_num_rows($req19);
    while($res19=mysqli_fetch_assoc($req19)){
    if(isset($_SESSION["abs_matiere_id"]))
    array_push($_SESSION["abs_matiere_id"], $res19["id_matiere"]);
    else{
    $_SESSION["abs_matiere_id"]=array();
    array_push($_SESSION["abs_matiere_id"], $res19["id_matiere"]);
    }
    echo "<th>".$res19["nom_matiere"]."</th>";
    }
    echo "</tr>";
    $SQL18="SELECT * FROM etudiant WHERE id_classe='$classe_abs'";
    $req18=mysqli_query($conn,$SQL18);
    if(!$req18)
    echo mysqli_error($conn);
    $tz=0;
    while($res18=mysqli_fetch_assoc($req18)){
        
    echo "<tr>";
    echo "<td>".$res18["nom"]." ".$res18["prenom"]."</td>";

    for($i=0; $i<$nbrmatiere; $i++){
    echo "<td align='center'><input type='hidden' name='abs_id' value='".$res18["id_etudiant"]."'>
                             <input type='checkbox' name='abs".$_SESSION["abs_matiere_id"][$i].($tz+1)."'></td>";

    }
    $tz++;
    echo "</tr>";
    }
    echo "</table>";
    echo "<br><center><input type='submit' name='sub_abse' value='Ajouter Absence'></center>";
}
if(isset($_POST["sub_abse"])){
    // print_r($_SESSION["abs_matiere_id"]);
    $tz1=0;
    $SQL20="SELECT * FROM etudiant WHERE id_classe='{$_SESSION["classe_abs"]}'";
    $req20=mysqli_query($conn,$SQL20);
    while($res20=mysqli_fetch_assoc($req20)){
        $abs_id_etudiant=$res20["id_etudiant"];
    $tz1++;
    for($j=0; $j<count($_SESSION["abs_matiere_id"]); $j++){
       
        // echo $_SESSION["abs_matiere_id"][$j].$tz1."  ";

    if(isset($_POST["abs".$_SESSION["abs_matiere_id"][$j].$tz1])){
        $abs_id_mat=$_SESSION["abs_matiere_id"][$j];
    // echo $_SESSION["abs_matiere_id"][$j].$tz1;
    // echo $_SESSION["date_abs"].$res20['nom']." :".$_SESSION["abs_matiere_id"][$j]."<br>";
    $SQL21="INSERT INTO absence(id_absence, date, 	id_etudiant, id_matiere)
            VALUES(NULL, '{$_SESSION["date_abs"]}', '$abs_id_etudiant', '$abs_id_mat')";
    $req21=mysqli_query($conn,$SQL21);
    if(!$req21)
    echo mysqli_error($conn);
    }
    }
    echo "<br>";
}
}
// -------------------------------------------------------------------------------------------------------------
?> 
</center>  
    </div>
      
  <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="../assets/js/plugins.js"></script>
  <script src="../assets/js/main.js"></script>
</form>
</body>
</html>