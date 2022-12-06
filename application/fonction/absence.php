<?php  session_start();
if(!empty($_SESSION["id_administrateur_login"])){
include("../connexion.php");

if (isset($_SESSION['id'])){
        $id=$_SESSION['id'];
          $sql = "SELECT * FROM administrateur where id=$id";
          $req = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($req)==1) {
          if($res = mysqli_fetch_assoc($req)){


 ?>

<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Absence</title>
    <meta name="description" content="Interface App">

    <link rel="apple-touch-icon" href="R.png" width="600px">
    <link rel="shortcut icon" href="../R.png">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/scss/style.css">
    <style>       
      hr{
        height: 1px;
        background-color: black;
        border: none;
      }
      #ok1{
    background-color: #024e7f;
       border: none;
 }
 #ok1:hover{
    background-color:#003658;
    box-shadow:unset; 
 }
 .center {
  margin-left: auto;
  margin-right: auto;
}
p{
    color: black;
    font-size: 20px;
    
}
#color2{
 background-color: #024e7f;
       border: none;
 }
 #color2:hover{
    background-color:#003658;
    box-shadow:unset; 
 }
 h3{
    margin-top:1px;
    font-family:sans-serif;
    letter-spacing: 2px;
    color: #024e7f;
    font-size: 30px;
    font-weight: bold;
    text-align: Left;
    text-shadow: 0 2px 1px #79a06d, 
      -1px 3px 1px #82ad75, 
      -2px 5px 1px #8ebf80;


}
.center {
  margin-left: auto;
  margin-right: auto;
}
li{
    padding-left:25px;
}
li:hover{
    background-color:rgb(2,78,127);
    /* padding-left:10px; */
}
#menuToggle{
    /* margin-left:-25px; */
    position:fixed;
    margin-right:8px;
}
#test6{
    font-family: sans-serif;
}
#test7{
    background-color:rgb(2,78,127);
    /* padding-left:10px; */
}
.center {
  margin-left: auto;
  margin-right: auto;
}
   </style>

</head>
<body>
      <!-- Left Panel -->

      <aside id="left" class="left-panel p-0 pr-0">
        <nav class="navbar navbar-expand-sm navbar-default">
   <!-- logo -->
            <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="../lg.png" alt="Logo" style="width:800px;height:150px;margin-top:-20px;margin-bottom:-25px;"></a>
            <a class="navbar-brand hidden" href="#"><img src="../lg.png"  alt="Logo"></a> 
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
               
                <li class="active">
                        <a href="profil.php" id='test6'> <i class="menu-icon fa fa-user"></i>Profil</a>
                    </li>
                    <li class="active">
                        <a href="filier.php"  id='test6'> <i class="menu-icon fa fa-bars"></i>Filières</a>
                    </li>

                    <li class="active">
                        <a href="classe.php"  id='test6'> <i class="menu-icon fa fa-plus"></i>Classes</a>
                    </li>
                    <li class="active"> 
                        <a href="cour.php"  id='test6'>  <i class="menu-icon fa fa-book"></i>Cours</a>
            </li>
            <li class="active"> 
                <a href="note.php"  id='test6'>  <i class="menu-icon fa fa-sticky-note-o"></i>Note</a>
               </li>
               <li class="active"  id='test7'> 
                <a href="absence.php"  id='test6'>  <i class="menu-icon fa fa-table"></i>Absence</a>
               </li>
               <li class="active"> 
                <a href="deconex.php"  id='test6'> <i class="menu-icon fa  fa-sign-out "></i>Deconnexion</a>
               </li>
            </ul>
           
            </div><!-- /.navbar-collapse -->
            
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <!-- Header-->

<!-- Header-->
<header id="header" class="header">

    <div class="header-menu">

    <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                    <h3>NEW HORIZONS</h3>
                        <div class="form-inline">
                          <!--  icon haut-->
                        </div>
                    </div>
            </div>
        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
            <img class="user-avatar rounded-circle" 
           src="../uploads/<?=$res['photoA']?>"  alt="image de afministrateur">
             </div>
        </div>
    </div>

</header><!-- /header -->

<form action="#" method="POST" enctype="multipart/form-data">
<?php

    //Choisir classe et filière pour afficher les etudiant et les matiers corespendent
echo "<div class='mt-3 ml-5'>
    <table class=\"center\">";
    echo "<tr>
    <td><div class=\"input-group \">
    <label class=\"input-group-text\">Classe</label>
    <select class=\"form-select\"  name='classe_abs'>";
            $SQL16="SELECT * FROM class";
            $req16=mysqli_query($conn,$SQL16);
            while($res16=mysqli_fetch_assoc($req16)){
            echo "<option value='{$res16["id_classe"]}'>{$res16["nom_classe"]}</option>";
            }
    echo "</select></div></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
    <td><div class=\"input-group \">
    <label class=\"input-group-text\">Filières</label>
    <select class=\"form-select\"  name='classe_flr'>";
    $SQL17="SELECT * FROM filiere";
            $req17=mysqli_query($conn,$SQL17);
            while($res17=mysqli_fetch_assoc($req17))
            echo "<option value='{$res17["idf"]}'>".$res17["nom_filiere"]."</option>";
    
    echo "</select></div></td><td></td><td></td><td></td>
    <td></td><td></td><td></td>
            <td><input type='date' class='pt-1 pb-1 pl-2 pr-2' name='date_abs'></td>
            <td></td><td></td><td></td><td></td><td></td><td></td>
            <td></td><td></td><td><div class=\"input-group mr-3\">
            <label class=\"input-group-text\">Semestre</label>
            <select class=\"form-select\" name='classe_semestre_abs'>";
            echo "
            <option value='1'>S1</option>
            <option value='2'>S2</option>
            <option value='3'>S3</option>
            <option value='4'>S4</option>
            </select></div></td>
            <td><input type='submit' class=\"pt-2 pb-2 text-white rounded \" 
             name='classe_sub' id='ok1' value='Afficher la liste'</td></tr>";
    echo "</table></div>";
    // echo mysqli_num_rows($req17);
    // echo mysqli_num_rows($req16);

if(isset($_POST["classe_sub"]))
if(isset($_POST['classe_abs']) and isset($_POST['classe_flr']) and isset($_POST['date_abs']) and isset($_POST["classe_semestre_abs"]))
if(!empty($_POST['classe_abs']) and !empty($_POST['classe_flr']) and !empty($_POST['date_abs']) and !empty($_POST["classe_semestre_abs"])){
    echo "<hr class='mt-4 mr-3 ml-3'>";
if(isset($_SESSION["abs_matiere_id"]))
unset($_SESSION["abs_matiere_id"]);
    $classe_abs=$_POST["classe_abs"];
    $_SESSION["classe_abs"]=$classe_abs;
    $classe_flr=$_POST["classe_flr"];
    $_SESSION["date_abs"]=$_POST["date_abs"];
    $_SESSION["classe_semestre_abs"]=$_POST["classe_semestre_abs"];

    echo "<center><p>Fichier d'absence de : ".$_SESSION["date_abs"]."</p></center>";
    $SQL19="SELECT * FROM matiere WHERE idf='$classe_flr'";
    $req19=mysqli_query($conn,$SQL19);
    if(!$req19)
    echo mysqli_error($conn);
    echo "<br><table class='table table-bordered'><tr><td></td>";
    $nbrmatiere=mysqli_num_rows($req19);
    while($res19=mysqli_fetch_assoc($req19)){
    if(isset($_SESSION["abs_matiere_id"]))
    array_push($_SESSION["abs_matiere_id"], $res19["id_matiere"]);
    else{
    $_SESSION["abs_matiere_id"]=array();
    array_push($_SESSION["abs_matiere_id"], $res19["id_matiere"]);
    }
    echo "<th><center>".$res19["nom_matiere"]."</center></th>";
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
    echo "<br><center><input class=\"pr-3 pl-3 pt-2 pb-2 rounded text-white
    \" type='submit' id='color2' name='sub_abse' value='Ajouter Absence'></center>";
}
if(isset($_POST["sub_abse"])){
    // print_r($_SESSION["abs_matiere_id"]);
    $c=0;
    $tz1=0;
    $SQL20="SELECT * FROM etudiant WHERE id_classe='{$_SESSION["classe_abs"]}'";
    $req20=mysqli_query($conn,$SQL20);
    while($res20=mysqli_fetch_assoc($req20)){
        $abs_id_etudiant=$res20["id_etudiant"];
    $c++;
    $tz1++;
    for($j=0; $j<count($_SESSION["abs_matiere_id"]); $j++){
       
        // echo $_SESSION["abs_matiere_id"][$j].$tz1."  ";

    if(isset($_POST["abs".$_SESSION["abs_matiere_id"][$j].$tz1])){
        $abs_id_mat=$_SESSION["abs_matiere_id"][$j];
    // echo $_SESSION["abs_matiere_id"][$j].$tz1;
    // echo $_SESSION["date_abs"].$res20['nom']." :".$_SESSION["abs_matiere_id"][$j]."<br>";
    $SQL21="INSERT INTO absence(id_absence, date, semestre, id_etudiant, id_matiere)
            VALUES(NULL, '{$_SESSION["date_abs"]}', '{$_SESSION["classe_semestre_abs"]}', '$abs_id_etudiant', '$abs_id_mat')";
    $req21=mysqli_query($conn,$SQL21);
 
    }
    }
    echo "<br>";
}
}
          }}}
?>
</form>
  <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="../assets/js/plugins.js"></script>
  <script src="../assets/js/main.js"></script>
</body>
</html>
<?php 
}
else
header("Location:../../authentification/administratif/index/index.php");
?>