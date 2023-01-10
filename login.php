


<?php      
     include ('db_connection/db_connection.php');
include ('utils.php');
     session_start();
    $hashed_password = "";
    $id = 0;
    $username = $_POST['username'];  
    $password = $_POST['password'];  


      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($connect, $username);  

        $password = mysqli_real_escape_string($connect, $password);

        $sql = "select *from users where username = '$username'";
        $result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    // OUTPUT DATA OF EACH ROW
while($row = mysqli_fetch_assoc($result)) {
 $hashed_password =  $row["password"];
 $id = $row['id'];
}

if(check_password($password,$hashed_password)){

$_SESSION['id']= $id;
header('location: home.php');
}
else{
    echo "Your password is not correct !";
}
}
?>  


<section class="container ">
		<h4 class="center">Login</h4>
		<form action="login.php" method="POST">
			
	
			<label style="font-size: medium;">Username:</label>
			<input type="text" name="username" value="">

			<label style="font-size: medium;">Your Password:</label>
			<input type="password" name="password" value="">

			<div class="center"> 
				<input type="submit" name="submit" class="btn brand" value="login" >
			</div>

		</form>
	</section>
    
