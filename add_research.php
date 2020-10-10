<?php session_start(); ?>
<?php include "session_check.php";?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Add Research - Admin</title>
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
          <form class="" action="fileUploadAction.php" method="POST" enctype="multipart/form-data" id="uploadForm">
            <div class="card-header text-white second-color">
              <h3>Add Research</h3>
            </div>
            <div class="card-body">
              <h4>Research Information</h4>
              <hr>
              <label for="title">Title of the Study</label>
              <input id="title" class="form-control" type="text" name="title" value="" placeholder="ex. Solar Power Plants: Performance Modeling (2012)" required="true">
              <br>

              <label for="authors">Name of the Authors</label>
              <input id="authors" class="form-control" type="text" name="author" value="" placeholder="ex. John Doe (for multiple inputs, kindly put a comma ',' between authors)" required>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="dateOfResearch">Date of Research</label>
                  <input id="dateOfResearch" class="form-control" type="date" name="date" value="" placeholder="Date" required>
                </div>
                <div class="col-md-6">
                  <label for="placeOfStudy">Place of the Study</label>

                  <input id="placeOfStudy" class="form-control" type="text" name="place" value="" placeholder="Place of the study" required>
                </div>
                <br>
              </div>

              <br>
              <label for="title">Summary</label>
              <textarea style="height: 200px;" id="summary" class="form-control" name="summary" value="" required="true" placeholder="The Inroduction of the Research"></textarea>

              <br>
              <div class="row">
                <div class="col-md-6">
                  <label for="tags">Tags</label>
                  <input id="tags" class="form-control" type="text" style="width: 100% !important;" name="tags" value="" placeholder="Use separator ',' for multiple tags" required>
                  <br>
                  <br>
                </div>
                <div class="col-md-6">
                  <label for="department">Department</label>
                  <select class='form-control' id="department">


                    <?php
                        $sqlForDept = "SELECT * from departments";
                        $result = mysqli_query($conn, $sqlForDept);

                        while ($row = mysqli_fetch_array($result)) { ?>

                            <option value="<?php echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></option>

                        <?php

                        }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-flex flex-row-reverse">
                <input id="uploadbtn" class="btn second-color white-font" type="submit" name="upload" value="Upload Research">
              </div>
            </div>
          </form>
          <!-- END OF FORM UPLOAD -->
        </div>
      </div>
    </div>
  </div>
  <!-- this is where the error message will be displayed. Just name it result(id) -->
  <p id="result"></p>


</body>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  // alert('This happen');
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
$(document).ready(function(){
  $("#uploadbtn").click(function(event){
      event.preventDefault();
      var form = $('#uploadForm')[0];
      var department = $("#department").val();
      var data = new FormData(form);
      data.append("department", department);
      var title = $('#title').val();
      var authors = $('#authors').val();
      var dateOfResearch = $('#dateOfResearch').val();
      var placeOfStudy = $('#placeOfStudy').val();
      var dateOfResearch = $('#dateOfResearch').val();
      var summary = $("#summary").val();
      var tags = $('#tags').val();

      if(title == '' || authors == '' || dateOfResearch == '' || placeOfStudy == '' || dateOfResearch == '' || summary == '' || tags == '' || department == ''){
        alert('All fields must be filled!');
      }
      $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: 'add_research_action.php', // this is where things go wrong
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (result) {
          if(result == 'success'){
            $('#title').val('');
            $('#authors').val('');
            $('#dateOfResearch').val('');
            $('#placeOfStudy').val('');
            $('#tags').val('');
            $("#summary").val('');
            $("#department").val();
            alert('Upload Success!');
          }
          else{
            alert(result);
          }
        },
        error: function (e) {
          $("#result").text(e.responseText);
          console.log("ERROR : ", e);
        }
      });
  });
});
</script>
</html>
