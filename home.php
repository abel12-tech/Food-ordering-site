<?php  session_start();  ?>

<!DOCTYPE html>
<html>

<?php  
 if($_SESSION['id']){
    include ('templates/header_home.php');
    echo "<h4> This is dashboard </h4>";


    echo " Orders <br>
     <table>
     <th>Order</th>
     </table>
    
    ";



    include ('templates/footer_home.php');
 }else{
    echo "You are not allowed";
 }

?>


</html>