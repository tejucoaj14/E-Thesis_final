<?php session_start(); ?>
<?php include "session_check.php";?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Add Account - Admin</title>
  <?php include 'dependencies(scripts).php' ?>
  <?php include "dependencies(css).php"; include "DBConn.php"; ?>
  <link rel="shortcut icon" type="image/icon" href="assets/favicon/android-icon-48x48.png">
</head>
<body style="background-color: #edebe1">
  <?php include 'admin_header.php'; ?>
  <div style="height: 100px;"></div>
  <div class="container-fluid" style="margin-top: 3%;">
    <div class="row">
      <?php include "sidenav_admin.php"; ?>
      <!-- End of sidenav -->
      <div class="col-md-10">
        <div class="card" style="margin-bottom: 5%;">
          <!-- START OF FORM UPLOAD -->
          <form class="" action="add_admin.php" method="POST" id="addAdminForm">
            <div class="card-header text-white second-color">
              <h3>Add Account</h3>
            </div>
            <div class="card-body">
              <h4>Personnel Information</h4>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <label for="firstname">*First Name</label>
                  <input id="firstname" minlength="3" maxlength="20" class="form-control" type="text" name="firstname" value="" placeholder="Special characters not allowed" required>
                </div>
                <div class="col-md-6">
                  <label for="lastname">*Last Name</label>
                  <input id="lastname" minlength="3" maxlength="20" class="form-control" type="text" name="lastname" value="" placeholder="Special characters not allowed" required>
                </div>
                <br>
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="birthday">*Date of Birth</label>
                  <input id="birthday" class="form-control" type="date" name="birthday" value="" placeholder="Date" required>
                </div>
                <div class="col-md-6">
                  <label for="address">*Address</label>

                  <input id="address" minlength="5" maxlength="50" class="form-control" type="text" name="address" value="" placeholder="Specify your address" required>
                </div>
                <br>
              </div>

              <br>
              <div class="row">
                <div class="col-md-6">
                  <label for="username">*Username</label>
                  <input id="username" minlength="8" maxlength="20" class="form-control" type="text" style="width: 100% !important;" name="username" value="" placeholder="Special character not allowed" required>
                  <br />
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6">
                  <label for="password1">*Password</label>
                  <input id="password1" minlength="8" maxlength="20" class="form-control" type="password" style="width: 100% !important;" name="password1" value="" placeholder="Use alphanumeric password" required>
                  <br />
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6">
                  <label for="password2">*Confirm Password</label>
                  <input id="password2" minlength="8" maxlength="20" class="form-control" type="password" style="width: 100% !important;" name="password2" value="" placeholder="Make sure it match with password" required>
                  <br />
                </div>
                <div class="col-md-12" style="text-align: end;"><p id="result"></p></div>

              </div>
            </div>
            <div class="card-footer">
              <div class="d-flex flex-row-reverse">
                <input id="addbtn" class="btn second-color white-font" type="submit" name="addAdmin" value="Upload Research">
              </div>
            </div>
          </form>
          <!-- END OF FORM UPLOAD -->
        </div>
      </div>
    </div>
  </div>
  <!-- this is where the error message will be displayed. Just name it result(id) -->


</body>
<script>

$(document).ready(function(){
  $("#addbtn").click(function(event){

      if(document.getElementById('firstname').value == '' || document.getElementById('lastname').value == '' || document.getElementById('birthday').value == '' || document.getElementById('address').value == '' || document.getElementById('username').value == '' || document.getElementById('password1').value == '' || document.getElementById('password2').value == ''){
        document.getElementById('result').innerHTML = "*Please fill up all fields";
      }
      else{
        event.preventDefault();

        var form = $('#addAdminForm')[0];
        var data = new FormData(form);
        $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: 'add_acc_action.php', // this is where things go wrong
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (result) {
          if(result == 'success'){  
            $('#firstname').val('');
            $('#lastname').val('');
            $('#birthday').val('');
            $('#address').val('');
            $('#username').val('');
            $('#password1').val('');
            $('#password2').val('');
            alert("Admin account added successfully")
          }
          else{
            document.getElementById('result').innerHTML = "*" + result;
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
