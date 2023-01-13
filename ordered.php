<?php
include ('db_connection/db_connection.php');


$sql = "SELECT * FROM orders ORDER BY id DESC ";
$result = mysqli_query($connect,  $sql);
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);


mysqli_free_result($result);
mysqli_close($connect);

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
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
                        <?php

                        foreach($orders as $order)
                        { $i++?>
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

                                   mysqli_close($connect);
          $food_id_array = [];
foreach ($ordered_food as $item){
     $food_id_array +=  $item['food_id'];
}



                                    ?>


                                </td>
								<td><span class="status completed">Completed</span></td>
							</tr>


							<?php }?>
<!--							<tr>-->
<!--								<td>Bcvbnjmk</td>-->
<!--								<td>01-10-2021</td>-->
<!--								<td><span class="status pending">Pending</span></td>-->
<!--							</tr>-->
<!--							<tr>-->
<!--								<td>Bcvbnjmk</td>-->
<!--								<td>01-10-2021</td>-->
<!--								<td><span class="status process">Process</span></td>-->
<!--							</tr>-->
<!--							<tr>-->
<!--								<td>Bcvbnjmk</td>-->
<!--								<td>01-10-2021</td>-->
<!--								<td><span class="status pending">Pending</span></td>-->
<!--							</tr>-->
<!--							<tr>-->
<!--								<td>Bcvbnjmk</td>-->
<!--								<td>01-10-2021</td>-->
<!--								<td><span class="status completed">Completed</span></td>-->
<!--							</tr>-->
						</tbody>
					</table>
				</div>
			</div>
		</main>


<?php
    include ('templates/footer_home.php');
?>