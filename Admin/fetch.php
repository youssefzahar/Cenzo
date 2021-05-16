<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "projet_food");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM evenement 
  WHERE id LIKE '%".$search."%'
  OR nom_evenement LIKE '%".$search."%' 
  OR date_debut LIKE '%".$search."%' 
  OR date_fin LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM evenement ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>id</th>
     <th>date debut</th>
     <th>City</th>
     <th>date fin</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
   <td>'.$row["id"].'</td>
    <td>'.$row["nom_evenement"].'</td>
    <td>'.$row["date_debut"].'</td>
    <td>'.$row["date_fin"].'</td>
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