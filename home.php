<?php  session_start();  ?>

<!DOCTYPE html>
<html> 
 
<?php  
 if($_SESSION['id']){
    include ('templates/header_home.php');



    include('admin_home.php');



    include ('templates/footer_home.php');
 }else{
   header("Location: 404.html");
     
 }

?>


</html>