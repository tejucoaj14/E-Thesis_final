<?php
session_start();
include "DBConn.php";

$username = $_POST['username'];
$password = $_POST['password'];

if($username == '' || $username == null || $password == '' || $password == null){
    echo 'emptyfield';
}
else{
    $stmt = $conn->prepare("SELECT admin_id, admin_fname, admin_lname from admin_acc where admin_username = ? AND admin_password = sha1(?)");
    $stmt->bind_param("ss", $username, $password);

    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $_SESSION['username'] = $username;
        while($row = mysqli_fetch_array($result)){
            $_SESSION['admin_firstname'] = $row['admin_fname'];
            $_SESSION['admin_lastname'] = $row['admin_lname'];
        }
        echo "success";
    }
    else{
        echo "not_exist";
    }
}


?>