<head>
  <title>Appointment Information</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


	<script>
	function hideShowAppointmentList()
	{
		var status = document.getElementById("hideShowAppointmentListListButton").value;
		if(status == 'Show Appointment List')
			{
			document.getElementById("AppointmentListPanel").style.display = "block";
			document.getElementById("hideShowAppointmentListListButton").value = "Hide Appointment List";
			}
		else
			{
			document.getElementById("appointmentListPanel").style.display = "none";
			document.getElementById("hideShowAppointmentListListButton").value = "Show Appointment List";
			}		
	}
	
	</script>
</head>
<body>
<div class="container"  style="border-style: groove;">
<input type="submit" class="btn btn-primary" id="hideShowAppointmentListButton" value="Hide Appointment List"
 onclick="hideShowAppointmentListList()">
<div class="panel panel-default"  id="AppointmenthListPanel" style="margin:auto;text-align:center;border-style:solid;">
<h1 style="text-align:center;" >Appointment List</h1>

<?php showListOfAppointment();?>
</div>
</div>
</body>



<?php

//include 'core.inc.php';
//include 'connect.inc.php';

function getListOfAppointment()
{
 //echo 'in getListOfBranch()';
 //1.create connection to database
 $con = mysqli_connect("localhost","paan","paan123","akaddb");
	if(!$con)
		{
		echo mysqli_error();
		}
	else
	{
		//echo 'connected';
		$sql='select * from appointment';
		
		
		//echo $sql;
		$qry=mysqli_query($con,$sql);
		
		return $qry;
	}
	
 //2.construct sql
  //3.execute query
 //3.return query resuly
 
 }
 
function showListOfAppointment()
{
	//include "branch.php";
	$qry = getListOfAppointment();
	echo '<br>Total Appointment: '.mysqli_num_rows($qry);
	echo '<table id="AppointmentListTable" class="table table-striped">';
	echo '<tr>
		<td>No</td>
		<td>Appointment ID</td>
		<td>Name</td>
		<td>Location</td>
		<td>Negeri Kahwin</td>
		<td>Date</td>
		<td>Delete</td>
		<td>Update</td>
	</tr>';
$i=1;
while($row=mysqli_fetch_assoc($qry) )//Display Branch information
  {

  echo '<tr>';
  echo '<td>'.$i.'</td>';
  echo '<td>'.$row['id'].'</td>';
  echo '<td>'.getuserfield('firstname').'</td>';
  echo '<td>'.$row['bandar'].'</td>';
  echo '<td>'.$row['negeri-kahwin'].'</td>';
  echo '<td>'.$row['tarikh-kahwin'].'</td>';
  $AppointmentID = $row['id'];
  //delete menu
  echo '<td>';
			echo '<form action="processBranch.php" method="post" >';
			echo "<input type='hidden' value='$branchID' name='branchIDToDelete'>";
			echo '<input type="submit" class="btn btn-danger" name="deleteBranchButton" value="Delete">';
			echo '</form>';
  echo '</td>';
  //update menu
   //delete menu
  echo '<td>';
			echo '<form action="updateBranchForm.php" method="post" >';
			echo "<input type='hidden' value='$branchID' name='branchIDToUpdate'>";
			echo '<input type="submit" class="btn btn-info" name="updateBranchButton" value="Update">';
			echo '</form>';
  echo '</td>';
  echo '</tr>';  
  $i++;
  }
	  
echo '</table>';	
	
	
}*/
?>