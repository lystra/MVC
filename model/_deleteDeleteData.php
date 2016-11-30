<?php
// Instantiate database.
$database = new Database();

//Update query with placeholder values
$database->query('DELETE FROM contact_list WHERE id = :id');

//Binding actual values to the placeholder values above
$database->bind(':id', $_GET['deleteId']);

//Execute the query
$database->execute();
?>