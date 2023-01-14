<?php 
session_start(); 
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
		$img_upload_path = "uploads/".$img_name;
		move_uploaded_file($tmp_name, $img_upload_path);

		// Update
		$sql = "UPDATE foods SET id=$food_id, name='$name', price='$price', description='$description', image_url='$img_name' WHERE id=$food_id"; 

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
	header("Location: 404.html");
 }
?> 


<!DOCTYPE html>
<html lang="en">

	<?php  include ('templates/header_home.php'); ?>


<div class="container">
<?php if($food): ?>
<div class="table-data">
				<div class="order">
<div class="head"> 
						<h3>Update Food</h3>
					</div>
                    <form  method="POST" enctype="multipart/form-data" class="add-food">
            
                        <div class="form-group">
                          <label for="food-name">Food</label>
						  <input type="text" name="name" class="form-control" value="<?php echo "$name"; ?>">
                        </div>
                        <div class="form-group">
                          <label for="price">Price</label>
                          <input type="number" class="form-control" name="price" value="<?php echo "$price"; ?>" >
                        </div>

                        <div class="form-group">
                          <label for="food-name">Description</label>

						  <textarea type="text" class="form-control" name="description" value="<?php echo "$description"; ?>"> <?php echo "$description"; ?></textarea>
                        </div>

                        <div class="form-group">
						Current image: <?php echo "$image"; ?>
                            <label for="image">Image</label>
                            <input type="file" class="form-control"  name="image" value="<?php echo "$image"; ?>"> 

                        </div>
						<input type="submit" name="update" value="Save" class="btn btn-primary mt-4"></input>
                      </form>
				</div>
</div>
<?php else: ?>
	<h3>No such food</h3>

	<?php endif; ?>
</div>



<?php  include ('templates/footer_home.php'); ?>
</html>

