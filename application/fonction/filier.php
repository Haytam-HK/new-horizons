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
    <title>Filière</title>
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
.center {
  margin-left: auto;
  margin-right: auto;
}
#test6{
    font-family: sans-serif;
}

#b1{
    /* width:16px; */
    color: none;
    border-color: White;
}
#b1:hover{
    /* background-color: rgb(2,78,127); */
    border-color: White;
    color:rgb(2,78,127);
}

#b2{
    border-color:white;
}
#b2:hover{
    color:rgb(2,78,127);
    background-color: white;
    
}

#test2{
    margin-left:60px;
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
#cardlist{
  flex-wrap: wrap;
  display: flex;

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
                    <li class="active" id='test7'>
                        <a href="filier.php" id='test6'> <i class="menu-icon fa fa-bars"></i>Filières</a>
                    </li>

                    <li class="active">
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

      
<form action="#" method="POST" enctype="multipart/form-data">   
<?php 
     $SQL4="SELECT * FROM filiere";
     $req4=mysqli_query($conn,$SQL4);
  echo "<div class='ml-2' id='cardlist'>";
  
  while($res=mysqli_fetch_assoc($req4)){    
      $SQL4_1="SELECT * FROM class WHERE idf='{$res['idf']}'";
      $req4_1=mysqli_query($conn,$SQL4_1);
      $nbr_class_fl=mysqli_num_rows($req4_1);  

      $SQL4_2="SELECT * FROM etudiant WHERE idf='{$res['idf']}'";
      $req4_2=mysqli_query($conn,$SQL4_2);
      $nbr_etudiant_fl=mysqli_num_rows($req4_2);  
echo "
<div class=\"col-lg-4 col-md-6  col-12 mb-5 mt-lg-4 \">
<div class=\"pricing-thumb bg-white shadow-lg\">                                
<div class=\"pricing-title-wrap d-flex align-items-center\">
<h4 class=\"pricing-title text-white \">".strtoupper($res["nom_filiere"])."</h4></div>
<div class=\"pricing-body\">
<p>
<table>
<tr><td><p>Nombre de Matière  </p></td><td><p>: {$res["nombre_matiere"]}</p></td></tr>
<tr><td><p>Nombre de Classe  </p></td><td><p>: {$nbr_class_fl}</p></td></tr>
<tr><td><p>Nombre de Etudiant  </p></td><td><p>: {$nbr_etudiant_fl}</p></td></tr>
</table>
</p>
</div>
</div>
</div>";}
echo "
</div>
<div class='' >
<table id='b' class='ml-2 '><tr><td >
<input id=\"id4\" class='custom-btn btn mt-2 ml-4 mb-2 mr-4' type='submit'
value='Ajouter Filière' name='sub7'  ></td>
";
if(isset($_POST["sub7"])){
echo "
<td>
<input type='text' class=\"form-control  \" 
name='nomfiliere' placeholder='Nom de La filière'></td>
<td></td><td></td><td></td><td></td><td></td>
<td></td><td></td><td></td><td></td><td></td>
<td><input type='text' name='nombre_matieres' class=\"form-control\" 
placeholder='Nombre de Matieres'>
</td><td></td><td></td><td></td><td></td><td></td>
<td><input type='submit' class='btn-lg text-white' id='ok1' 
name='subfl' value='+'></td></tr></table>
";
 }
 $_SESSION["a"]=0;
 if(isset($_POST["subfl"]))
 if(isset($_POST['nomfiliere']) and isset($_POST["nombre_matieres"]))
if(!empty(['nomfiliere']) and !empty($_POST["nombre_matieres"])){
    if(isset($_SESSION["abs_matiere_id"]))
    unset($_SESSION["idf"]);
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
 echo "<table class='center'>";
 if($_SESSION["a"]==1){
     for($i=1; $i<=$_SESSION["nombre"]; $i++){
         echo  
"<tr>
<td><input type='text'  class=\" form-control  \"  name='matiere$i' placeholder='Nom de matiere : $i'></td>
<td></td><td></td><td></td>
<td ><input  class=\"  form-control  \"  type='text' name='confession$i' 
placeholder='Confession de matiere : $i'></td>
</tr>";
     }
     echo "<tr><td></td><td></td><td></td><td></td></tr>
     <tr><td></td><td></td><td></td><td></td><td>
     <input type='submit' name='sub66' value='+' 
     class='btn-lg  text-white' id='ok1'></td></tr>
     <tr><td></td><td></td><td></td><td></td></tr>";
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
   
 }}}}
  echo '</table></div>';   
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