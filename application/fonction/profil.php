
<?php 
session_start();
if(!empty($_SESSION["id_administrateur_login"])){
include("../connexion.php");

if (isset($_SESSION['id'])){
        $id=$_SESSION['id'];
          $sql = "SELECT * FROM administrateur where id=$id";
          $req = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($req)==1) {
          if($res = mysqli_fetch_assoc($req)){
$nom=strtoupper($res['nom']);
$prenom=ucfirst($res['prenom']);
$email=$res['email']; 
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

input[type="file"] {
    display: none;
}
input[name="ok"] {
    display: none;
}
svg[class="bi bi-pen"]{
    color:black;
    border: 10px;
   

}
svg[class="bi bi-upload"]{
    border: none;
    color:black;
}
.center {
  margin-left: 300px;
  margin-right: 300px;
  margin-top: 30px;
  background-color: white;
  border-radius: 50px;
  margin-bottom: 30px;
  box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.1);
}
#ch{
    /* color: #024e7f; */
    /* font-weight: bold; */
    margin-left: 30px;
    /* border: none; */ 
    background-color: #024e7f;
       border: none;
}
#ch:hover{
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
        
                <li class="active" id='test7'>
                        <a href="profil.php" id='test6'> <i class="menu-icon fa fa-user"></i>Profil</a>
                    </li>
                    <li class="active">
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

    
<form method="POST" action="" enctype="multipart/form-data" >


      <!-- div1 -->

      <div class="center ">    
<div class="text-center mb-2">
<img class="rounded-circle mt-3" style="width:30%;height:20%"  
src="../uploads/<?=$res['photoA']?>">
<div class="mt-2">
<label class="btn btn-outline-info" id='b1'> 
<!-- icon pen -->
<svg id='b1'  xmlns="http://www.w3.org/2000/svg" width="16" 
height="16" fill="currentColor" id='b1' class="bi bi-pen" viewBox="0 0 16 16">
<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
</svg><!--pen-->
<input  type="file" id="file" name="image" /> 
</label>&nbsp&nbsp&nbsp
<label class="btn btn-outline-info" id='b1'>
  <!-- icon envio -->
  <svg id='b1'  xmlns="http://www.w3.org/2000/svg" 
width="16" height="16" fill="currentColor" 
class="bi bi-upload" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
  <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
</svg><!--envio-->

<input  name='ok' type="submit" />  
</label> </div> </div>
<?php echo "<div class='mt-4 ml-4 mb-3 text-center'>
<h6 id='test3'><b>$nom $prenom</b> </h6>
</div>";

echo "<div class='mt-4 ml-4 mb-4 text-center'>
<b>$email</b>&nbsp&nbsp&nbsp
<button type='submit' name='modifier' class=\"btn btn-outline-info pb-1\" id='b1' >
<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" 
height=\"16\" fill=\"currentColor\" class=\"bi bi-pen\" viewBox=\"0 0 16 16\">
<path d=\"m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z\"/>
</svg><!--envio-->
</button>
</div>";

if (isset($_POST['modifier']) ){
    echo "<div id='test2'><div class=' ml-3 mb-3 text-center'>
    <table><td>
  <input type='text' class=\"form-control\" name='text'
  placeholder='Entrer le nouveau email'></td>
  <td><input id='ch' class='btn text-white rounded' name='up' type='submit' value='Modifier'></td></tr>
  </table></div></div>";  
}

echo "<div class='mt-4 ml-3 mb-5'>
<br>
</div>";
if(isset($_POST['up']) ){
    $text=$_POST['text'];
    $sql1 = "UPDATE administrateur SET email='$text'  where id=$id";
    $req1 = mysqli_query($conn,  $sql1);
}

?>
 


 </div> 
<?php }} }?>

    </form>

<?php 
if (isset($_POST['ok']) && isset($_FILES['image'])) {

	// echo "<pre>";
	// print_r($_FILES['image']);
	// echo "</pre>";
    $img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$error = $_FILES['image']['error'];
    if ($error === 0) {
		    $extension= pathinfo($img_name, PATHINFO_EXTENSION);
			$extension_lc = strtolower($extension);
            $a_ex = array("jpg", "jpeg", "png"); 
     if (in_array($extension_lc, $a_ex)) {
				$new_img_name = uniqid("IMG-", true).'.'.$extension_lc;
                $img_upload_path = '../uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				$sql = "UPDATE administrateur set photoA='$new_img_name'
                where id=$id";
				mysqli_query($conn, $sql);
				
			}}

        }}?>
  <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="../assets/js/plugins.js"></script>
  <script src="../assets/js/main.js"></script>
</body>
</html>