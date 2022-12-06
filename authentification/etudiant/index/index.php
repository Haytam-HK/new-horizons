<?php
session_start();
include("../../connexion.php");
if (isset ($_POST['ok']))
{
    if(!empty($_POST['mail']) and !empty($_POST['password'])){
    $mail=$_POST['mail'];
    $password=$_POST['password'];
   $sql="SELECT * From etudiant";
   $req=mysqli_query($conn,$sql);
   while($res=mysqli_fetch_assoc($req)){
      if ($mail==$res['login'] and $password==$res['password']){
          $_SESSION['idE']=$res['id_etudiant'];
          $_SESSION['idC']=$res['id_classe'];
          $_SESSION["id_etudiant_login"]=$res["id_etudiant"];
      header('location:../../../appE/fonction/profil.php');
    }else {
      echo "<script type='text/javascript'>alert('Mail ou mot de passe est incorect')</script>";
     }
  }

}
else {
    echo "<script type='text/javascript'>alert('remlire tous les champs')</script>";
   }
}
// print_r($_SESSION["passwords"]);
?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <link rel="shortcut icon" href="../img/img1.png">
    <meta name="description" content="connexion">
    <meta name="author" content="hk---yd">
    <title>Espace Etudiant</title>
    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <style>
   .body{
    background-color: #024e7f;
   }
   .color{
        background-color: #024e7f;
        border: none;

    }
    .color:hover{
        background-color:#003658;
    box-shadow:unset; 
    }
    #color{
        color: #024e7f;
    }
    .container{
        margin-top:65px;
    }
</style>
</head>
<body class="body">

    <div class="container">
     <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                 <div class="card-body p-0">
                      <div class="row">
                           <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                     <div class="col-lg-6">
                          <div class="p-5">
                              <div class="text-center">
                                  <h1 class="h4 text-gray-900 mb-4">Espace Etudiant</h1>
                              </div>
                                <form class="user" method="post" action='#'>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" 
                                                placeholder="e-mail" name='mail' required="true">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name='password' placeholder="Mot de passe" required="true">
                                        </div>
                                    
                                        <input type="submit" value="connexion" name='ok' class="btn fs-2 text-white color btn-user btn-block">
                                    </form>
                                     <hr>
                                      <div class="text-center">
                                        <a class="small" href="../oublie-pass/j.php">Mot de passe oublié ?</a>
                                    </div>
                                   
                          </div>
                     </div>


                      </div>
                    
                </div>
                
            </div>
            
        </div>
        
     </div>
        
    </div>
    
</body>
</html>