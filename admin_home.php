<?php 
include ('limit_traffic.php');
include ('db_connection/db_connection.php'); 


$sql = "SELECT * FROM foods ORDER BY id DESC ";
$result = mysqli_query($connect,  $sql);
$foods = mysqli_fetch_all($result, MYSQLI_ASSOC);


mysqli_free_result($result);
mysqli_close($connect);


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




		<!-- MAIN -->
	
		<main>
			<div class="head-title">
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>List of Foods</h3>
					</div>


                      <div class="table-data border-0">
                        <?php foreach($foods as $food){ ?>
                        <div class="card mt-5" style="width: 18rem;">
                            <img src="uploads/<?=$food['image_url']?>" class="card-img-top" alt="Food Image">
                            <div class="card-body">
                              <h5 class="card-title"><?php echo htmlspecialchars($food['name']); ?></h5>
                              <h6><?php echo htmlspecialchars($food['price']); ?> Birr</h6>
                              <p class="card-text"><?php echo htmlspecialchars($food['description']); ?></p>
                              <a  href="update_food.php?id=<?php echo $food['id']?>" class="btn btn-primary">Update</a> <span><a href="delete_food.php?id=<?php echo $food['id']?>" class="btn btn-danger">Delete</a></span>
                            </div>
                          </div>
                          <?php } ?>

                      </div>
                    
				</div>
			</div>




      
		</main>
        
        
        <!-- MAIN -->
	</section>
	<!-- CONTENT -->




</body>
</html>