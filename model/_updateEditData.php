<?php
// Instantiate database.
$database = new Database();

//Update query with placeholder values
$database->query('UPDATE contact_list set name = :name, email = :email, phone = :phone, message = :message, ip_address = :ip WHERE id = :id');

//Binding actual values to the placeholder values above
$database->bind(':name', $_POST['name']);
$database->bind(':email', $_POST['email']);
$database->bind(':phone', $_POST['phone']);
$database->bind(':message', $_POST['message']);
$database->bind(':ip', $_SERVER['REMOTE_ADDR']);
$database->bind(':id', $_POST['id']);

//Execute the query
$database->execute();
?>