<?php

include('connect.php');

$UserIDInput = $_POST['UserIDInput'];
$Status = $_POST['Status'];
$Reason = $_POST['Reason'];
$InputedDate = $_POST['InputedDate'];
$sql = "SELECT * FROM staffabsent WHERE staffid = '" .$UserIDInput."' AND AbsentDate = '".$InputedDate."'";
$link = $conn->query($sql);

if($link->num_rows>0){
    $sql2 = "UPDATE staffabsent SET Status = '".$Status."', Description = '".$Reason."' WHERE staffid = '" .$UserIDInput."' AND AbsentDate = '".$InputedDate."'";
    $result = $conn->query($sql2);
    header("location:". $_SERVER["HTTP_REFERER"]);
    exit;
}
else{
    $sql2 = "INSERT INTO `staffabsent` ( `StaffID`, `Status`, `Description`, `AbsentDate`) VALUES ( '".$UserIDInput."', '".$Status."', '".$Reason."', '".$InputedDate."')";
    $link = $conn->query($sql2);
    header("location:". $_SERVER["HTTP_REFERER"]);
    exit;
}

  $conn->close();
?>