<?php session_start(); 
    if(isset($_SESSION['username'])){
        header('Location: dashboard.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Login - Admin</title>
  <?php include "dependencies(css).php"; include "DBConn.php"; ?>
  <link rel="shortcut icon" type="image/icon" href="assets/favicon/android-icon-48x48.png">
</head>
<body style="background-color: #edebe1;">
  <div style="height: 100px;"></div>
  <div class="container-fluid" style="margin-top: 2%;">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4">
        <div class="card" style="margin-bottom: 5%;">
          <!-- START OF FORM UPLOAD -->
          <form class="" action="add_research.php" method="POST" enctype="multipart/form-data" id="loginForm">
            <div class="card-header text-white second-color">
              <h3 style="text-align: center;">Admin Login</h3>
            </div>
            <div class="card-body">
              <input id="username" autofocus style="text-align: center;" class="form-control" type="text" name="username" value="" placeholder="Username" required="true">
              <br>

              <input id="password" style="text-align: center;" class="form-control" type="password" name="password" value="" placeholder="Password" required>
               <div class="row">
                
                
              </div>
            </div>
            <div class="card-footer">
              <div class="d-flex flex-row-reverse">
                <input id="loginBtn" class="btn second-color white-font col-lg-12" type="submit" name="login" value="Upload Research">
              </div>
              <!-- this is where the error message will be displayed. Just name it result(id) -->
              <p id="result" style="text-align: center; margin-top: 10px;"></p>
            </div>
          </form>
          <!-- END OF FORM UPLOAD -->
        </div>
      </div>
    </div>
  </div>


</body>
<?php include 'dependencies(scripts).php' ?>
<script>



var username = document.getElementById("username");
var password = document.getElementById("password");

// Execute a function when the user releases a key on the keyboard
username.addEventListener("keyup", function(event) {
// Number 13 is the "Enter" key on the keyboard
if (event.keyCode === 13) {
    // Cancel the default action, if needed
    // event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("loginBtn").click();
}
});
// Execute a function when the user releases a key on the keyboard
password.addEventListener("keyup", function(event) {
// Number 13 is the "Enter" key on the keyboard
if (event.keyCode === 13) {
    // Cancel the default action, if needed
    // event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("loginBtn").click();
}
});

// Add the following code if you want the name of the file appear on select
// $(".custom-file-input").on("change", function() {
//   var fileName = $(this).val().split("\\").pop();
//   // alert('This happen');
//   $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
// });
$(document).ready(function(){
  $("#loginBtn").click(function(event){
    if(document.getElementById("username").value == "" || document.getElementById("password").value == ""){
        document.getElementById('result').innerHTML = "*Please fill up all fields.";
    }
    else{
      event.preventDefault();
      var form = $('#loginForm')[0];
      var data = new FormData(form);
      $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: 'login_action.php', // this is where things go wrong
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (result) {
          if(result == 'success'){
            location.replace("dashboard.php");
          }
          else if(result == 'emptyfield'){
            document.getElementById('result').innerHTML = "*Please fill up all fields.";
          }
          else if(result == "not_exist"){
            document.getElementById('result').innerHTML = "*Username or Password did not match.";
          }
          else{
            document.getElementById('result').innerHTML = result;
          }
        },
        error: function (e) {
          $("#result").text(e.responseText);
          console.log("ERROR : ", e);
        }
      });
    }
  });
});
</script>
</html>
