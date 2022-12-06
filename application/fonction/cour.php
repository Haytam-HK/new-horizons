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
    <title>Cours</title>
    <meta name="description" content="Interface App">

    <link rel="apple-touch-icon" href="R.png" width="600px">
    <link rel="shortcut icon" href="../R.png">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/scss/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
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

.input-group-append {
  cursor: pointer;
}

#color1{
    background-color: white;
    border-radius: 25px;
    padding: 20px;
    box-shadow: inset;
}
#border{
    border:none;
}
input[type="file"] {
    display: none;
}
#color2{
 background-color: #024e7f;
       border: none;
 }
 #color2:hover{
    background-color:#003658;
    box-shadow:unset; 
 }
 #text{
 color: #024e7f;
 text-indent: 10px;
 /* letter-spacing: 1px; */
 font-family: arial;
 font-weight: bold;

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
                    <li class="active" id='test7'> 
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
<div class='mt-2 ml-5 mr-5 ' id='color1'>
<table  class="table" id='border' >
<tr><td id='text'>Titre  de cours </td><td>
<input type='text' name='titre' placeholder='Titre de cours' class="form-control">
</td></tr>
<tr><td id='text'>Description de cours</td><td>
<div class="form-floating">
  <textarea class="form-control" placeholder="Laisser une description de cours" 
   id="floatingTextarea2" style="height: 100px" name='description'></textarea>

</div></td></tr>
<tr ><td id='text'>Cours </td><td>
<label id='color2' class="btn-sm p-2 rounded text-white">
<input type='file'   name='designation_file' >
Importer un cours</label></td>
<tr><td id='text'>Classe</td><td>
<select class="form-select pl-5 pt-1 pb-1 pr-5"   name='cs' >
   <?php  
 $SQL12="SELECT * FROM class";
 $req12=mysqli_query($conn,$SQL12);
    while($res=mysqli_fetch_assoc($req12)){
    echo "<option value=".$res["id_classe"].">".$res["nom_classe"]."</option>";
    }?>
</select></td></tr>
<tr><td id='text'>Date </td><td> 
  <input type='date' class="form-control" name='datecours'  ></td></tr>
  <tr><td></td><td><input id='color2' class="pr-3 pl-3 pt-2 pb-2 rounded text-white
" type='submit' value='Ajouter cours' name='subcours_g' ></td>
</table>
</div>
</form>
<?php 
if(isset($_POST["subcours_g"])){
    if(isset($_POST['titre']) and isset($_POST["description"]) and isset($_POST["datecours"])
    and isset($_POST["cs"]) and isset($_FILES['designation_file'])){
        $titre=$_POST['titre'];
        $des=$_POST["description"];
        $date=$_POST["datecours"];
        $class=$_POST["cs"];
        $cour_name = $_FILES['designation_file']['name'];
        $cour_size = $_FILES['designation_file']['size'];
        $error = $_FILES['designation_file']['error'];
        $tmp_name = $_FILES['designation_file']['tmp_name'];
        if ($error === 0) {
                $extension= pathinfo($cour_name, PATHINFO_EXTENSION);
                $extension_lc = strtolower($extension);
                $a_ex = array("pdf" , "doc"); 
                if (in_array($extension_lc,$a_ex)) {
                    $new_cour_name = uniqid("CR-", true).'.'.$extension_lc;
                    $cour_upload_path = '../cours/'.$new_cour_name;
                    move_uploaded_file($tmp_name, $cour_upload_path);
        $SQL13="INSERT INTO cours(id_cours,titre,desription,designation,datecours,id_classe)
                VALUES(NULL,'$titre','$des','$new_cour_name ','$date','$class')";
        $req13=mysqli_query($conn,$SQL13);
        if(!$req13)
        echo mysqli_error($conn);
        
    }
    }}
    }}}}
?>
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