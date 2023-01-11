<?php 

include ('db_connection/db_connection.php');
if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "delete from foods where id=$id";

    $result = mysqli_query($connect,  $sql);

    if($result){
        header ("Location: home.php");
    }else{
        die(mysqli_error($connect));
    }

}
?>