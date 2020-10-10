<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Thesis</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <?php
        include "dependencies(css).php";
        include "DBConn.php";
    ?>


</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <!-- Navigation bar -->
        <?php include "header.php"; ?>
        
        <div class="top-spacing"></div>
        <div class="jumbotron jumbotron-fluid page-banner">
            <div class="inner-spacing"></div>
            <div class="container">
                <h1 class="display-4 home-title">E-Thesis</h1>
                <h2 class="lead home-subtitle">Cavite State University - Imus Campus Research Studies Library.</h2>
            </div>
        </div>
    

        <div></div>

        <div class="col-sm-6 feature-header header-container">
            <div class="feature-header">
                <center>
                    <h1 class="feature-head">What's on our shelves?</h1>
                </center>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row" style="margin-bottom: 4%; margin-top: 0.5%">
                    <div class="col-sm-4 nopadding  d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                                <center><b><h5 class="card-title">Studies</b></h5></center>
                                <center><p class="card-text">With 
                                <?php

                                    $sql = "SELECT research_code from research_files";
                                    $result = mysqli_query($conn, $sql);
                                    echo $result->num_rows;

                                ?> research studies.</p></center>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 nopadding  d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                                <center><b><h5 class="card-title">Fields</b></h5></center>
                                <center><p class="card-text">Comes from 
                                <?php

                                    $sql = "SELECT department_id from departments";
                                    $result = mysqli_query($conn, $sql);
                                    echo $result->num_rows;

                                ?> field of studies.</p></center>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 nopadding  d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                                <center><b><h5 class="card-title">Latest</b></h5></center>
                                <center><p class="card-text">With 
                                <?php

                                    $sql = "SELECT department_id from departments";
                                    $result = mysqli_query($conn, $sql);
                                    echo $result->num_rows;

                                ?> related topics.</p></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="call-to-action-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content d-flex align-items-center justify-content-between flex-wrap">
                        <h3>Don't forget to give us acknowledgement!</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include "footer.php"; ?>
    

  </div>
  <!-- .site-wrap -->

  <?php include "dependencies(scripts).php"; ?>
</body>

</html>