<?php

include('connect.php');

$UserIDInput = $_POST['UserIDInput'];
$RoomID = $_POST['RoomID'];
$Payment = $_POST['Payment'];
$BookingType = $_POST['BookingType'];
$Reason = $_POST['Reason'];
$InputedDate = $_POST['InputedDate'];

    $sql2 = "INSERT INTO `transactionheader`(`TransactionDate`, `UserID`, `RoomID`, `RoomPurpose`, `Status`, `BookingType`, `PaymentType`) VALUES ('".$InputedDate."','".$UserIDInput."','".$RoomID."','".$Reason."','1','".$BookingType."', '".$Payment."')";
    // echo $sql2;
    $link = $conn->query($sql2);
    header("location:". $_SERVER["HTTP_REFERER"]);
    exit;

  $conn->close();
?>