<?php
session_start();
include("../../connexion.php");
if (isset ($_POST['ok']))
{
    if(!empty($_POST['mail']) and !empty($_POST['password'])){
    $mail=$_POST['mail'];
    $pass=$_POST['password'];
   $sql="SELECT * From administrateur";
   $req=mysqli_query($conn,$sql);
   while($res=mysqli_fetch_assoc($req)){
      if ($mail==$res['email'] and password_verify($pass,$res['password'])){
          $_SESSION['id']=$res['id'];
          $_SESSION["id_administrateur_login"]=$res["id"];
      header('location:../../../application/fonction/profil.php');
    }else {
      echo "<script type='text/javascript'>alert('mail ou motd de passe est incorect')</script>";
     } 
  }

}
else {
    echo "<script type='text/javascript'>alert('remlire tous les champs')</script>";
   }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>

<meta name="description" content="Interface App">

<meta charset="utf-8">
    <meta name="description" content="connexion">
    <link rel="apple-touch-icon" href="../img/R.png" width="600px">
    <link rel="shortcut icon" href="../img/R.png">
    <meta name="author" content="hk---yd">
    <title>Espace Administratif</title>
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
</style>

</head>
<body class="body">

    <div class="container mt-5">
     <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                 <div class="card-body p-0">
                      <div class="row">
                           <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                     <div class="col-lg-6">
                          <div class="p-5">
                              <div class="text-center">
                                  <h1 class="h4 text-gray-900 mb-4">Espace Administratif</h1>
                              </div>
                                <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                           
                                             name="mail"   placeholder="login" required="true">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                              name="password" placeholder="Mot de passe" required="true">
                                        </div>
                                    
                                        <input type="submit" name="ok" value="connexion" class="btn fs-2 text-white color btn-user btn-block">
                                    </form>
                                     <hr>
                                      <div class="text-center">
                                        <a id='color' class="small" href="../oublie-pass/j.php">Mot de passe oublié ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a id='color' class="small" href="../creer-compte/creer-compte.php">Créer un compte</a>
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