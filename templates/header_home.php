
<?php 
session_start(); 


include ('db_connection/db_connection.php');

$user_id = $_SESSION['id'];

$sql = "select * from users where id = $user_id";
$result = mysqli_query($connect, $sql);

$user = mysqli_fetch_assoc($result);
 
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->

	<link rel="stylesheet" href="./Frontend/restrauntDashboard/boxicons/css/boxicons.min.css">
	<link rel="stylesheet" href="./Frontend/restrauntDashboard/style.css">
	<link rel="stylesheet" href="./Frontend/css/bootstrap.css">

	<title>OrderMyFood | Restaurant</title>
</head>
<body>
 
	<!-- SIDEBAR -->
	<section id="sidebar">
		<p class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text"> <?php 
			
			echo $user['username']; 
			 
			?> </span>
		</p>
		<ul class="side-menu top">
			<li class="active">
				<a href="home.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="add_food.html">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Add food</span>
				</a>
			</li>
			<li>
				<a href="ordered.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Orders</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->


		<!-- CONTENT -->
		<section id="content">
			<!-- NAVBARindex.html -->
			<nav>
				<i class='bx bx-menu' ></i>
	
				<a href="logout.php" >
					Logout
				</a>
			</nav>
			<!-- NAVBAR -->