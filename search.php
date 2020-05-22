<?php  
 $connect = mysqli_connect("localhost", "root", "", "login");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM user WHERE email LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<b><li >'.$row["email"].'</li></b>';  
           }  
      }  
      else  
      {  
       echo"<b>No results Found </b>";
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  