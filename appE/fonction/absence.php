<?php  session_start();
if(!empty($_SESSION["id_etudiant_login"])){
include("../connexion.php");

if (isset($_SESSION['idE'])){
        $id=$_SESSION['idE'];
          $sql = "SELECT * FROM etudiant natural join class natural join filiere 
          where id_etudiant=$id";
          $req = mysqli_query($conn,$sql);

          if (mysqli_num_rows($req)==1) {

         while($res = mysqli_fetch_assoc($req)){

$nom=strtoupper($res['nom']);
$prenom=ucfirst($res['prenom']);
$email=$res['login']; 
$classe=$res['nom_classe'];
$filiere=$res['nom_filiere'];
?>  
<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Profil</title>
    <meta name="description" content="Interface App">

    <link rel="apple-touch-icon" href="R.png" width="600px">
    <link rel="shortcut icon" href="../R.png">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/scss/style.css">
<style>
    .demo{ font-family: 'Noto Sans', sans-serif; }
.panel{
    background: linear-gradient(to right, #2980b9, #2c3e50);
    padding: 0;
    border-radius: 10px;
    border: none;
    box-shadow: 0 0 0 5px rgba(0,0,0,0.05),0 0 0 10px rgba(0,0,0,0.05);
}
.panel .panel-heading{
    padding: 20px 15px;
    border-radius: 10px 10px 0 0;
    margin: 0;
}
.panel .panel-heading .title{
    color: #fff;
    font-size: 28px;
    font-weight: 500;
    text-transform: capitalize;
    line-height: 40px;
    margin: 0;
}
.panel .panel-heading .btn{
    color: rgba(255,255,255,0.5);
    background: transparent;
    font-size: 16px;
    text-transform: capitalize;
    border: 2px solid #fff;
    border-radius: 50px;
    transition: all 0.3s ease 0s;
}
.panel .panel-heading .btn:hover{
    color: #fff;
    text-shadow: 3px 3px rgba(255,255,255,0.2);
}
.panel .panel-heading .form-control{
    color: #fff;
    background-color: transparent;
    width: 35%;
    height: 40px;
    border: 2px solid #fff;
    border-radius: 20px;
    display: inline-block;
    transition: all 0.3s ease 0s;
}
.panel .panel-heading .form-control:focus{
    background-color: rgba(255,255,255,0.2);
    box-shadow: none;
    outline: none;
}
.panel .panel-heading .form-control::placeholder{
    color: rgba(255,255,255,0.5);
    font-size: 15px;
    font-weight: 500;
}
.panel .panel-body{ padding: 0; }
.panel .panel-body .table thead tr th{
    color: #fff;
    background-color: rgba(255, 255, 255, 0.2);
    font-size: 16px;
    font-weight: 500;
    text-transform: uppercase;
    padding: 12px;
    border: none;
}
.panel .panel-body .table tbody tr td{
    color: #fff;
    font-size: 15px;
    padding: 10px 12px;
    vertical-align: middle;
    border: none;
}
.panel .panel-body .table tbody tr:nth-child(even){ background-color: rgba(255,255,255,0.05); }
.panel .panel-body .table tbody .action-list{
    padding: 0;
    margin: 0;
    list-style: none;
}
.panel .panel-body .table tbody .action-list li{
    display: inline-block;
    margin: 0 5px;
}
.panel .panel-body .table tbody .action-list li a{
    color: #fff;
    font-size: 15px;
    position: relative;
    z-index: 1;
    transition: all 0.3s ease 0s;
}
.panel .panel-body .table tbody .action-list li a:hover{ text-shadow: 3px 3px 0 rgba(255,255,255,0.3); }
.panel .panel-body .table tbody .action-list li a:before,
.panel .panel-body .table tbody .action-list li a:after{
    content: attr(data-tip);
    color: #fff;
    background-color: #111;
    font-size: 12px;
    padding: 5px 7px;
    border-radius: 4px;
    text-transform: capitalize;
    display: none;
    transform: translateX(-50%);
    position: absolute;
    left: 50%;
    top: -32px;
    transition: all 0.3s ease 0s;
}
.panel .panel-body .table tbody .action-list li a:after{
    content: '';
    height: 15px;
    width: 15px;
    padding: 0;
    border-radius: 0;
    transform: translateX(-50%) rotate(45deg);
    top: -18px;
    z-index: -1;
}
.panel .panel-body .table tbody .action-list li a:hover:before,
.panel .panel-body .table tbody .action-list li a:hover:after{
    display: block;
}
.panel .panel-footer{
    color: #fff;
    background-color: transparent;
    padding: 15px;
    border: none;
}
.panel .panel-footer .col{ line-height: 35px; }
.pagination{ margin: 0; }
.pagination li a{
    color: #fff;
    background-color: transparent;
    border: 2px solid transparent;
    font-size: 18px;
    font-weight: 500;
    text-align: center;
    line-height: 31px;
    width: 35px;
    height: 35px;
    padding: 0;
    margin: 0 3px;
    border-radius: 50px;
    transition: all 0.3s ease 0s;
}
.pagination li a:hover{
    color: #fff;
    background-color: transparent;
    border-color: rgba(255,255,255,0.2);
}
.pagination li a:focus,
.pagination li.active a,
.pagination li.active a:hover{
    color: #fff;
    background-color: transparent;
    border-color: #fff;
}
.pagination li:first-child a,
.pagination li:last-child a{
    border-radius: 50%;
}
@media only screen and (max-width:767px){
    .panel .panel-heading .title{
        text-align: center;
        margin: 0 0 10px;
    }
    .panel .panel-heading .btn_group{ text-align: center; }
}
#table_note{
    margin-left:92px;
    margin-top:20px;
}
#ok1{
    background-color: #024e7f;
       border: none;
 }
 #ok1:hover{
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
#ok1{
    background-color: #024e7f;
       border: none;
       margin-left: 20px;
 }
 #ok1:hover{
    background-color:#003658;
    box-shadow:unset; 
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
                    <li class="active" > 
                        <a href="cour.php" id='test6'>  <i class="menu-icon fa fa-book"></i>Cours</a>
            </li>
            <li class="active" > 
                <a href="note.php" id='test6' >  <i class="menu-icon fa fa-sticky-note-o"></i>Note</a>
               </li>
               <li class="active" id='test7'> 
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

<center>
<div class="container ml-1 mr-4">
    <div id="table_note">
    <div class='row '>
        <div class='col-2'></div>
        <div class='col text-center'></div>
        <div class='col-3'></div>
    </div>
    <div class="row ml-5 mt-1">
        <div class="col-md-offset-1 col-md-18">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col mt-2 pt-2 pb-2">
                            <h4 class="title">Fichier Des Absence</h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table"style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th style="width:60%">Matiere</th>
                                <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                                <th>Confession</th>
                                <th></th><th></th><th></th>
                                <th>Semestre</th>
                                <th></th><th></th><th></th><th></th>
                                <th>Date</th>
                                <th></th><th></th><th></th>
                            </tr>
                        </thead>
                        <tbody>
 <?php
$_SESSION["id_etudiant_et"]=7;
$SQL32="SELECT * FROM absence NATURAL JOIN matiere WHERE id_etudiant=$id ORDER BY date DESC";
$req32=mysqli_query($conn,$SQL32);
if(mysqli_num_rows($req32)==0)
echo "<tr><td colspan='3' align='center'>VIDE</td></tr>";
while($res32=mysqli_fetch_assoc($req32)){
    echo "<tr><td></td>
    <td colspan='6'>".$res32["nom_matiere"]."</td>
    <td></td><td></td><td></td><td></td><td></td>
    <td align='center'>".$res32["confession"]."</td>
    <td></td><td></td><td></td>
    <td align='center'>".$res32["semestre"]."</td>
    <td></td><td></td><td></td>
    <td align='center' colspan='4'>".$res32["date"]."</td>
    </tr>";
}}}}
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- hna ktb b9a tjii mooor headeer  -->
</center>
</body>
</html>
<?php 
}
else
header('location:../../authentification/etudiant/index/index.php');
?>