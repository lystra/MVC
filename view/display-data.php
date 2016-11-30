<a href="./">Go Back</a>

<br /><br />

<?php
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
		<a href="./pages/edit-data&id=<?php echo $row['id'];?>" class="btn btn-success">Click Here to edit this record</a>
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
?>