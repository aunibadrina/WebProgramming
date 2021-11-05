<?php

/*$mysql_host = 'localhost';
$mysql_user = 'paan';
$mysql_pass = 'paan123';

$mysql_db ='akaddb'
/*;

if(!mysqli_connect($mysql_host, $mysql_user, $mysql_pass)||!mysqli_select_db($mysql_db))
{
	echo mysqli_error();
}
else
{
	echo 'connected';
}
*/


$con = mysqli_connect("localhost","paan","paan123","akaddb");//&& mysql_select_db('cardb2021');

	if(!$con)
	{
		die("Connection failed: " . $con->connect_error);
	}	
	/*else
	{
		echo 'connected<br>';
	}*/

?>