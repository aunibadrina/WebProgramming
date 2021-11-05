<?php

session_start();
//require 'connect.inc.php';

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
  header("location: welcome.php");
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

					  header('Location: welcome.php');
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

/////////////////////////////////////////
/*if (isset($_POST['username'])&& isset($_POST['password']) )//if(isset($_POST['login']))
{
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$password_hash = md5($password);
	$check_validation = "SELECT id FROM user WHERE username = '$username' AND password = '$password_hash'";
	$run = mysqli_query($con, $check_validation);
	
	if(!empty($username)&&!empty($password))
	{
		if(mysqli_num_rows($run) > 0)
		{
			echo $user_id = mysql_result($run,0,id);
			//echo 'congrats dumbass';
			//header('location: Home_Page.html');
			/*$fetch = mysqli_fetch_assoc($res);
			$fetch_pass = $fetch['password'];
			
			if(password_verify($password, $fetch_pass))
			{
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				$status = $fetch['status'];
				if($status == 'verified'){
				  $_SESSION['email'] = $email;
					header('Location: Home_Page.html');
				}else{
					$info = "It's look like you haven't still verify your email - $email";
					$_SESSION['info'] = $info;
					header('location: user-otp.php');
				}
		}
		else
		{
			$errors['username'] = "Incorrect username or password!";
		}
	}
	else
	{
		echo "You must fill the username and password";
	}
	
}*/
/*else
{
    $errors['username'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
}*/
//<?php echo $current_file;  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
</body>
</html>
