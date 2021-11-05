<?php

ob_start();
session_start();


$current_file = $_SERVER['SCRIPT_NAME'];

function getuserfield($field)
{
	$con = mysqli_connect("localhost","paan","paan123","akaddb");
	$query =  "SELECT `$field` FROM user WHERE id = '".$_SESSION["id"]."'";
	if($run = mysqli_query($con,$query))
	{
		/*while($row = mysqli_fetch_assoc($run)){
		 $count = $row[$field]; 
		 return $count;
		*/
		$row = mysqli_fetch_assoc($run);
		$count = $row[$field];
		return $count;
		
	}
}

?>