
<!DOCTYPE html>
<html lang="fr">

<head>

  
    <meta name="description" content="creer compte">
    <meta name="author" content="hk---yd">
    <meta charset='UTF-8'>

    <title>Créer Un Compte</title>
    <link rel="apple-touch-icon" href="../img/R.png" width="600px">
    <link rel="shortcut icon" href="../img/R.png">

    <link href="../css/style.css" rel="stylesheet">
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
        margin-top:110px;
    }
</style>
</head>

<body class='body'>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Créer Un Compte</h1>
                            </div>
                            <form class="user"  method="post" action="#" >
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name='nom'  placeholder="Prénom"  required="true">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="prenom" placeholder="Nom" required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="mail"  placeholder="Adresse Email"  required="true">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name='password'  placeholder="Mot de passe" required="true">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"  placeholder="
Confirmer le mot de passe" name="confirmpass"  required="true">
                                    </div>
                                </div>
                    
                                <input type="submit" value="connexion" name="sbmt" class="btn btn-primary btn-user btn-block color">
                           
                            </form>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>
<?php
include("../../connexion.php");
if(isset($_POST["sbmt"])){
    if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["confirmpass"])){
        if(!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["mail"]) && !empty($_POST["password"]) && !empty($_POST["confirmpass"])){
          $prenom=htmlspecialchars($_POST["prenom"]);
          $nom=htmlspecialchars($_POST["nom"]);
          $mail=htmlspecialchars($_POST["mail"]);
          $pass=htmlspecialchars($_POST["password"]);
          $confirm=htmlspecialchars($_POST["confirmpass"]);
          $password=password_hash($pass, PASSWORD_BCRYPT);
          if($pass===$confirm){
              //check mail
            //   $a=strpos($mail,"@");
            //   if($a===false){
            //        echo "<script type='text/javascript'>prompt('pas un email')</script>";"<scri";
            //        header('location:creer-compte.php');
            //     }
                //SQL
                //1: check if email already exist
                $SQL1="select * from administrateur where email='$mail'";
                $req=mysqli_query($conn,$SQL1);
            if(mysqli_num_rows($req)>0){
                echo "<script type='text/javascript'>alert('l'email existe déjà')</script>";
                header('location:creer-compte.php');
                break;
            } else{
                //2: add user
                
               
                $SQL2="INSERT INTO administrateur(nom,prenom,photoA,email,password)
                      VALUES('$nom','$prenom','k.jpg','$mail','$password')";
                if(mysqli_query($conn,$SQL2))
              { 
            echo "<script type='text/javascript'>alert('compte cree')</script>";
                header('location:../index/index.php');
               } else
                echo mysqli_error($conn);
                }
                mysqli_close($conn);
            }
          }
          else
           echo "<script type='text/javascript'>alert('l'email existe déjà')</script>";
        }
    }

?>