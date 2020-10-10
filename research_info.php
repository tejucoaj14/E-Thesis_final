<!DOCTYPE html>
<html lang="en">

<head>
    <title>Resarch Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <?php
        include "dependencies(css).php";
    ?>


</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <!-- Navigation bar -->
        <?php include "header.php"; include "DBconn.php";?>
        
        <div class="top-spacing"></div>

        <?php 
        
        if(isset($_GET['research_code'])){
            $research_code = $_GET['research_code'];
            $sql = "SELECT r.research_code, r.thesis_title, r.author, DATE_FORMAT(r.date_of_research, '%M %d, %Y') as date_of_research, r.place_of_study, r.summary, r.tags, d.department_name as department from research_files as r inner join departments as d ON r.department = d.department_id where r.research_code = $research_code";

            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0){

                while ($row = mysqli_fetch_array($result)) { ?>

                    <div class="jumbotron jumbotron-fluid headline-banner">
                        <div class="inner-spacing-headline"></div>
                        <div class="container col-lg-8">
                            <h1 class="display-4 header-title"><?php echo $row['thesis_title']; ?></h1>
                            <h2 class="lead header-subtitle"><?php echo $row['author']; ?> | <?php echo $row['date_of_research']; ?> | <?php echo $row['place_of_study']; ?> | <?php echo $row['department']; ?></h2>
                        </div>
                    </div>    

                    
                    <div class="col-lg-8 info-body">
                        <h2 class="lead header-summary">Summary</h2>
                        <div class="border-top my-3"></div>
                        <h2 class="lead header-paragraph"><?php echo $row['summary']; ?>.</h2>
                    </div>

                <?php
                    
                }
            }
            else { ?>
                <div class="col-lg-12 error-body" style="height: 500px;">
                    <h2 class="lead header-summary error-msg">No results</h2> 
                </div>
            
            <?php

            }
            

        }
        else { ?>
            <div class="col-lg-12 error-body" style="height: 500px;">
                <h2 class="lead header-summary error-msg">No results</h2> 
            </div>
        <?php 
        }
        
        ?>
        
        <div class="top-spacing"></div>
        
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