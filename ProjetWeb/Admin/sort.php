<?php  
 //sort.php  
 $connect = mysqli_connect("localhost", "root", "", "cenzo3.0v");  
 $output = '';  
 $order = $_POST["order"];  
 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  
 $query = "SELECT * FROM fidelite ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $result = mysqli_query($connect, $query);  
 $output .= '  
 <table class="table table-bordered">  
      <tr>  
           <th><a class="column_sort" id="id" data-order="'.$order.'" href="#">ID</a></th>  
           <th><a class="column_sort" id="nom_client" data-order="'.$order.'" href="#">Nom Client</a></th>  
           <th><a class="column_sort" id="prenom_client" data-order="'.$order.'" href="#">Prenom Client</a></th>  
           <th><a class="column_sort" id="nbr_point" data-order="'.$order.'" href="#">Nombre de Points</a></th>  
      </tr>  
 ';  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
      <tr>  
           <td>' . $row["id"] . '</td>  
           <td>' . $row["nom_client"] . '</td>  
           <td>' . $row["prenom_client"] . '</td>  
           <td>' . $row["nbr_point"] . '</td>  
      </tr>  
      ';  
 }  
 $output .= '</table>';  
 echo $output;  
 ?>  