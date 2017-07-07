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
$itemNameErr = $descriptionErr = $supplierCodeErr = $costErr = $sellingPriceErr = $numberOnHandErr = $reorderPointErr = "";
$dataValid = true;
	if ($_GET) { 
		if ($_GET['itemName'] == "" ) {
			$itemNameErr = "Error - you must fill in a item name";
			$dataValid = false;
		} else {
			if (!preg_match("/^[a-zA-Z0-9:;\-\,\' ]*$/",($_GET["itemName"]))) {
				$itemNameErr = "Only letters, spaces, colon, semi-colon, dash, comma, apostrophe and numeric character (0-9)";
				$dataValid = false;
			}
		}
		if ($_GET['description'] == "") {
			$descriptionErr = "Error - you must fill in a description";
			$dataValid = false;		
		} else {
			if (!preg_match("/^[a-zA-Z0-9.\,\'\-(\r\n|\r|\n) ]*$/",($_GET["description"]))) {
				$descriptionErr = "Only letters, digits, periods, commas, apostrophes, dashes and spaces";
				$dataValid = false;
			}
		}
		if ($_GET['supplierCode'] == "") {
			$supplierCodeErr = "Error - you must fill in a supplier code";
			$dataValid = false;		
		} else {
			if (!preg_match("/^[a-zA-Z0-9\- ]*$/",($_GET["supplierCode"]))) {
				$supplierCodeErr = "Only ...";
				$dataValid = false;
			}
		}
		if ($_GET['cost'] == "") {
			$costErr = "Error - you must fill in a cost";
			$dataValid = false;		
		 } else {
			if (!preg_match("/^[0-9]+\.[0-9]{2}$/",($_GET["cost"]))) {
				$costErr = "Only monetary amounts only i.e. one or more digits, then a period, then two digits";
				$dataValid = false;
			}
		}
		if ($_GET['sellingPrice'] == "") {
			$sellingPriceErr = "Error - you must fill in a selling price";
			$dataValid = false;		
		 } else {
			if (!preg_match("/^[0-9]+\.[0-9]{2}$/",($_GET["sellingPrice"]))) {
				$sellingPriceErr = "Only monetary amounts only i.e. one or more digits, then a period, then two digits";
				$dataValid = false;
			}
		}
		if ($_GET['numberOnHand'] == "") {
			$numberOnHandErr = "Error - you must fill in a number on hand";
			$dataValid = false;		
		} else {
			if (!preg_match("/^[0-9]*$/",($_GET["numberOnHand"]))) {
				$numberOnHandErr = "Only digits";
				$dataValid = false;
			}
		}
		if ($_GET['reorderPoint'] == "") {
			$reorderPointErr = "Error - you must fill in a reorder point";
			$dataValid = false;		
		 } else {
			if (!preg_match("/^[0-9]*$/",($_GET["reorderPoint"]))) {
				$reorderPointErr = "Only digits";
				$dataValid = false;
			}
		}  
	}
	if ($_GET && $dataValid) {
		$link = db_connect();
		//SQL Query
		$itemName = $_GET['itemName'];
		$description = $_GET['description'];
		$supplierCode = $_GET['supplierCode'];
		$cost = $_GET['cost'];
		$sellingPrice = $_GET['sellingPrice'];
		$numberOnHand = $_GET['numberOnHand'];
		$reorderPoint = $_GET['reorderPoint'];
		$onBackOrder = $_GET['onBackOrder']; 
		$sql_query = "INSERT INTO inventory values (' ', '$itemName','$description','$supplierCode', '$cost', '$sellingPrice', '$numberOnHand', '$reorderPoint', '$onBackOrder','n')";
			
		//Run our sql query
		$result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));
		//Close the MySQL Link
		mysqli_close($link);
		if ($result){
		    redirect_to("view.php");
		} else {
		    echo "Your query didn't work.  <a href=add.php>try again</a>";
		}
	} else {
	?>
    <?php head("Add Item"); ?>
    <img src='IMAGE/sketch.PNG' alt='sketch of an old man on the ttc.png' height='300' width='300'><br>		
	<?php navBar();?>
	<p>All fields mandatory except "On Back Order"</p>
    <form method="get" action="add.php">
      <table>
        <tr>
	<td>Item name:</td>
	<td><input name="itemName" type="text" value="<?php if(isset($_GET['itemName'])){ echo $_GET['itemName'];} ?>"><?php echo $itemNameErr;?></td>
        </tr>
        <tr>
	<td>Description:</td>
	<td><textarea name="description" cols="22" rows = "3"><?php if(isset($_GET['description'])){ echo $_GET['description'];} ?></textarea><?php echo $descriptionErr;?></td>
        </tr>
        <tr>
	<td>Supplier Code:</td>
	<td><input name="supplierCode" type="text" value="<?php if(isset($_GET['supplierCode'])){ echo $_GET['supplierCode'];} ?>"><?php echo $supplierCodeErr;?></td>
        </tr>
        <tr>
	<td>Cost:</td>
	<td><input name="cost" type="text" value="<?php if(isset($_GET['cost'])){ echo $_GET['cost'];} ?>"><?php echo $costErr;?></td>
        </tr>
        <tr>
  	<td>Selling price:</td>
	<td><input name="sellingPrice" type="text" value="<?php if(isset($_GET['sellingPrice'])){ echo $_GET['sellingPrice'];} ?>"><?php echo $sellingPriceErr;?></td>
        </tr>
        <tr>
	<td>Number on hand:</td>
	<td><input name="numberOnHand" type="text" value="<?php if(isset($_GET['numberOnHand'])){ echo $_GET['numberOnHand'];} ?>"><?php echo $numberOnHandErr;?></td>
        </tr>
        <tr>
 	<td>Reorder Point:</td>
	<td><input name="reorderPoint" type="text" value="<?php if(isset($_GET['reorderPoint'])){ echo $_GET['reorderPoint'];} ?>"><?php echo $reorderPointErr;?></td>
        </tr>
        <tr>
  	<td>On Back Order:</td>
	<td><input name="onBackOrder" type="checkbox" value="y" <?php if(isset($_GET['onBackOrder'])){echo "checked='checked'";}?>>
        </tr>
        <tr>
	<td><input name="submit" type="submit"></td>
        </tr>
      </table>
    </form>
<?php footer(); ?>
</html>
<?php
}
?>