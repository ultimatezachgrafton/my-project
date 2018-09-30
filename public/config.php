<?php
/**
 * Created by PhpStorm.
 * User: Zachg
 * Date: 9/25/2018
 * Time: 5:44 AM
 */

// Set up a simple login to access locally-hosted mySQL.
$user = 'root';
$password = '';
$db = 'userrecord_db';

$db = new mysqli('localhost', $user, $password, $db) or die("Unable to connect");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
}

// Inserting user data into the SQL table
// Using real_escape_string to take care of inputted special characters
$sql = "INSERT INTO userrecord_table (name, email, message) VALUES ('{$db->real_escape_string($_POST['name'])},
    '{$db->real_escape_string($_POST['email'])},
    '{$db->real_escape_string($_POST['message'])}";
$insert = $db->query($sql);

// Print response from MySQL
if ($insert) {
    echo "Success! Row ID: {$db->insert_id}";
}
else {
    die("Error: {$db->errno} : {$db->error}");

    $db -> close();
}
