<?php
    setcookie("Role", "", time() - 3600);
    setcookie("UserID", "", time() - 3600);
    header('Location:  login.php');
    exit;

?>