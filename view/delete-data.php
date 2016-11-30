<a href="./">Go back</a>

<br /><br />

<?php
if(isset($_SESSION['admin']))
{
	require_once('model/db_config.php');
	require_once('model/database.class.php');

	if(isset($_GET['deleteId']) && isset($_SESSION['admin']))
	{
	//Handle the update statement for the form data
	require_once('model/_deleteDeleteData.php');
	echo "<br />Data deleted successfully!<br /><br />";
	}

	require_once('model/db_config.php');
	require_once('model/database.class.php');

	// Instantiate database. Only has to be instantiated once on a page.
	$database = new Database();

	//Query to display all records
	$database->query('SELECT * FROM contact_list order by id ASC');

	//Get a single row or multiple rows back
	//$row = $database->single(); //Single record
	$rows = $database->resultset(); //Multiple records

	foreach($rows AS $row)
	{
	?>
	<pre style="overflow-x:hidden;">
	<div class="row">
		<div class="col-sm-4">
			Name: <?php echo $row['name'];?>
			<br />
			Email: <?php echo $row['email'];?>
			<br />
			Phone: <?php echo $row['phone'];?>
			<br />
			IP: <?php echo $row['ip_address'];?>
			<br />
			Date: <?php echo $row['submit_date'];?>
			<?php
			if(isset($_SESSION['admin']))
			{
			?>
			<br />
			<a href="./?page=delete-data&deleteId=<?php echo $row['id'];?>" class="btn btn-danger">Click Here to delete this record</a>
			<?
			}
			?>
		</div>
		<div class="col-sm-7">
			<?php echo nl2br($row['message']);?>
		</div>
	</div>
	</pre>
	<?php
	}
	//Display row count
	echo $database->rowCount() ." Total Records";

	//Execute the query
	$database->execute();
}
?>
