<?php
$ps="haytam";
$passwordet=password_hash($ps, PASSWORD_BCRYPT);
echo "$passwordet<br>";
if(password_verify($ps,'$2y$10$WbLztTcnGCj5vaxjv2J9M.p0kwz5ulyusu0r/YL6.FUljgFFHIb5y'))
echo "True";
else
echo "False";
$ps="haytam";
$passwordet=password_hash($ps, PASSWORD_BCRYPT);
echo "$passwordet<br>";
if(password_verify($ps,$hash))
echo "True";
else
echo "False";
//jjjjj
?>
<div class="center ">    
<div class="mb-2 ">
<img class="rounded-circle mt-3 float-right" style="width:30%;height:20%"  
src="../uploads/<?=$res['photoE']?>">
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
<b>$email</b>&nbsp&nbsp&nbsp</div>
<input type='submit' value=' Information de récupération le mot de passe'>
ddd

dddd
";

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
    $sql1 = "UPDATE etudiant SET email='$text'  where id=$id";
    $req1 = mysqli_query($conn,  $sql1);
}

?>
 


 </div> 

?>