<?php
// Instantiate database.
$database = new Database();

//Insert query with placeholder values
$database->query('INSERT INTO contact_list (name, email, phone, message, ip_address) VALUES (:name, :email, :phone, :message, :ip)');

//Binding actual values to the placeholder values above
$database->bind(':name', $_POST['name']);
$database->bind(':email', $_POST['email']);
$database->bind(':phone', $_POST['phone']);
$database->bind(':message', $_POST['message']);
$database->bind(':ip', $_SERVER['REMOTE_ADDR']);

//Execute the query
$database->execute();
?>