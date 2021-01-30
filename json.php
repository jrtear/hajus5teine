<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Mysql to JSON</title>  
      </head>  
      <body>  
           <?php   
           $connect = mysqli_connect("localhost", "root", "", "hajus5");  
           $sql = "SELECT * FROM film";  
           $result = mysqli_query($connect, $sql);  
           $json_array = array();  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $json_array[] = $row;  
           }  
           /*echo '<pre>';  
           print_r(json_encode($json_array));  
           echo '</pre>';  */
           echo json_encode($json_array);  
           ?>  
      </body>  
 </html>  