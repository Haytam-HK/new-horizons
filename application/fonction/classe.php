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
    <title>Classes</title>
    <meta name="description" content="Interface App">

    <link rel="apple-touch-icon" href="R.png" width="600px">
    <link rel="shortcut icon" href="../R.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/scss/style.css">
    <link rel="stylesheet" href="../assets/scss/style1.css">
<style>
   #b1{
       background-color: #024e7f;
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
/* #b{
    display:inline-block;
} */
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
        
                <li class="active" >
                        <a href="profil.php" id='test6'> <i class="menu-icon fa fa-user"></i>Profil</a>
                    </li>
                    <li class="active" >
                        <a href="filier.php" id='test6'> <i class="menu-icon fa fa-bars"></i>Filières</a>
                    </li>

                    <li class="active" id='test7'>
                        <a href="classe.php" id='test6' > <i class="menu-icon fa fa-plus"></i>Classes</a>
                    </li>
                    <li class="active"> 
                        <a href="cour.php" id='test6'>  <i class="menu-icon fa fa-book"></i>Cours</a>
            </li>
            <li class="active"> 
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

<form action="etudiant.php" method="POST" enctype="multipart/form-data">   
<?php 
  $SQL5="SELECT * FROM class NATURAL JOIN filiere";
  $req5=mysqli_query($conn,$SQL5);
  echo "<div class='ml-2 mr-2' id='cardlist'>";
  $req5=mysqli_query($conn,$SQL5);
$_classe_total=mysqli_num_rows($req5);
$cm=0;
while($res=mysqli_fetch_assoc($req5)){
  $SQL5_1="SELECT * FROM etudiant where id_classe='{$res["id_classe"]}'";
  $req5_1=mysqli_query($conn,$SQL5_1);
  $nbr_etudiant_classe=mysqli_num_rows($req5_1);
$cm++;
if($cm==1)
$_SESSION["_classe_first"]=$res["id_classe"];
if($cm==$_classe_total)
$_SESSION["_classe_last"]=$res["id_classe"];    
echo "
<div class=\"col-lg-4 col-md-6  col-12 mb-5 mt-lg-4 \">
<div class=\"pricing-thumb bg-white shadow-lg\">                                
<div class=\"pricing-title-wrap d-flex align-items-center\">
<h4 class=\"pricing-title text-white \">".strtoupper($res["nom_classe"])."</h4></div>
<div class=\"pricing-body\">
<p>Filière : {$res["nom_filiere"]}</p>
<p>Année Scolaire : {$res["annee_scolaire"]}</p>
<p>Nombre de Etudiant : {$nbr_etudiant_classe}</p>
<input name='sub8".$res["id_classe"]."' type='submit' value='Voir plus' class=\"custom-btn btn\"  id=\"id4\"></input>

</div>
</div>
</div>";
}
echo "
</div></form>
<form action='#' method='POST' enctype='multipart/form-data'>   
<div class='' >
<table id='b' class='ml-2 '><tr><td>
<normal><input id=\"id44\" class='custom-btn btn mt-2 ml-4 mb-2 mr-4' type='submit'
 value='Ajouter Classe' name='sub7'  ></normal></td>
";
if(isset($_POST["sub7"])){
echo "
<td>
<input type='text' class=\"form-control  \" 
name='nomclasse' placeholder='Nom de La Classe'></td>
<td></td><td></td><td></td><td></td><td></td>
<td><div class=\"input-group \">
<select class=\"form-select\"  name='fl' >".
          $SQL6="SELECT  * FROM filiere";
          $req6=mysqli_query($conn,$SQL6);
          while($res=mysqli_fetch_assoc($req6)){
            echo "<option value=".$res["idf"].">".$res["nom_filiere"]."</option>";}
        
echo"</select><label class=\"input-group-text\">Filières</label></div></td>";
echo"<td></td><td></td><td></td><td></td><td></td>
<td><input type='text' name='annee_scolaire' class=\"form-control\" placeholder='Année Scolaire'>
</td><td></td><td></td><td></td><td></td><td></td>
<td><input type='submit' class='btn-lg text-white' id='ok1' name='subclass' value='+'></td></tr>
 </table>
</div>
";
 }
          }}}
          if(isset($_POST["subclass"])){
            $nomclass=$_POST["nomclasse"];
            $annee_scolaire=$_POST["annee_scolaire"];
            $fl=$_POST["fl"];

            $SQL7_1="SELECT * FROM class WHERE nom_classe='$nomclass'";
            $req7_1=mysqli_query($conn,$SQL7_1);
            if(!$req7_1)
            echo mysqli_error($conn);
            if(mysqli_num_rows($req7_1)<1){

            $SQL7="INSERT INTO class(id_classe, nom_classe, annee_scolaire, idf)
                   VALUES(NULL, '$nomclass', '$annee_scolaire', '$fl')";
            $req7=mysqli_query($conn,$SQL7);
            if(!$req7)
            echo mysqli_error($conn);
        }
        }
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