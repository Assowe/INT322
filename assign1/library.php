<?php
/*
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
function redirect_to($location){ // Use for redirecting the page of the web browser 
	header("Location: ". $location);
	exit;
}
function db_connect(){ // Create a connection to the server
	$lines = file('/home/int322_172a02/secret/topsecret.txt');

	//Connect to the mysql server and get back link_identifier
 	$link = mysqli_connect(trim($lines[0]),trim($lines[1]), trim($lines[2]), trim($lines[3])) or die('Could not connect: ' . mysqli_error($link));
	return $link;
}
function db_exit($link, $result){
	// Free resultset
	mysqli_free_result($result);
  
	//Close the MySQL Link
 	mysqli_close($link);
}
?>
<?php
function navBar(){ // Navigation menu for ADD.php and VIEW.php
?>
	<nav>
		<div>
			<a href='add.php'>Add </a>
			<a href='view.php'>View</a>
		</div>
	</nav>
<?php
}
?>
<?php
function head($title){// Head content for ADD.php ... i know its pointless but i wanted to practice making functions.
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title><?php $title;?></title>
		<link href='CSS/styles.css' rel='stylesheet' type='text/css' />
	</head>
	<body>
		<h1>Bob's Olde Fashioned Print Books</h1>	
<?php
}
?>
<?php
function footer(){ // Footer content added to all pages
?>
		<footer><h6>Copyright &copy; Yahya Assowe 2017</h6></footer>
	</body>
	</html
<?php
}
?>