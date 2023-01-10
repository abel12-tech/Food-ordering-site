


<?php      
     include ('db_connection/db_connection.php');

     session_start();    
     include ('db_connection/db_connection.php');  

    $username = $_POST['username'];  
    $password = $_POST['password'];  


      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($connect, $username);  

        $password = mysqli_real_escape_string($connect, $password);

        $sql = "select *from users where username = '$username' and password = '$password'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1){

            header('location: home.php');
        }
        else{

			echo "Incorrect username or password";

        }

        $password = mysqli_real_escape_string($connect, $password);  
      
        $sql = "select *from users where username = '$username' and password = '$password'";  
        $result = mysqli_query($connect, $sql);  

        if ($result->num_rows >0 ) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id']= $row['id'];
            
            header('location: home.php');
        }else{
         echo "wrong";
         
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
    
