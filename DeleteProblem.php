<?php
include ("connect.php");

$ProblemID = $_POST['ProblemID'];

$SQL = "DELETE FROM roomproblem WHERE ProblemID = ".$ProblemID;
$link = $conn->query($SQL);
header("location:". $_SERVER["HTTP_REFERER"]);
exit;
?>