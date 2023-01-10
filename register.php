<?php
include ('db_connection/db_connection.php');
include('utils.php');
try{
$username = $_POST['username'];
$password = create_password($_POST['password']);

    $sql = "INSERT INTO users (username,password)
VALUES ('$username', '$password')";
    $result = mysqli_query($connect, $sql);
    echo $result;

}
catch (Exception $e){
    echo "<p> there is an error in your input </p>";
}
