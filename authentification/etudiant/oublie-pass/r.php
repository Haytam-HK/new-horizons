
<!DOCTYPE html>
<html lang="fr">

<head>

  
    <meta name="description" content="creer compte">
    <meta name="author" content="hk---yd">

    <title>créer nouveau mot de passe</title>
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
</style>
</head>

<body class="body">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Nouveau mot de passe</h1>
                            </div>
                            <form class="user"  method="post" action="#" >
                                <div class="form-group row">
                                    
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" 
                                    name="mail"  placeholder="Adresse Email"  required="true">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                         name='password'  placeholder="Mot de passe" required="true">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"  placeholder="
Confirmer le mot de passe" name="confirmpass"  required="true">
                                    </div>
                                </div>
                    
                                <input type="submit" value="Réinitialisation de mot de passe" name="sbmt" class="btn btn-primary btn-user btn-block color">
                           
                            </form>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>
