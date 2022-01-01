<?php
include ("connect.php");

$Problem = $_POST['addproblem'];
$RoomID = $_POST['roomid'];

if($Problem ==""){
    header("location:". $_SERVER["HTTP_REFERER"]);
    exit;
}
$SQL = "INSERT INTO roomproblem (RoomID, ProblemDescription, IsActive) VALUES('".$RoomID."','".$Problem."', '1')";
$link = $conn->query($SQL);
header("location:". $_SERVER["HTTP_REFERER"]);
exit;
?>