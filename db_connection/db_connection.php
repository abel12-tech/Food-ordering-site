


<?php      
    $host = "localhost";  
    $user = "baty";  
    $password = 'baty0393';  
    $db_name = "food_ordering";  
      
    $connect = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  