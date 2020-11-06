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
                  <a class="nav-link" href="e_order.php">Orders</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="e_menu.php">Menu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="e_ingredients.php">Ingredients</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="e_requirements.php">Requirements</a>
                </li>
              </ul>
            </div>
          </div>
  
          <!-- Mobile Menu Start -->
          <ul class="mobile-menu">
            <li>
              <a class="page-scroll" href="e_order.php">Orders</a>
            </li>
            <li>
              <a class="page-scroll" href="e_menu.php">Menu</a>
            </li>
            <li>
              <a class="page-scroll" href="e_ingredients.php">Ingredients</a>
            </li>
            <li>
              <a class="page-scroll" href="e_requirements.php">Requirements</a>
            </li>
          </ul>
          <!-- Mobile Menu End -->
        </nav>
        <!-- Navbar End -->
      </header>
      <br /><br />
    <section class="section-padding">
      <div class="container">
        <h1
        class="section-title wow fadeInUp animated"
        data-wow-delay="0.2s"
        style="visibility: visible; -webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s;animation-delay: 0.2s;">
        Menu
        </h1><br />
        <table style="width: 100%;" id="menu" class="styled-table">
            <?php
                
                // selecting details of dishes from  menu
                
                $sql = "SELECT * from menu";
                
                if($result = mysqli_query($link,$sql)){
                    if(mysqli_num_rows($result) > 0){
            ?>                
            <thead>
                <tr>
                    <th>Dish name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Price</th>
                </tr>
            </thead>
            <?php
                while($row = mysqli_fetch_array($result)){
                    $i = $row['d_name'];
                    $q = $row['d_description'];
                    $r = $row['d_type'];
                    $p = $row['d_price'];
            ?>
            <tr>
                <th><?php echo $i; ?></th>
                <th><?php echo $q; ?></th>
                <th><?php echo $r; ?></th>
                <th><?php echo $p; ?></th>
            </tr>
            <?php
                    }
                }
            }
            ?>
        </table>
        <div class="container-fluid br-line"></div>
      </div>
    </section>
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