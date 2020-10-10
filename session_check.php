<?php
    if(!isset($_SESSION['username'])){
        header("Location: admin_login.php");
    }
?>