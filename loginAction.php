<?php

include('connect.php');

$name = $_POST['username'];
$password = $_POST['Password'];
$sql = "SELECT * FROM user AS a JOIN role AS r ON a.RoleID = r.RoleID WHERE (a.UserName = '".$name."' || a.Email = '".$name."') && a.Password = '".$password."'";
$link = $conn->query($sql);

if($link->num_rows>0){
    while($row = $link->fetch_assoc()){
        setcookie("Role", $row["RoleID"], time() + 3600);
        setcookie("UserID", $row["UserID"], time() + 3600);
        header('Location: index.php');
        exit;
    }
}
else{
    header('Location:  login.php');
    exit;
}

  $conn->close();
?>