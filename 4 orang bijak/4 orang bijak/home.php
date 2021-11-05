<?php

session_start();
//require 'connect.inc.php';

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
  header("location: Home_Page.php");
  exit;
}


if (isset($_POST['username'])&& isset($_POST['password']) )
{
	$username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
	
	$password_hash = md5($password);
	
	
	
	if(!empty($username)&&!empty($password))
	{
		//echo 'filled';
		$query = "SELECT id FROM user WHERE username='$username' AND password='$password_hash'";
		
		if($query_run = mysqli_query($con,$query))
		{
			$query_num_rows = mysqli_num_rows($query_run);
			
			if($query_num_rows==0)
			{
				echo 'Invaild username/password';
			}
			else
			{
				session_start();
				foreach ($query_run as $row)
                {
					 $id = $row['id'];
					 //$firstname = $row['first_name'];
					 //$lastname = $row['last_name'];
					 $_SESSION["loggedin"] = true;
					 $_SESSION["id"] = $id;
					 $_SESSION["username"] = $username;
					 
					 if ($_SESSION["id"])
					 {

					  header('Location: Home_Page.php');
					 }
					 
					 
                } 
				
				/*
				$_SESSION["loggedin"] = true;
				$_SESSION["id"] = $id;
				$_SESSION["username"] = $username;
				
				header("location: welcome.php");
				*/
				//$user_id = mysqli_result::$current_field($query_run , 0,'id');
				//$_SESSION['user_id']=$user_id;
				//echo $username;
				//header('location: Home_Page.html');
			}
		}
		else
		{
			echo 'failed';
		}
	}
	else
	{
		echo "You must fill the username and password";
	}
	
}



/////////////////////////////////////////////////////////////////////////////
 //STaff login

if (isset($_POST['staff_username'])&& isset($_POST['staff_password']) )
{
	$username = mysqli_real_escape_string($con, $_POST['staff_username']);
    $password = mysqli_real_escape_string($con, $_POST['staff_password']);
	
	$password_hash = md5($password);
	
	
	
	if(!empty($username)&&!empty($password))
	{
		//echo 'filled';
		$query = "SELECT id FROM staff WHERE username='$username' AND password='$password_hash'";
		
		if($query_run = mysqli_query($con,$query))
		{
			$query_num_rows = mysqli_num_rows($query_run);
			
			if($query_num_rows==0)
			{
				echo 'Invaild username/password';
			}
			else
			{
				session_start();
				foreach ($query_run as $row)
                {
					 $id = $row['id'];
					 //$firstname = $row['first_name'];
					 //$lastname = $row['last_name'];
					 $_SESSION["loggedin"] = true;
					 $_SESSION["id"] = $id;
					 $_SESSION["username"] = $username;
					 
					 if ($_SESSION["id"])
					 {
					  header('Location:Home_Page.php');
					 }
					 
					 
                } 
				
				/*
				$_SESSION["loggedin"] = true;
				$_SESSION["id"] = $id;
				$_SESSION["username"] = $username;
				
				header("location: welcome.php");
				*/
				//$user_id = mysqli_result::$current_field($query_run , 0,'id');
				//$_SESSION['user_id']=$user_id;
				//echo $username;
				//header('location: Home_Page.html');
			}
		}
		else
		{
			echo 'failed';
		}
	}
	else
	{
		echo "You must fill the username and password";
	}
	
}
?>




<!DOCTYPE html>
<html>
<title>LOGIN</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="mantul.css">-->
	
<style>

h1, h3 ,p{text-align: center;}
body,h1,h3 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url("LoginBackground.jpg");
  min-height: 100%;
  background-position: center;
  background-size: cover;
}


  

</style>

<body>

<div class="bgimg w3-display-container w3-text-white">
  <div class="w3-display-topmiddle w3-jumbo">
    <p>
		<br></br>
			<h1 style="font-size: 50px; text-shadow:4px 4px 0 #444 ">Welcome To AKAD</h1>
			<h3 style="font-size: 35px; text-shadow:3px 3px 0 #444 ">Please Login</h3>
		<!--<h1 style= "font-size: 50px;">Welcome To AKAD</h1>
		<h3>Choose your way of Login</h3>-->
	</p>
  </div>
  <div class="w3-display-middle w3-container w3-xlarge">
	<br></br>
	<br></br>
    <p><button onclick="document.getElementById('Customer').style.display='block'" class="w3-button w3-black">Customer</button></p>
    <p><button onclick="document.getElementById('Staff').style.display='block'" class="w3-button w3-black">Staff</button></p>
  </div>
</div>

<!-- Customer Modal -->
<div id="Customer" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-black w3-display-container">
      <span onclick="document.getElementById('Customer').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Customer</h1>
    </div>
	
	<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="index.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="username" name="username" placeholder="Username" required value="<?php echo $username ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="link forget-pass text-left">
                      <a href="forgotpass.php">Forgot password?</a>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? 
                      <a href="signup-user.php">Signup now</a>
                  </div>
                </form>
            </div>
        </div>
    </div>
	
</div>    
</div>

<!-- Staff Modal --> 
<div id="Staff" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-black">
      <span onclick="document.getElementById('Staff').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Staff</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="index.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="username" name="staff_username" placeholder="Username" required value="<?php echo $username ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="staff_password" placeholder="Password" required>
                    </div>
                    <div class="link forget-pass text-left">
                      <a href="forgotpass.php">Forgot password?</a>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <!--<div class="link login-link text-center">Not yet a member? 
                      <a href="signup-user.php">Signup now</a>
                  </div>-->
                </form>
            </div>
        </div>
    </div>
  </div>
</div>

</body>
</html>
