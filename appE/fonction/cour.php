<?php  session_start();
if(!empty($_SESSION["id_etudiant_login"])){
include("../connexion.php");

if (isset($_SESSION['idE'])){
        $id=$_SESSION['idE'];
        $classe=$_SESSION['idC'];
          $sql = "SELECT * FROM etudiant where id_etudiant=$id";
          $req = mysqli_query($conn,$sql);

          if (mysqli_num_rows($req)==1) {
          if($res = mysqli_fetch_assoc($req)){
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Cours</title>
    <meta name="description" content="Interface App">

    <link rel="apple-touch-icon" href="../R.png" width="600px">
    <link rel="shortcut icon" href="../R.png">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/scss/style.css">
<style>

#test7{
    background-color:rgb(2,78,127);
    /* padding-left:10px; */
    
}
li{
    padding-left:3px;
    padding-right:-30px;
}
li:hover{
    background-color:rgb(2,78,127);
   /* margin-left:100px; */
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
#titre{
    background-color: #024e7f;
}

#b2{
    border-color:white;
}
#b2:hover{
    color:rgb(2,78,127);
    background-color: white;
    
}

#test2{
    margin-left:50px ;
    margin-top:80px;
    }
#test3{

    color:rgb(2,78,127);
}


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
                        <a href="cour.php" id='test6'>  <i class="menu-icon fa fa-book"></i>Cours</a>
            </li>
            <li class="active" > 
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
           src="../uploads/<?=$res['photoE']?>"  alt="image de etudiant ">
             </div>
        </div>
    </div>

</header><!-- /header -->
<?php
$SQL1="SELECT * FROM cours where id_classe=$classe";
$req1=mysqli_query($conn,$SQL1);
while($res1=mysqli_fetch_assoc($req1)){
 echo "<div class=' mt-4 mb-4 ml-5 mr-5 rounded float-start'>
<a href='../../application/cours/{$res1['designation']}' target=\"_blank\" >
<div id='titre' class='border border-dark p-2 text-white'>{$res1['titre'] }</div> 
<div class='border border-dark pb-5 pl-2 pt-2 pr-2 '>{$res1['desription'] }
<div class='float-right mt-5 mr-2 '>{$res1['datecours'] }
</div>
</div>
<a>
</div> " ;
 
}

?>
</table>


<?php
}}}?>
  <script src="../../assets/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="../../assets/js/plugins.js"></script>
  <script src="../../assets/js/main.js"></script>
</body>
</html>
<?php 
}
else
header('location:../../authentification/etudiant/index/index.php');
?>