<?php  session_start();?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <title>bv</title>
    <meta name="description" content="Interface App">

<link rel="apple-touch-icon" href="R.png" width="600px">
<link rel="shortcut icon" href="../R.png">
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/scss/style.css">

    <style>
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
            <a class="navbar-brand" href="../index.php"><img src="../lg.png" alt="Logo" 
            style="width:800px;height:150px;margin-top:-20px;margin-bottom:-25px;"></a>
                 <a class="navbar-brand hidden" href="../index.php"><img src="../lg.png"  alt="Logo"></a> 
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
               
               <li class="active">
                       <a href="profil.php" > <i class="menu-icon fa fa-user"></i>Profil</a>
                   </li>
                   <li class="active">
                       <a href="filier.php"  > <i class="menu-icon fa fa-bars"></i>Filières</a>
                   </li>

                   <li class="active">
                       <a href="classe.php"  > <i class="menu-icon fa fa-plus"></i>Classes</a>
                   </li>
                   <li class="active"> 
                       <a href="cour.php"  >  <i class="menu-icon fa fa-book"></i>Cours</a>
           </li>
           <li class="active"> 
               <a href="note.php"  >  <i class="menu-icon fa fa-sticky-note-o"></i>Note</a>
              </li>
              <li class="active"> 
               <a href="absence.php"  >  <i class="menu-icon fa fa-table"></i>Absence</a>
              </li>
              <li class="active"> 
               <a href="deconex.php"  > <i class="menu-icon fa  fa-sign-out "></i>Deconnexion</a>
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

 include("../connexion.php");
if (isset($_SESSION['id'])){
 $id=$_SESSION['id'];
 $sql="SELECT * from administrateur  WHERE id=$id";
 $req=mysqli_query($conn,$sql);
while ($res=mysqli_fetch_row($req)){
 echo "<h1 class='h3 mb-4 text-gray-800'>Bienveneu $res[2] $res[1] </h1>";}}
 ?>
        
       </div>
      
  <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
