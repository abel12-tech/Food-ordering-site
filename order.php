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
    echo "$order_id  -- $food_id => $quan <br>";
}


?>
<html>
<head>
    <title>
        order page
    </title>
</head>
<body>
<form action="order.php" method="POST">
    <label for="">name</label>
    <input type="text" name="name">
    <input id="food_id" type="hidden" name="food_id">
    <input id="quantity" type="hidden" name="quantity" >
    <input type="submit" value="order">
</form>
</body>
<script>
    document.getElementById("food_id").value = "1,3,5,6,4";
    document.getElementById("quantity").value = "4,6,7,7,4";


</script>
</html>
