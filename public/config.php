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
$db = 'userRecord_db';

$db = new mysqli('localhost', $user, $password, $db) or die("Unable to connect");

echo "connection successful";