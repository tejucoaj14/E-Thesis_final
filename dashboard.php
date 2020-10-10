<?php session_start();?>
<?php include "session_check.php";?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Dashboard - Admin</title>
  <?php include 'dependencies(scripts).php' ?>
  <?php include "dependencies(css).php"; include "DBConn.php";?>
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
              <h3>Dashboard</h3>
            </div>
            <div class="card-body">
                <h4>Research Numbers</h4>
                <hr>
                <div class="container">
                    <div class="row">
                    <div class="col-md-4" style="margin-top: 10px;">
                        <div class="card">
                                <div class="card-body second-color" style="text-align: left; color: white;">
                                    <?php             
                                    $sql = "SELECT research_code from research_files";
                                    $result = mysqli_query($conn, $sql);
                                    ?>
                                    <h2><?php echo $result->num_rows; ?></h2>
                                    <h6>Total Number of Research</h6>
                                </div>
                            </div>
                        </div>

                        <?php 
                        //card for dashboard, for departments
                        $sql = "SELECT department_id as id, department_name as name, (select count(department) from research_files where department = id) as r_number, (((select count(department) from research_files where department = id) / (SELECT count(*) from research_files)) * 100) as percentage from departments";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                        ?>

                        <div class="col-md-4" style="margin-top: 10px;">
                            <div class="card">
                                <div class="card-body second-color" style="text-align: left; color: white;">
                                    <h2><?php echo $row['r_number']; ?> &#8226; <?php echo number_format((float)$row['percentage'], 1, '.', ''); ?>%</h2>
                                    <h6><?php echo $row['name']; ?></h6>
                                </div>
                            </div>
                        </div>

                        <?php
                        }

                        ?>
                        

                    </div>
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

</html>
