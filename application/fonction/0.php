<?php
// require("../../101/0.php");
session_start();
include("../connexion.php");

function email(){
    if(!isset($_SESSION["emails"]))
    $_SESSION["emails"]=array();
    else{
        foreach($_SESSION["emails"] as $ty => $tr){
            $tt=0;
            include("../connexion.php");
            $SQL28="SELECT * FROM etudiant";
            $req28=mysqli_query($conn,$SQL28);
            if(!$req28)
            echo mysqli_error($conn);
            while($res28=mysqli_fetch_assoc($req28)){
                $dt=$res28["login"];
                if($tr==$dt){
                $tt=1;
            }
            }
            if($tt==0)
            unset($_SESSION['emails'][$ty]);
        }
    }
    do{
    $a=rand(65,90);
    $b=chr($a);
    $c=rand(100000000,999999999);
    $d=$b.$c."@horizons.acm";
    }
    while(in_array($d,$_SESSION["emails"]));
    array_push($_SESSION["emails"],$d);
    return $d;
    }
    //-------------------------------------------
    // function that create a password for users
    function password(){
    if(!isset($_SESSION["passwords"]))
    $_SESSION["passwords"]=array();
    else{
        foreach($_SESSION["passwords"] as $ty => $tr){
            $tt=0;
            include("../connexion.php");
            $SQL29="SELECT * FROM etudiant";
            $req29=mysqli_query($conn,$SQL29);
            if(!$req29)
            echo mysqli_error($conn);
            while($res29=mysqli_fetch_assoc($req29)){
                $dt=$res29["password"];
                if(password_verify($tr, $dt)){
                $tt=1;
            }
            }
            if($tt==0)
            unset($_SESSION['passwords'][$ty]);
        }
    }
    do{
    $d=chr(rand(65,90)).chr(rand(65,90)).rand(65,90).rand(65,90).chr(rand(65,90)).chr(rand(65,90)).rand(65,90).rand(65,90);
    }
    while(in_array($d,$_SESSION["passwords"]));
    array_push($_SESSION["passwords"],$d);
    return $d;
    }
?>