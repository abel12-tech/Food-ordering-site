<?php
include ('db_connection/db_connection.php');


$sql = "SELECT * FROM orders ORDER BY id DESC ";
$result = mysqli_query($connect,  $sql);
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);


mysqli_free_result($result);
//mysqli_close($connect);

?>
    <?php include ('templates/header_home.php');

?>

<main>
			<div class="head-title">
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>customer Name</th>
								<th> Order Date</th>
                                <th> Ordered Foods</th>
								<th>Quantity</th>
                                <th>Price</th>
							</tr>
						</thead>
						<tbody>
                        <?php

                        foreach($orders as $order)
                        {
                           ?>
							<tr>
								<td><?php echo $order['name']?></td>
								<td><?php echo $order['arr_date']?></td>
                                <td>
                                    <?php
                                    include ('db_connection/db_connection.php');
                                    $order_id = $order['id'];

                                    $sql = "SELECT * FROM ordered_food WHERE order_id='$order_id'";
                                    $result = mysqli_query($connect,  $sql);
                                    $ordered_food = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    mysqli_free_result($result);

//                                   mysqli_close($connect);
          $food_id_array = array();
foreach ($ordered_food as $item){
     array_push($food_id_array,$item['food_id']);
}

$sql = "SELECT * FROM foods ORDER BY id DESC ";
$result = mysqli_query($connect,  $sql);
$foods = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($connect);
for($i=0;$i<count($food_id_array); $i++){
    $item = $food_id_array[$i];
    foreach($foods as $food){
        if( $item == $food['id']){
              $food_name = $food['name'] ;

           echo "$food_name ";
           if(!($i==count($food_id_array)-1 )){
               echo ",";
           }

        }
 }

}

                                    ?>


                                </td>
								<td><?php
                                    for($i=0;$i<count($food_id_array); $i++){
                                        $item = $food_id_array[$i];
                                        foreach($ordered_food as $food){

                                            if( $item == $food['food_id']){
                                                $quantity = $food['food_quantity'] ;

                                                echo "$quantity ";
                                                if(!($i==count($food_id_array)-1 )){
                                                    echo ",";
                                                }

                                            }
                                        }

                                    }

                                    ?></td>
                                <td><?php  $price = $order['price'] ;

                                 echo "$price Birr";
                                ?></td>
							</tr>


							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</main>


<?php
    include ('templates/footer_home.php');
?>