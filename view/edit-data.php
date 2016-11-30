<a href="./">Go back</a>

<br /><br />

<?php
if(isset($_SESSION['admin']))
{
	require_once('model/db_config.php');
	require_once('model/database.class.php');

	if(isset($_POST['submitUpdateData']) && isset($_SESSION['admin']))
	{
	//Handle the update statement for the form data
	require_once('model/_updateEditData.php');
	echo "<br />Data updated successfully!<br /><br />";
	}

	require_once('model/db_config.php');
	require_once('model/database.class.php');

	// Instantiate database. Only has to be instantiated once on a page.
	$database = new Database();

	//Query to display all records
	$database->query('SELECT * FROM contact_list WHERE id = :id order by id ASC');

	//Bind id variable
	$database->bind(':id', $_GET['id']);

	//Get a single row or multiple rows back
	$row = $database->single(); //Single record
	//$rows = $database->resultset(); //Multiple records

	//Print the results
	//print_r($rows);
	?>
	<form method="post" action"">
	Name: <input type="text" name="name" class="form-control" value="<?php echo $row['name'];?>" required>
	<br /><br />
	Email: <input type="text" name="email" class="form-control" value="<?php echo $row['email'];?>" required>
	<br /><br />
	Phone: <input type="text" name="phone" class="form-control" value="<?php echo $row['phone'];?>" required>
	<br /><br />
	Message:
	<br />
	<textarea name="message" class="form-control"><?php echo $row['message'];?></textarea>
	<br /><br />
	<input type="hidden" name="id" value="<?php echo $row['id'];?>">
	<input type="submit" name="submitUpdateData" value="Update Data" class="btn btn-warning">
	</form>
	<?php
	//Display row count
	echo $database->rowCount() ." Total Records";

	//Execute the query
	$database->execute();
}
?>
