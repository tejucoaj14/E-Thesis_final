<?php
    include "DBConn.php";

    if(!isset($_GET['page']) || $_GET['page'] < 0){
        $page = 0;
    }
    else{
        $page = $_GET['page'];
    }

    $dept = isset($_GET['department']) ? $_GET['department'] : null;
    $kw = isset($_GET['keyword']) ? $_GET['keyword'] : null;
    $orde = isset($_GET['order']) ? $_GET['order'] : null;
    $orderby = isset($_GET['order']) ? "ORDER BY $orde asc" : " ";
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Researches - E-Thesis</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <?php include "dependencies(css).php";
        include "designfooter.php";
    ?>

 
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" onload="no_display();">


    <div class="site-wrap">


        <!-- Navigation bar -->
        <?php include "header.php"; ?>

        <div class="top-spacing-research"></div>

        <!-- search and sort -->
        <div class="d-flex flex-row-reverse">

            

            <button class="btn search-btn filter-search" id="searchBtn" onclick="search_action();">Search</button>
            <input style="width: 30%; margin-right: 2px;" id="search" value="<?php echo isset($kw) ? $kw : '';?>" class="search-bar form-control search" type="text" name="" value="" placeholder="Search Research by Title, Author, or Tags" onkeyup="search()">

            <!-- Filter -->
            
            <select class='form-control filter-sort' id="filter" onchange="location = this.value" style="width: 10%; margin-right: 2px; margin-botton: 2px;" onchange="search()">
                <option value="all">Department</option>

                <?php
                   
                    $sqlForDept = "SELECT * from departments";
                    $result = mysqli_query($conn, $sqlForDept);

                    while ($row = mysqli_fetch_array($result)) { ?>

                        <option value="<?php redirecting("department", $row['department_id']); ?>"><?php echo $row['department_name']; ?></option>

                    <?php

                    }
                ?>
            </select>
            



            <!--  Sort -->
            <select class='form-control filter-sort' onchange="location = this.value" id="sort" style="width: 10%; margin-right: 2px; margin-botton: 2px;" onchange="search()">
                <option value="<?php redirecting("order", ""); ?>">Order By</option>
                <option value="<?php redirecting("order", "date_of_research");?>">Date</option>
                <option value="<?php redirecting("order", "thesis_title");?>">Title</option>
                <option value="<?php redirecting("order", "author");?>">Author</option>

            </select>
        </div>

        <div class="table-responsive" style="margin-top: 5px;">

            <table class="table table-hover table-bordered">
                <thead class="table-head">
                    <tr style="text-align: left;">
                        <th scope="col" width="30%">Title</th>
                        <th scope="col" width="25%">Authors</th>
                        <th scope="col" width="15%">Place of Study</th>
                        <th scope="col" width="15%">Date of Research</th>
                        <th scope="col" width="5%">View</th>
                    </tr>
                </thead>
                <tbody id="table">


                    <!-- Show uploaded studies from DATABASE -->
                    <?php

                    

                    $showStudiesQuery = "SELECT research_code, thesis_title, author, place_of_study, DATE_FORMAT(date_of_research, '%M %d %Y') as date_of_research FROM research_files  $orderby LIMIT 10 OFFSET $page";
                    $sqlForNumRows = "SELECT COUNT(research_code) as numb from research_files ";
                    
                    if(isset($_GET['department']) && isset($_GET['keyword'])){
                        $department = $_GET['department'];
                        $keyword = $_GET['keyword'];
                        $keyword1 = "%{$_GET['keyword']}%";
                        $condition = "WHERE department = '$department' AND (thesis_title LIKE ? OR author LIKE ? OR tags LIKE ?) ";
                        $showStudiesQuery = $conn->prepare(substr_replace($showStudiesQuery, $condition, 142, 0));
                        $showStudiesQuery->bind_param("sss", $keyword1, $keyword1, $keyword1);

                        $sqlForNumRows = $conn->prepare($sqlForNumRows . $condition);
                        $sqlForNumRows->bind_param("sss", $keyword1, $keyword1, $keyword1);
                    }
                    else if(!isset($_GET['department']) && isset($_GET['keyword'])){
                        $keyword = $_GET['keyword'];
                        $keyword1 = "%{$_GET['keyword']}%";
                        $condition = "WHERE thesis_title LIKE ? OR author LIKE ? OR tags LIKE ? ";
                        $showStudiesQuery = $conn->prepare(substr_replace($showStudiesQuery, $condition, 142, 0));
                        $showStudiesQuery->bind_param("sss", $keyword1, $keyword1, $keyword1);

                        $sqlForNumRows = $conn->prepare($sqlForNumRows . $condition);
                        $sqlForNumRows->bind_param("sss", $keyword1, $keyword1, $keyword1);
                    }
                    else if(isset($_GET['department']) && !isset($_GET['keyword'])){
                        $department = $_GET['department'];
                        $condition = "WHERE department = ? ";

                        $showStudiesQuery = $conn->prepare(substr_replace($showStudiesQuery, $condition, 142, 0));
                        $showStudiesQuery->bind_param("s", $department);

                        $sqlForNumRows = $conn->prepare($sqlForNumRows . $condition);
                        $sqlForNumRows->bind_param("s", $department);
                    }
                    else {
                        $number1 = 1;
                        $showStudiesQuery = $conn->prepare(substr_replace($showStudiesQuery, "WHERE ?", 142, 0));
                        $showStudiesQuery->bind_param("i", $number1);
                        $sqlForNumRows = $conn->prepare($sqlForNumRows . "WHERE ?");
                        $sqlForNumRows->bind_param("i", $number1);
                    }

                    
                    


                    $showStudiesQuery->execute();
                    
                    $result = $showStudiesQuery->get_result();

                    $sqlForNumRows->execute();

                    $resultNumRows = $sqlForNumRows->get_result();


                    while($rowNumRows = mysqli_fetch_array($resultNumRows)){
                        $num_rows = $rowNumRows['numb'];  
                    }
                    
                    
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr data-toggle="tooltip" data-placement="bottom" title="<?php echo $row['thesis_title']; ?>">
                            <td><?php echo $row['thesis_title']; ?></td>
                            <td><?php echo $row['author']; ?></td>
                            <td><?php echo $row['place_of_study']; ?></td>
                            <td><?php echo $row['date_of_research']; ?></td>
                            <td><a href="research_info.php?research_code=<?php echo $row['research_code']; ?>">View</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <!-- End -->
                </tbody>
            </table>

            <div class="topnav" style="margin: absolute !important;">
                <center id="bottom_display" style="margin-bottom: 30px; margin-top: 30px;">
                    <div style="margin-bottom: 1%;">
                        <a <?php 
                            if($page != 0){
                                ?>
                                href="researches.php?<?php

                                    $pagenum;

                                    if($page - 10 < 0){
                                        $pagenum = 0;
                                    }
                                    else{
                                        $pagenum = $page - 10;
                                    };

                                    
                                    $params = array_merge($_GET, array("page" => $pagenum));

                                    $new_query_string = http_build_query($params);

                                    echo $new_query_string;

                                ?>
                                "<?php
                            } ?> style="margin-right: 5px;"><- Previous</a>
                        <a <?php
                            if($page + 10 < $num_rows){
                                ?>
                                href="researches.php?<?php

                                    $params = array_merge($_GET, array("page" => $page + 10));

                                    $new_query_string = http_build_query($params);

                                    echo $new_query_string;
                                ?>"<?php
                            }
                            ?>style="magrin-left: 5px;">Next -></a>
                    </div>
                </center>
            </div>

            

        </div>

        <!-- Search -->
        <script>
            function search_action(){

                if(document.getElementById('search').value != ''){
                    location.href = '<?php search_redirect(); ?>' + document.getElementById('search').value;
                }
            };

            function no_display(){
                if(<?php echo $num_rows; ?> == 0){
                    document.getElementById('bottom_display').innerHTML = 'No results'; 
                }
            };

            var input = document.getElementById("search");

            // Execute a function when the user releases a key on the keyboard
            input.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                document.getElementById("searchBtn").click();
            }
            });
        </script>

                
                
        


        <?php

          
        function redirecting($condition, $filterBy) {
            $params = array_merge($_GET, array("$condition" => $filterBy));

            $new_query_string = http_build_query($params);

            echo "researches.php?" . $new_query_string;
        }

        function blank($willBeUnset){
            unset($_GET[$willBeUnset]);

            $new_query_string = http_build_query($GET);

            echo "researches.php?" . $new_query_string;
        }

        
        function search_redirect(){

            unset($_GET['keyword']);

            $new_query_string = http_build_query($_GET);

            $url1 = "researches.php?" . $new_query_string . "&keyword=";

            echo $url1;
        }

        include "footer.php"; ?>

    </div>

    

  <?php include "dependencies(scripts).php"; ?>
</body>
</html>
