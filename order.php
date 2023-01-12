<!DOCTYPE html>
<html>
<?php
//include('db_connection/db_connection.php');
//$order_id = 0;
//
//   $food_array = $_POST['food_id'];
//   $quantity_array  = $_POST['quantity'];
//    $food_array= explode (",", $food_array);
//    $quantity_array = explode(",",$quantity_array);
//    $ordered_food = array_combine($food_array,$quantity_array);
//
//
//
//    $name = $_POST['name'];
//    $phone_number = $_POST['phone_number'];
//    $city = $_POST['city'];
//    $address = $_POST['address'];
//    $arr_date = $_POST['arr_date'];
//
//    $sql = "INSERT INTO orders(name,phone_number,city,address,arr_date)
//				        VALUES('$name', '$phone_number','$city','$address','$arr_date')";
//
//
//    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//    $mysqli = new mysqli("localhost", "baty", "baty0393", "food_ordering");
//    $mysqli->query($sql);
//   $order_id = $mysqli->insert_id;

//
//foreach($food_array as $item){
//
//
//    $food_quantity = $ordered_food[$item];
//    $food_id = $item;
//    $sql = "INSERT INTO ordered_food(food_id,order_id,food_quantity)
//			        VALUES('$food_id', '$order_id','$food_quantity')";
//    $mysqli->query($sql);
//
//}


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
                    <form action="orders.php" method="POST">
                        <div>
                            <input type="text" class="form-control" name="name" placeholder="Your Name" required/>
                        </div>
                        <div>
                            <input type="text" class="form-control"  name="phone_number" placeholder="Phone Number" required/>
                        </div>
                        <div>
                            <input type="city" class="form-control" name="city" placeholder="City" value="Jimma"/>
                        </div>
                        <input type="text" class="form-control" name="address" placeholder="Address" required/>
                        <div>
                        </div>
                        <input type="date" name="arr_date" class="form-control" required/>
                        <div>
                        </div>
                        <input type="hidden" class="form-control  quantity" name="quantity" />
                        <div>
                        </div>
                        <input type="hidden" class="form-control food_id" name="food_id" placeholder="Street name" />
                        <div>
                        </div>
                </div>
                <input type="hidden" class="form-control total_food_price" name="price" />
                <div>
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


    <script src="js/jquery-3.4.1.min.js"></script>



<script src="js/bootstrap.js"></script>

<script src="js/custom.js"></script>



</html>
