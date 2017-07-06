<?php /*
	Subject Code: INT322
	Student Name: Yahya Assowe
	Date Submitted: June 22, 2017
	Student Declaration
	I/we declare that the attached assignment is my/our own work in accordance with Seneca Academic Policy. No part of this assignment has been copied manually or electronically from any other source (including web sites) or distributed to other students.
	Name: Yahya Assowe
	Student ID: 018822148	
*/
?>
<?php
	require("library.php");
	$id = $_GET['id'];
	$deleted = $_GET['deleted'];
	if ($deleted == 'n'){
		$deleted = 'y';
	} else {
		$deleted = 'n';
	}
	$link = db_connect();
	$sql_query = "UPDATE inventory SET deleted='$deleted'
				  WHERE id='$id'";
	$result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));
	//Close the MySQL Link
	mysqli_close($link);
	if($result)
	{
		redirect_to("view.php")
	} else {
		echo "failed to return";
	}
?>