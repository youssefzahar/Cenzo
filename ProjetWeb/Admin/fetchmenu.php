<?php
//fetch.php

$connect = mysqli_connect("localhost", "root", "", "cenzo3.0v");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
 SELECT * FROM menu
 WHERE id LIKE '%".$search."%'
 OR nom_plat LIKE '%".$search."%' 
 OR prix_plat LIKE '%".$search."%' 
 OR image_plat LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM menu ORDER BY id
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
       <th>nom plat</th>
       <th>prix plat</th>
       <th>image plat</th>
       
  
      </tr>
   ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["nom_plat"].'</td>
    <td>'.$row["prix_plat"].'</td>
    <td>'.$row["image_plat"].'</td>
   
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