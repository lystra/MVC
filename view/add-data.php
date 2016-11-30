<a href="./">Go Back</a>

<br /><br />

<?php
if(isset($_SESSION['admin']))
{
	require_once('model/db_config.php');
	require_once('model/database.class.php');

	if(isset($_POST['submitAddData']))
	{
	//Handle the insertion of form data
	require_once('model/_insertAddData.php');

	//Echo the last database record id inserted so that you know the query inserted
	echo "Last ID Inserted: ".$database->lastInsertId();
	echo "<br />Data inserted successfully!<br /><br />";
	}
	?>

	<form method="post" action"">
	Name: <input type="text" name="name" class="form-control" required>
	<br /><br />
	Email: <input type="text" name="email" class="form-control" required>
	<br /><br />
	Phone: <input type="text" name="phone" class="form-control" required>
	<br /><br />
	Message:
	<br />
	<textarea name="message" class="form-control"></textarea>
	<br /><br />
	<input type="submit" name="submitAddData" value="Add Data" class="btn btn-warning">
	</form>
<?
}
?>