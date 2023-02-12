<?php 
include ('limit_traffic.php');


session_start();
 if($_SESSION['id']){ 

if (isset($_POST['submit']) && isset($_FILES['image'])) {
	include ('db_connection/db_connection.php');


	$name = mysqli_real_escape_string($connect, $_POST['name']);
    $price = mysqli_real_escape_string($connect, $_POST['price']);
	$description = mysqli_real_escape_string($connect, $_POST['description']);

	$img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$error = $_FILES['image']['error'];

	if ($error === 0) {
		if ($img_size > 1000000) {
			echo "Sorry, your file is too large.";
		    // header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$img_upload_path = "uploads/".$img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO foods(name, price, description, image_url) 
				        VALUES('$name', '$price', '$description', '$img_name')";
				mysqli_query($connect, $sql);
				header("Location: home.php");
			}else {
				echo "You can't upload files of this type";
		        // header("Location: home.php");
			}
		}
	}else {
		echo "unknown error occurred!";
		// header("Location: home.php?error");
	}

}else {
	header("Location: home.php");
}
 }else{
	header("Location: 404.html");
 }



