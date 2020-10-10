<?php

include "DBConn.php";

if($_POST['firstname'] == '' || $_POST['lastname'] == '' || $_POST['birthday'] == '' || $_POST['address'] == '' || $_POST['username'] == '' || $_POST['password1'] == '' || $_POST['password2'] == ''){
    echo "Please fill up all fields";
}
elseif(strlen($_POST['firstname']) < 3){
    echo "First Name must be longer than 2 characters";
}
elseif(strlen($_POST['lastname']) < 3){
    echo "Last Name must be longer than 2 characters";
}
elseif(strlen($_POST['username']) < 8){
    echo "Username must be 8 character or longer";
}
elseif(strlen($_POST['password1']) < 8){
    echo "Password must be 8 character or longer";
}
elseif($_POST['password1'] != $_POST['password2']){
    echo "Password did not match";
}


else{
        
    $stmt = $conn->prepare("SELECT admin_id from admin_acc where admin_username = ?");
    $stmt->bind_param("s", $_POST['username']);

    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){
        echo "Username already exists";
    }
    else{
        $stmt = $conn->prepare("INSERT into admin_acc(admin_fname, admin_lname, birthday, address, admin_username, admin_password) VALUES(?, ?, ?, ?, ?, sha1(?))");
        $stmt->bind_param("ssssss", $_POST['firstname'], $_POST['lastname'], $_POST['birthday'], $_POST['address'], $_POST['username'], $_POST['password1']);

        if($stmt->execute()){
            echo "success";
        }
        else{
            echo 'An error occured. Try again later.';
        }
    }

}
?>