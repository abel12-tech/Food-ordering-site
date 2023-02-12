
<?php
$order_id = 0;

$food_array = $_POST['food_id'];
$quantity_array  = $_POST['quantity'];
$food_array= explode (",", $food_array);
$quantity_array = explode(",",$quantity_array);
$ordered_food = array_combine($food_array,$quantity_array);




$name = $_POST['name'];
$phone_number = $_POST['phone_number'];
$city = $_POST['city'];
$address = $_POST['address'];
$arr_date = $_POST['arr_date'];
$price = $_POST['price'];
$transaction_id  = $_POST['transaction_id'];

$sql = "INSERT INTO orders(name,phone_number,city,address,arr_date,price, transaction_id)
				        VALUES('$name', '$phone_number','$city','$address','$arr_date','$price', '$transaction_id')";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli("localhost", "baty", "baty0393", "food_ordering");
    $mysqli->query($sql);
   $order_id = $mysqli->insert_id;


foreach($food_array as $item){


    $food_quantity = $ordered_food[$item];
    $food_id = $item;
    $sql = "INSERT INTO ordered_food(food_id,order_id,food_quantity)
			        VALUES('$food_id', '$order_id','$food_quantity')";
    $mysqli->query($sql);

}
header("Location: index.php");