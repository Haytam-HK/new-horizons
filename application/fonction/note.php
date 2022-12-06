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
    <title>Notes</title>
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
    font-size: 22px;
    
    
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

#test6{
    font-family: sans-serif;
}
#test3{

color:rgb(2,78,127);
}
#test4{
border-color: none;
width:22px;
height:8px;
/* margin-top:-10px; */
}
#test5{
margin-top:15px;
/* margin-bottom:10px; */
/* display:inline; */
}
#test7{
background-color:rgb(2,78,127);
/* padding-left:10px; */
}
li{
padding-left:25px;
}
li:hover{
background-color:rgb(2,78,127);
/* padding-left:10px; */
}
#menuToggle{
position: fixed;
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
        
                <li class="active" >
                        <a href="profil.php" id='test6'> <i class="menu-icon fa fa-user"></i>Profil</a>
                    </li>
                    <li class="active" >
                        <a href="filier.php" id='test6'> <i class="menu-icon fa fa-bars"></i>Filières</a>
                    </li>

                    <li class="active" >
                        <a href="classe.php" id='test6' > <i class="menu-icon fa fa-plus"></i>Classes</a>
                    </li>
                    <li class="active" > 
                        <a href="cour.php" id='test6'>  <i class="menu-icon fa fa-book"></i>Cours</a>
            </li>
            <li class="active" id='test7'> 
                <a href="note.php" id='test6' >  <i class="menu-icon fa fa-sticky-note-o"></i>Note</a>
               </li>
               <li class="active"> 
                <a href="absence.php" id='test6' >  <i class="menu-icon fa fa-table"></i>Absence</a>
               </li>
               <li class="active"> 
                <a href="deconex.php" id='test6'> <i class="menu-icon fa  fa-sign-out "></i>Deconnexion</a>
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
                <h3>NEW HORIZONS</h3>
                    <div class="form-inline">
                      <!--  icon haut-->
                    </div>
                </div>
        </div>
    <div class="col-sm-5">
        <div class="user-area dropdown float-right">
        <img class="user-avatar rounded-circle" 
       src="../uploads/<?=$res['photoA']?>"  alt="image de administrateur">
         </div>
    </div>
</div>

</header><!-- /header -->

        <form action="#" method="POST" enctype="multipart/form-data">   
<?php
echo "<div class='mt-3 ml-5'>
<table class=\"center\">";
echo "<tr>
<td><div class=\"input-group \">
<label class=\"input-group-text\">Classe</label>
<select class=\"form-select\"  name='classe_note'>";
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
<select class=\"form-select\"  name='classe_flr_note'>";
$SQL17="SELECT * FROM filiere";
        $req17=mysqli_query($conn,$SQL17);
        while($res17=mysqli_fetch_assoc($req17))
        echo "<option value='{$res17["idf"]}'>".$res17["nom_filiere"]."</option>";

echo "</select></div></td><td></td><td></td><td></td>
<td></td><td></td><td></td>
        <td><div class=\"input-group \">
        <label class=\"input-group-text\">Semestre</label>
        <select class=\"form-select\" name='classe_semestre_note'>";
        echo "<option value='1'>1</option><option value='2'>2</option>
        </select></div></td>
        <td></td><td></td><td></td><td></td><td></td><td></td>
        <td></td><td></td><td></td>
        <td><input type='submit' class=\"pt-2 pb-2 text-white rounded \" 
        name='classe_sub_note' id='ok1' value='Afficher la liste'</td></tr>";
echo "</table></div>";

if(isset($_POST["classe_sub_note"]))
    if(isset($_POST['classe_note']) and isset($_POST['classe_flr_note']) and 
    isset($_POST['classe_semestre_note']))
    if(!empty($_POST['classe_note']) and !empty($_POST['classe_flr_note']) 
    and !empty($_POST['classe_semestre_note'])){
        echo "<hr class='mt-4 mr-3 ml-3'>";
        if(isset($_SESSION["note_matiere_id"]))
    unset($_SESSION["note_matiere_id"]);    
    $classe_note=$_POST["classe_note"];
    $_SESSION["classe_note"]=$classe_note;
    $semestre=$_POST["classe_semestre_note"];
    $classe_flr_note=$_POST["classe_flr_note"];

    echo "<center><p>Les Note de Semestre ". $_POST['classe_semestre_note']."</p></center>";
    $SQL24="SELECT * FROM matiere WHERE idf='$classe_flr_note'";
    $req24=mysqli_query($conn,$SQL24);
    if(!$req24)
    echo mysqli_error($conn);
    echo "<br><table class='table table-bordered ml-1'><tr><td></td>";
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
    echo "<br><center><input type='submit' class=\"pr-3 pl-3 pt-2 pb-2 rounded text-white
    \" type='submit' id='color2'
    name='sub_note' value='Ajouter Note'></center>";
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
            VALUES(NULL, '{$_POST["note".$_SESSION["note_matiere_id"][$j].$te1]}', '{$_POST["classe_semestre_note"]}', '$note_id_etudiant', '$note_id_mat')";
    $req27=mysqli_query($conn,$SQL27);
    if(!$req27)
    echo mysqli_error($conn);
    }
    }
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