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
require("library.php");
$link = db_connect();
$sql_query = "SELECT * FROM inventory";
$result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));

?>
<?php
	head("View");
    navBar();
?>
	<img class="img" src='IMAGE/oldMan.jpg' alt='sketch of an old man on the ttc.png' height='200' width='1000'><br>	
	<div id="viewStyle" style="overflow-x:auto;">
		<table border='1' id= results>
			<tr>
				<th>ID</th>
				<th>Item Name</th>
				<th>Description</th>
				<th>Supplier</th>
				<th>Cost</th>
				<th>Price</th>
				<th>Number On Hand</th>
				<th>Reorder Level</th>
				<th>On Back Order?</th>
				<th>Delete/Restore</th>
			</tr>
<?php
		while($row = mysqli_fetch_assoc($result))
 		{
?>
			<tr>
				<td><?php print $row['id']; ?></td>
				<td><?php print $row['itemName']; ?></td>
				<td><?php print $row['description']; ?></td>
				<td><?php print $row['supplierCode']; ?></td>
				<td><?php print $row['cost']; ?></td>
				<td><?php print $row['price']; ?></td>
				<td><?php print $row['onHand']; ?></td>
				<td><?php print $row['reorderPoint']; ?></td>
				<td><?php print $row['backOrder']; ?></td>
				<td><a href="delete.php?id=<?php echo $row['id'] . "&deleted=" . $row['deleted']?>"><?php if($row['deleted'] == 'n'){echo "Delete";}else{echo"Restore";}?></a></td>
			</tr>
<?php
		}
	// Free resultset
	mysqli_free_result($result);
  
	//Close the MySQL Link
 	mysqli_close($link);
?>
		</table>
	</div>
<?php footer(); ?>