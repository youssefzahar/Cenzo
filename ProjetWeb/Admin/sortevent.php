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
 $query = "SELECT * FROM evenement ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $result = mysqli_query($connect, $query);  
 $output .= '  
 <table class="table table-bordered">  
      <tr>  
           <th><a class="column_sort" id="id" data-order="'.$order.'" href="#">ID</a></th>  
           <th><a class="column_sort" id="nom_evenement" data-order="'.$order.'" href="#">Nom Evenement</a></th>  
           <th><a class="column_sort" id="date_debut" data-order="'.$order.'" href="#">Date Debut</a></th>  
           <th><a class="column_sort" id="date_fin" data-order="'.$order.'" href="#">Date Fin</a></th>
           <th><a class="column_sort" id="IMAGE" data-order="'.$order.'" href="#">Image</a></th>  

      </tr>  
 ';  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
      <tr>  
           <td>' . $row["id"] . '</td>  
           <td>' . $row["nom_evenement"] . '</td>  
           <td>' . $row["date_debut"] . '</td>  
           <td>' . $row["date_fin"] . '</td>
           <td>' . $row["IMAGE"] . '</td>  

      </tr>  
      ';  
 }  
 $output .= '</table>';  
 echo $output;  
 ?>  