<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minitheater";
$servername = "localhost";
$username = "id17577349_projectdblec";
$password = "LECProject12345!";
$dbname = "id17577349_databaseproject";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

?>