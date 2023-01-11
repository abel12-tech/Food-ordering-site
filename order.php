<!DOCTYPE html>
<html>
<?php
try{
   $food_array = $_POST['food_id'];
   $quantity_array  = $_POST['quantity'];
    $food_array= explode (",", $food_array);
    $quantity_array = explode(",",$quantity_array);
    $orderd_food = array_combine($food_array,$quantity_array);
    print_r($orderd_food);
}
catch (Exception $e){
    echo "There is an error during ordering your food ";
}
$order_id = 5;
foreach ($orderd_food as $food_id=> $quan){
//    echo "$order_id  -- $food_id => $quan <br>";
}


?>

<?php include ('db_connection/db_connection.php');

//
//$sql = "SELECT * FROM foods ORDER BY id DESC ";
//$result = mysqli_query($connect,  $sql);
//$foods = mysqli_fetch_all($result, MYSQLI_ASSOC)


?>

<?php include ('templates/header.php') ?>

<!--<form action="order.php" method="POST">-->
<!--    <label for="">name</label>-->
<!--    <input type="text" name="name">-->
<!--    <input id="food_id" type="hidden" name="food_id">-->
<!--    <input id="quantity" type="hidden" name="quantity" >-->
<!--    <input type="submit" value="order">-->
<!--</form>-->

<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2><a href="index.php">Home</a></h2>
        </div>
        <div class="heading_container">
            <h3>
                Order Info
            </h3>
            <div>Total price:<span class=" ml-1 mr-1 total-cart"></span> <em>Birr</em></div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form_container">
                    <form action="order.php" method="POST">
                        <div>
                            <input type="text" class="form-control" placeholder="Your Name" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Phone Number" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="City" />
                        </div>
                        <input type="text" class="form-control" placeholder="Address" />
                        <div>
                        </div>
                        <input type="text" class="form-control" placeholder="Street name" />
                        <div>

                        </div>
                        <div>
                            <input type="date" class="form-control">
                        </div>
                        <div class="btn_box">
                            <button class="btn btn-warning">
                                Order Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>




<?php include ('templates/footer.php') ?>
<script>
    document.getElementById("food_id").value = "1,3,5,6,4";
    document.getElementById("quantity").value = "4,6,7,7,4";

    <script src="js/jquery-3.4.1.min.js"></script>



<script src="js/bootstrap.js"></script>

<script src="js/custom.js"></script>
</script>


</html>
