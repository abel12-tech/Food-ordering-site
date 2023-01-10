<?php  session_start();  ?>

<!DOCTYPE html>
<html>

<?php  
 if($_SESSION['id']){
    include ('templates/header_home.php');
    echo "<h4> This is dashboard </h4>";


    include('admin_home.php');



    include ('templates/footer_home.php');
 }else{
    echo "You are not allowed";
 }

?>


</html>