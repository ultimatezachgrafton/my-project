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

$name = 'name';
$email = 'email';
$message = 'message';


$conn = new mysqli('localhost', $user, $password, $db) or die("Connection Error: " . mysqli_error($conn));



mysqli_query($conn, "INSERT INTO userrecord_table (name, email, message) VALUES ('" . $name. "', '" . $email. "','" . $message. "')");
$insert_id = mysqli_insert_id($conn);
if(!empty($insert_id)) {
    $message = "Your contact information is saved successfully";
} else {
    die("Error: {$db->errno} : {$db->error}");

    $db -> close();
}