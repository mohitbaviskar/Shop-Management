<?php
include_once ('root.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <title>Shop Management System</title>
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <!-- Icon -->
        <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
        <!-- Slicknav -->
        <link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">
        <!-- Nivo Lightbox -->
        <link rel="stylesheet" type="text/css" href="assets/css/nivo-lightbox.css">
        <!-- Animate -->
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <!-- Responsive Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
        <!--fa fa icon-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
      <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#main-navbar"
              aria-controls="main-navbar"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
            </button>           
          </div>
          <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
              <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="new-user.php">Create new user</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="transactions.php">Transactions</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="purchases.php">Purchases</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="orders.php">Orders</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="ingredients.php">Ingredients</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="suppliers.php">Suppliers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="staff.php">Staff details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu</a>
              </li>
            </ul>
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="mobile-menu">
          <li>
            <a class="page-scroll" href="dashboard.php">Dashboard</a>
          </li>
          <li>
            <a class="page-scroll" href="new-user.php">Create new user</a>
          </li>
          <li>
            <a class="page-scroll" href="transactions.php">Transactions</a>
          </li>
          <li>
            <a class="page-scroll" href="purchases.php">Purchases</a>
          </li>
          <li>
            <a class="page-scroll" href="orders.php">Orders</a>
          </li>
          <li>
            <a class="page-scroll" href="ingredients.php">Ingredients</a>
          </li>
          <li>
            <a class="page-scroll" href="suppliers.php">Suppliers</a>
          </li>
          <li>
            <a class="page-scroll" href="menu.php">Menu</a>
          </li>
        </ul>
        <!-- Mobile Menu End -->
      </nav>
      <!-- Navbar End -->
    </header>
        <br /><br />
        <section class="section-padding">
            <div class="container">
                <div class="section-title-header text-center">
                    <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">
                      Ingredients
                    </h1>
                  </div></br>
                <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-4 col-md-2">
                    <p style="font-size: 15px; padding-top: 13px;">Display ingredients:</p>
                  </div>
                  <div class="col-4 col-md-2" style="padding-top: 10px;">
                    <select name="duration" class="custom-select category">
                        <option value="all">All</option>
                        <option value="finishing">Finishing</option>
                        <option value="finished">Finished</option>
                      </select>
                  </div>
                  <div class="col-1"></div>
                  <div class="col-1">
                    <button type="button" id="go" class="btn btn-common btn-nv-sty">
                      Go
                    </button>
                  </div>
                </div>

            </div></br>
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <table style="width: 100%;" id="ingredients" class="styled-table">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Currently available quantity</th>
                            </tr>
                          </thead>
                          <?php
                          $sql = "SELECT * from ingredients";
                          if($result = mysqli_query($link,$sql)){
                            if(mysqli_num_rows($result) > 0){
                              while($row = mysqli_fetch_array($result)){
                                echo $row['i_name'];
                                $i = $row['i_name'];
                                $q = $row['i_quantity'];
                        ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $q; ?></td>
                        </tr>
                        <?php
                              }
                            }
                          }
                        ?>
                          </table>
                    </div>
                </div>             
              <div class="container-fluid br-line"></div>
            </div>
          </section>

        <!-- Go to Top Link -->
    <a href="#" class="back-to-top">
        <i class="lni-chevron-up"></i>
      </a>
  
      <div id="preloader">
        <div class="sk-circle">
          <div class="sk-circle1 sk-child"></div>
          <div class="sk-circle2 sk-child"></div>
          <div class="sk-circle3 sk-child"></div>
          <div class="sk-circle4 sk-child"></div>
          <div class="sk-circle5 sk-child"></div>
          <div class="sk-circle6 sk-child"></div>
          <div class="sk-circle7 sk-child"></div>
          <div class="sk-circle8 sk-child"></div>
          <div class="sk-circle9 sk-child"></div>
          <div class="sk-circle10 sk-child"></div>
          <div class="sk-circle11 sk-child"></div>
          <div class="sk-circle12 sk-child"></div>
        </div>
      </div>
      <script>
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }
  
        function closeForm() {
          document.getElementById("myForm").style.display = "none";
        }
      </script>
      <script>
        $(document).ready(function () {
          $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none",
          });
  
          $(".zoom").hover(
            function () {
              $(this).addClass("transition");
            },
            function () {
              $(this).removeClass("transition");
            }
          );
        });
      </script>
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="assets/js/jquery-min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/jquery.countdown.min.js"></script>
      <script src="assets/js/jquery.nav.js"></script>
      <script src="assets/js/jquery.easing.min.js"></script>
      <script src="assets/js/wow.js"></script>
      <script src="assets/js/jquery.slicknav.js"></script>
      <script src="assets/js/nivo-lightbox.js"></script>
      <script src="assets/js/main.js"></script>
    </body>
  </html>
  