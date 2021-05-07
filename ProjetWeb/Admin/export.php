<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "mysql", "Projet_food");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM reclamation";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Sujet</th>  
                         <th>Description</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["sujet"].'</td>  
                         <td>'.$row["description"].'</td>  
                                      </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
