<?php 
 if($_SESSION['id']){

include ('db_connection/db_connection.php');

$food_id = $_GET['id'];


$sql = "select * from foods where id = $food_id";
$result = mysqli_query($connect, $sql);
$food = mysqli_fetch_assoc($result);

$name = $food['name'];
$price = $food['price'];
$description = $food['description'];
$image = $food['image_url'];


if (isset($_POST['update']) && isset($_FILES['image']) ) {
	

	$name = mysqli_real_escape_string($connect, $_POST['name']);
    $price = mysqli_real_escape_string($connect, $_POST['price']);
	$description = mysqli_real_escape_string($connect, $_POST['description']);

	$img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$error = $_FILES['image']['error'];


	$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
	$img_ex_lc = strtolower($img_ex);

	$allowed_exs = array("jpg", "jpeg", "png"); 

	if (in_array($img_ex_lc, $allowed_exs)) {
		$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
		$img_upload_path = "uploads/".$new_img_name;
		move_uploaded_file($tmp_name, $img_upload_path);

		// Update
		$sql = "UPDATE foods SET id=$food_id, name='$name', price='$price', description='$description', image_url='$new_img_name' WHERE id=$food_id"; 

		mysqli_query($connect, $sql);
		if ($result){
			header("Location: home.php");

		}else{
			die(mysqli_error($connect));

		}
		
	}else {
		echo "You can't upload files of this type";
	}
}
 }else{
	echo  "You are not allowed to update";
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderMyFood</title>
</head>
<body>

<h4>Update Food</h4>
<form method="POST" enctype="multipart/form-data">

<label for="">Name</label>
<input type="text" name="name" value="<?php echo "$name"; ?>">



<label for="">Price</label>
<input type="number" name="price" value="<?php echo "$price"; ?>">

<label for="">Description</label>
<textarea type="text" name="description" value="<?php echo "$description"; ?>"> <?php echo "$description"; ?></textarea>


Current image: <?php echo "$image"; ?>
<label for="">Image</label>

<input type="file" name="image" value="<?php echo "$image"; ?>"> 




<input type="submit" name="update" value="Save">


</form>

</body>
</html>

