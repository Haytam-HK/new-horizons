<?php
session_start();
include("../connexion.php");
require('../fpdf/fpdf.php');
if (isset($_SESSION['idE'])){
    $id=$_SESSION['idE'];
    $semestre=$_POST['classe_semestre_note'];
      $sql = "SELECT *,count(id_etudiant) as total FROM etudiant natural join
       class natural join filiere where id_etudiant=$id"; 
      $req = mysqli_query($conn,$sql);
      $res = mysqli_fetch_assoc($req);
$cl=$res['id_classe'];
      $sql1="SELECT count(id_etudiant) as total FROM etudiant ";
      $req1 = mysqli_query($conn,$sql1);
      $res1 = mysqli_fetch_assoc($req1);
      $sql2="SELECT MAX(valeur) AS Max_note, MIN(valeur) AS Min_note, nom_matiere, confession, valeur FROM note NATURAL JOIN matiere NATURAL JOIN etudiant
      WHERE id_etudiant=$id and semestre=$semestre group by id_matiere";
      $req2 = mysqli_query($conn,$sql2);
      $sql4="SELECT MAX(valeur) AS Max_note, MIN(valeur) AS Min_note , nom_matiere FROM note NATURAL JOIN class NATURAL JOIN etudiant NATURAL JOIN matiere
      WHERE id_classe='$cl' GROUP BY id_matiere";
      $req4=mysqli_query($conn,$sql4);
      // $res4=mysqli_fetch_assoc($req4);

      $sql3="SELECT *  FROM absence WHERE id_etudiant=$id and semestre=$semestre";
      $req3=mysqli_query($conn,$sql3);

$nom=strtoupper($res['nom']);
$prenom=ucfirst($res['prenom']);
$email=$res['login']; 
$classe=$res['nom_classe'];
$filiere=$res['nom_filiere'];
$login=$res['login'];
$E=explode('@',$login);
$codeE=$E[0];
$total=$res1['total'];
$pdf= new FPDF();
$pdf->AddPage();
// $pdf->setfont('arial','B',10);
$pdf->Image('../R.png',58,14,30,29);
$pdf->SetXY(97,20);
$pdf->SetFont('arial','B',20);
$pdf->SetTextColor(2, 78, 127);
$pdf->SetXY(93,20);
$pdf->Cell(97,27,'NEW HORIZONS',0,1,'L');
//   while($res4=mysqli_fetch_assoc($req4)){
      // $pdf->Cell(23,7,$res4["Max_note"],1,0,"C");
      // }
$pdf->SetXY(55,45);
$pdf->SetTextColor(0,0,0);
$pdf->setfont('arial','B',15);
//variable pour zone 1
$r=utf8_decode("Relevé De Note ");
$c="   Classe :                    $classe";
$f=utf8_decode("   Filière :                     $filiere");
$s="   Semestre :                S$semestre";
//zone 1
$pdf->Cell(100,15,$r, 'T L R', 2, "C");
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,5,$c, 'L R', 2, "L");
$pdf->Cell(100,5,$f, 'L R', 2, "L");
$pdf->Cell(100,5,$s, 'L R', 2, "L");
$pdf->Cell(100,5,"", 'L R B', 2, "L");
//zone 2 
// $pdf-SetLn(1);
// $pdf->SetXY(10,100);
$code=utf8_decode('Code d\'étudiant :');
$nombre=utf8_decode('Nombre d\'étudiant :');
$pdf->SetXY(9,92);
$pdf->Cell(75,5,"Nom Complet : $nom $prenom",0,0, "L");
$pdf->Cell(75,5,"$code $codeE",0,0, "L");
$pdf->Cell(60,5,"$nombre $total",0,1, "L");

// zone 3 ici la table de resultat
$pdf->SetXY(10,100);
$matier=utf8_decode('Matière');
$pdf->Cell(37,7,$matier,1,0,"C");
$pdf->Cell(20,7,"Coef.",1,0,"C");
$pdf->Cell(20,7,"Note",1,0,"C");
$pdf->Cell(24,7,"Note x Coef. ",1,0,"C");
$pdf->Cell(23,7,"Note max ",1,0,"C");
$pdf->Cell(23,7,"Note min ",1,0,"C");
$ap=utf8_decode('Appréciations');
$pdf->Cell(40,7,$ap,1,1,"C");
// bd
$cof=0;
$m=0;
while($res2=mysqli_fetch_assoc($req2)){
$pdf->Cell(37,7,utf8_decode($res2["nom_matiere"]) ,1,0,"L");   
$pdf->Cell(20,7,$res2["confession"],1,0,"C");
$pdf->Cell(20,7,round($res2["valeur"],2),1,0,"C");
$moy=number_format($res2["confession"]*$res2["valeur"], 2, '.', '');
$m+=$moy;
$cof+=$res2["confession"];
$pdf->Cell(24,7,$moy,1,1,"C");
}
$pdf->SetXY(111,200);
$pdf->SetY(107);
while($res4=mysqli_fetch_assoc($req4)){
$pdf->SetX(111);
$pdf->Cell(23,7,$res4["Max_note"],1,0,"C");
$pdf->Cell(23,7,$res4["Min_note"],1,0,"C");
$pdf->Cell(40,7,"",1,1,"C");
}
if($cof!=0)
$moynote=$m/$cof;
else
$moynote=$m;

//fin de resultat
$pdf->SetFillColor(220,220,220);
$pdf->Cell(77,7,"Moyenne de note ",1,0,"C",true);
$pdf->Cell(24,7,round($moynote,2),1,0,"C",true);
$pdf->Cell(86,7," ",1,0,"C",true);
// absence
$pdf->SetXY(10,180);
$abs=mysqli_num_rows($req3);
$pdf->Cell(77,10,"   Absence                                                     $abs",1,0,"L");
$pdf->Cell(24,7,"",0,0,"C");
$pdf->Cell(43,7,"Total",1,0,"C");
$pdf->Cell(43,7,round($m),1,1,"C");
$pdf->SetXY(111,187);
$pdf->Cell(43,7,"Moyenne semestre",1,0,"C");
$pdf->Cell(43,7,round($moynote,2),1,1,"C");
$pdf->SetXY(10,192);
$pdf->Cell(77,10,"   Mention","L R T",1,"L");
$pdf->SetFont('arial','I',10);
$tres=utf8_decode("Très Bien");
if($moynote>15.99)
$pdf->Cell(77,7,"   $tres                                                X","L R ",1,"L");
else
$pdf->Cell(77,7,"   $tres                                                ","L R ",1,"L");

if($moynote>13.99 && $moynote<=15.99)
$pdf->Cell(77,7,"   Bien                                                 X","L R ",1,"L");
else
$pdf->Cell(77,7,"   Bien                                                ","L R ",1,"L");

if($moynote>11.99 && $moynote<=13.99)
$pdf->Cell(77,7,"   Assez Bien                                           X","L R ",1,"L");
else
$pdf->Cell(77,7,"   Assez Bien                                            ","L R ",1,"L");

if($moynote>9.99 && $moynote<=11.99)
$pdf->Cell(77,7,"   Passable                                             X","L R",1,"L");
else
$pdf->Cell(77,7,"   Passable                                              ","L R",1,"L");
$pdf->Cell(77,5,"","L R B",1,"L");

// Directeur de centre
$pdf->SetFont('arial','B',10);
$pdf->SetXY(111,196);
$pdf->Cell(86,10,"Le directeur","L R T",2,"C");
$pdf->Cell(86,29,"","R L B",2,"C");
$pdf->output();
}
?>