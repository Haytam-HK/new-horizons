<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>New Horizons</title>
    <link rel="apple-touch-icon" href="img/R.png" width="600px">
    <link rel="shortcut icon" href="img/R.png">
    <!-- Latest compiled and minified CSS -->
    <link rel=”stylesheet” href=”https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css”rel=”nofollow” integrity=”sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm” crossorigin=”anonymous”>
    <style>
        
* {
    box-sizing: border-box;
    margin:0;
    padding:0;
  
  }
  
  .Mr{
  width: 100%;
  height: 100%;
  padding-bottom: 444px;
  background: rgb(0, 38, 153);
  
  }
  
  #pic1{
  height: 300px;
  width: 300px;
  border-radius: 50%;
  margin-top: 115px;
  margin-left: 250px;
  }
  #pic2{
  height: 300px;
  width: 300px;
  border-radius: 50%;
  margin-top: 115px;
  margin-right: 250px;
  }
  #pic1:hover{
  height: 310px;
  width: 310px;
  box-shadow: -10px 5px 15px #024e7f;
  }
  #pic2:hover{
  height: 310px;
  width: 310px;
  box-shadow: 10px 5px 15px #024e7f;
  }
  
  header
  {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  padding: 40px 100px;
  z-index: 1000;
  display: flex;
  justify-content: space-between;
  align-items: center;
  }
  
  .showcase video
  {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: 0.8;
  }
  
  .showcase{
  width: 100%;
  height: 100%;
  background: #0d43a863;
  mix-blend-mode: overlay;
  }
#LOGO{
    width :130px;
    background-color:none;
    margin-left:600px;
    opacity:99%;
  }
#hey{
    background-color:rgb(0, 38, 153);
    padding-top:15px;
  }
h3{
    margin-top:-22px;
    opacity:99%;
    font-family:sans-serif;
    letter-spacing: 2px;
    color: #024e7f;
    font-size: 13px;
    font-weight: bold;
    text-align: Center;
    margin-left: 58px;
}
    </style>
    </head>

<body>
    <section class="showcase">
        <video src="img/59.mp4" muted loop autoplay class="video"></video>
        <div id='hey'><img src="img/R.png" alt="LOGO" id='LOGO'><br><h3>NEW HORIZONS</h3></div>
        <div class="Mr">
        <header>
            <a href="authentification/administratif/index/index.php"><img id="pic1" src="img/1.jpeg" alt="administratif"></a>  
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="authentification/etudiant/index/index.php"><img id="pic2" src="img/2.jpeg" alt="etudiant" ></a>
        </header>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>