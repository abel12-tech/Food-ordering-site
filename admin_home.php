<?php include ('db_connection/db_connection.php'); 


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
    
<a href="add_food.html">Add Food</a>



<?php foreach($foods as $food){ ?>

<div class="col-sm-6 col-lg-4 all pizza">
  <div class="box">
    <div>
      <div class="img-box">
        <img src="uploads/<?=$food['image_url']?>" alt="Food image">
      </div>
      <div class="detail-box">
        <h5>
        <?php echo htmlspecialchars($food['name']); ?>
        </h5>
        <p>
        <?php echo htmlspecialchars($food['description']); ?>
        </p>
        <div class="options">
          <h6>
          <?php echo htmlspecialchars($food['price']); ?> Birr
          </h6>
        
           <a href="update_food.php?id=<?php echo $food['id']?>">Update</a>  |  <a href="delete_food.php?id=<?php echo $food['id']?>">Delete</a>
          
        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>
</body>
</html>