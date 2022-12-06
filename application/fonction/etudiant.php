<?php   
session_start();
if(!empty($_SESSION["id_administrateur_login"])){


include("../connexion.php");

function email(){
    if(!isset($_SESSION["emails"]))
    $_SESSION["emails"]=array();
    else{
        foreach($_SESSION["emails"] as $ty => $tr){
            $tt=0;
            include("../connexion.php");
            $SQL28="SELECT * FROM etudiant";
            $req28=mysqli_query($conn,$SQL28);
            if(!$req28)
            echo mysqli_error($conn);
            while($res28=mysqli_fetch_assoc($req28)){
                $dt=$res28["login"];
                if($tr==$dt){
                $tt=1;
            }
            }
            if($tt==0)
            unset($_SESSION['emails'][$ty]);
        }
    }
    do{
    $a=rand(65,90);
    $b=chr($a);
    $c=rand(100000000,999999999);
    $d=$b.$c."@horizons.acm";
    }
    while(in_array($d,$_SESSION["emails"]));
    array_push($_SESSION["emails"],$d);
    return $d;
    }
    //-------------------------------------------
    // function that create a password for users
    function password(){
    if(!isset($_SESSION["passwords"]))
    $_SESSION["passwords"]=array();
    else{
        foreach($_SESSION["passwords"] as $ty => $tr){
            $tt=0;
            include("../connexion.php");
            $SQL29="SELECT * FROM etudiant";
            $req29=mysqli_query($conn,$SQL29);
            if(!$req29)
            echo mysqli_error($conn);
            while($res29=mysqli_fetch_assoc($req29)){
                $dt=$res29["password"];
                if(password_verify($tr, $dt)){
                $tt=1;
            }
            }
            if($tt==0)
            unset($_SESSION['passwords'][$ty]);
        }
    }
    do{
    $d=chr(rand(65,90)).chr(rand(65,90)).rand(65,90).rand(65,90).chr(rand(65,90)).chr(rand(65,90)).rand(65,90).rand(65,90);
    }
    while(in_array($d,$_SESSION["passwords"]));
    array_push($_SESSION["passwords"],$d);
    return $d;
    }
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
    <title>Étudiant</title>
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
#color2{
 background-color: #024e7f;
       border: none;
 }
 #color2:hover{
    background-color:#003658;
    box-shadow:unset; 
 }
#ok1{
    background-color: #024e7f;
       border: none;
 }
 #ok1:hover{
    background-color:#003658;
    box-shadow:unset; 
 }
 #id4 {
    margin-top: 20px;
  margin-left:70px;
  /* margin-right: auto; */
  
}

/* margin-left: 5000; */


/* #left-panel{
  position: fixed;
} */
#cardlist{
  flex-wrap: wrap;
  display: flex;

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
               
                <li class="active">
                        <a href="profil.php" id='test6'> <i class="menu-icon fa fa-user"></i>Profil</a>
                    </li>
                    <li class="active">
                        <a href="filier.php"  id='test6'> <i class="menu-icon fa fa-bars"></i>Filières</a>
                    </li>

                    <li class="active" id='test7'>
                        <a href="classe.php"  id='test6'> <i class="menu-icon fa fa-plus"></i>Classes</a>
                    </li>
                    <li class="active"> 
                        <a href="cour.php"  id='test6'>  <i class="menu-icon fa fa-book"></i>Cours</a>
            </li>
            <li class="active"> 
                <a href="note.php"  id='test6'>  <i class="menu-icon fa fa-sticky-note-o"></i>Note</a>
               </li>
               <li class="active"> 
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
<form method="POST" action="#" enctype="multipart/form-data">
<?php
for($k=$_SESSION["_classe_first"]; $k<=$_SESSION["_classe_last"]; $k++){
if(isset($_POST["sub8".$k])){
    // echo $_SESSION["_classe_last"]." : ".$_SESSION["_classe_first"];
$idclass=$k;
$_SESSION["idclass"]=$k;
$SQL8="SELECT id_classe, idf, nom_classe, annee_scolaire, 
nom_filiere, count(id_etudiant) as total 
FROM filiere NATURAL JOIN class NATURAL JOIN etudiant where id_classe='$idclass'";
$req8=mysqli_query($conn,$SQL8);
if(!$req8)
echo mysqli_error($conn);
$res8=mysqli_fetch_assoc($req8);
$SQL9="SELECT * FROM etudiant NATURAL JOIN 
class WHERE id_classe='{$_SESSION["idclass"]}' ORDER BY id_etudiant ASC";
$req9=mysqli_query($conn,$SQL9);
if(!$req9)
echo mysqli_error($conn);
$_SESSION["idclass"]=$res8["id_classe"];
$_SESSION["idfiliere"]=$res8["idf"];
echo "<table class='ml-2 mr-5 mt-5 table table-bordered'>
<tr><td><b>Classe :</b>".$res8["nom_classe"]."</td>
<td><b>Annee :</b>".$res8["annee_scolaire"]."</td><td><b>Filiere :</b>".$res8["nom_filiere"]."</td>
<td><b>Nombre de Eleves :</b>".$res8["total"]."</td></tr>
<tr><th colspan='2'>Nom et Prenom</th><th>Login</th><th>Mot de passe</th></tr>";
while($res9=mysqli_fetch_assoc($req9)){
echo "<tr><td colspan='2'>".$res9["nom"]." 
".$res9["prenom"]."</td><td>".$res9["login"]."</td><td>".$res9["password"]."</td></tr>";
}
// Ajouter Etudiant
echo "<tr><td><input type='text' class=\"form-control\" name='nom' placeholder='Le nom'></td>
      <td><input type='text' class=\"form-control\" name='prenom' placeholder='Le prenom'></td>
      <td><input type='text' class=\"form-control\" name='login' value=".email()."></td>
      <td><input type='text' class=\"form-control\" name='password' value=".password()."></tr>
      <tr><td colspan='4' align='center'>
      <input type='submit' class='btn-sm text-white' id='ok1' name='sub9' value='Ajouter Etudiant'></td></tr>";
echo "</table>";
}
}
}}}
if(isset($_POST["sub9"])){
    $nomet=strtoupper($_POST["nom"]);
    $prenomet=strtolower($_POST["prenom"]);
    $loginet=$_POST["login"];
    $passwordet=$_POST["password"];
    // $passwordet=password_hash($_POST["password"], PASSWORD_BCRYPT);
    $SQL10="SELECT * FROM etudiant WHERE login='$loginet'";
    $req10=mysqli_query($conn,$SQL10);
    $res10=mysqli_num_rows($req10);
    if($res10==0){
$SQL11="INSERT INTO etudiant(id_etudiant, nom, prenom, login,photoE, password, id_classe, idf)
                VALUES(NULL, '$nomet', '$prenomet', '$loginet','k.jpg', '$passwordet', '{$_SESSION["idclass"]}', '{$_SESSION["idfiliere"]}')";
        $req11=mysqli_query($conn,$SQL11);
        if(!$req11)
        echo mysqli_error($conn);
        else
        echo "done";   
    }}
}
?></form>
  <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="../assets/js/plugins.js"></script>
  <script src="../assets/js/main.js"></script>
</body>
</html>
