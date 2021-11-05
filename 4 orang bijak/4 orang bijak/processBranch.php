<?php
include "branch.php";
//print_r($_POST);



if(isSet($_POST['addBranchButton']))
	{
	$msg=addNewBranch();
	header( "refresh:1; url=HomePage.php".$msg);
	}
	
	
	
else 
	if(isSet($_POST['deleteBranchButton']))
	{
	//print_r($_POST);
	deleteBranch();
	header( "refresh:1; url=HomePage.php".$msg);
		
	}
	
	
	
else 
	if(isSet($_POST['updateBranchButton']))
	{
		echo 'to update';
		updateBranchInformation();
		header( "refresh:1; url=HomePage.php".$msg);
	}
	
	else
	{
		echo 'lain-lain';
	}
	
	
	
?>
