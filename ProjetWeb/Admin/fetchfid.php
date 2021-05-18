<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "cenzo3.0v");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM fidelite 
  WHERE id LIKE '%".$search."%'
  OR nom_client LIKE '%".$search."%' 
  OR prenom_client LIKE '%".$search."%' 
  OR nbr_point LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM fidelite ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>ID</th>
     <th>Nom Clientt</th>
     <th>Prfenom Client</th>
     <th>Nombre de Points</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
   <td>'.$row["id"].'</td>
    <td>'.$row["nom_client"].'</td>
    <td>'.$row["prenom_client"].'</td>
    <td>'.$row["nbr_point"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>