<?php
require 'core.inc.php';
require 'connect.inc.php';

$email = "";
$name = "";
$errors = array();

/*if(isset)$_SESSION['user_id'])&&!empty($_SESSION['user_id'])
{
	echo 'Youre logged in.';
}
else
{
	include 'loginform.inc.php';

}*/
//include 'loginform.inc.php';

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    header("location: Home_Page.php");
    exit;
}
else
{
	include 'home.php';
}

//if user click continue button in forgot password form
    if(isset($_POST['check-email']))
	{
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0)
		{
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query)
			{
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: akadUTM@gmail.com";
                if(mail($email, $subject, $message, $sender))
				{
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }
				else
				{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }
			else
			{
                $errors['db-error'] = "Something went wrong!";
            }
        }
		else
		{
            $errors['email'] = "This email address does not exist!";
        }
    }

//echo $current_file;

?>