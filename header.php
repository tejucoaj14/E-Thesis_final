<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
    <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.html" class="d-block">
              <img src="images/cvsu-logo.png" alt="Image" class="img-fluid cvsu-logo">
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li>
                  <a href="index.php" class="nav-link text-left">Home</a>
                </li>
                <li class="has-children">
                  <a href="researches.php" class="nav-link text-left">Researches</a>
                  <ul class="dropdown">

                  <?php

                    include "DBConn.php";

                   
                    $sqlForDept = "SELECT * from departments";
                    $result = mysqli_query($conn, $sqlForDept);

                    while ($row = mysqli_fetch_array($result)) { ?>
                      
                      <li><a href="researches.php?department=<?php echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></a></li>


                    <?php

                    }
                  ?>
                  </ul>
                </li>
                <li>
                  <a href="about.php" class="nav-link text-left">About Us</a>
                </li>
                <!-- <li>
                    <a href="contact.html" class="nav-link text-left">Contact</a>
                  </li> -->
              </ul>                                                                                                                                                                                                                                                                                          </ul>
            </nav>
          </div>
          <div class="ml-auto">
            <div class="social-wrap">
              <a href="#" class="icons-btn"><span class="icon-facebook nav-link"></span></a>
              <a href="#" class="icons-btn"><span class="icon-youtube nav-link"></span></a>

              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black icons-btn"><span
                class="icon-menu h3 nav-link"></span></a>
            </div>
          </div>
        </div>
    </div>
</header>