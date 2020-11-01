<?php
include_once ('root.php');
if(isset($_POST['order'])){
}
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
                <li class="nav-item active">
                  <a class="nav-link" href="e_order.html">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="e_menu.html">Menu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="e_ingredients.html">Ingredients</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="e_requirements.html">Requirements</a>
                </li>
              </ul>
            </div>
          </div>
  
          <!-- Mobile Menu Start -->
          <ul class="mobile-menu">
            <li>
              <a class="page-scroll" href="e_order.html">Orders</a>
            </li>
            <li>
              <a class="page-scroll" href="e_menu.html">Menu</a>
            </li>
            <li>
              <a class="page-scroll" href="e_ingredients.html">Ingredients</a>
            </li>
            <li>
              <a class="page-scroll" href="e_requirements.html">Requirements</a>
            </li>
          </ul>
          <!-- Mobile Menu End -->
        </nav>
        <!-- Navbar End -->
      </header>
      <br /><br /><br />
            <section id="form-dom" class="services">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <div id="form-main">
                      <h1
                        class="section-title wow fadeInUp animated"
                        data-wow-delay="0.2s"
                        style="visibility: visible; -webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s;animation-delay: 0.2s;">
                        Orders
                      </h1><br />
                      <h1 style="font-size: 30px; text-align: center;">Search customer</h1>
                      <form action="" method="post">
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-5 col-md-3">
                          <p style="font-size: 15px; padding-top: 13px;">Customer Mobile Number:</p>
                        </div>
                        <div class="col-3 col-md-2" style="padding-top: 10px;">
                          <input type="text" class="form-control" name="mobileno"/>
                        </div>
                        <div class="col-1 col-md-1"></div>
                        <div class="col-1 col-md-1" style="padding-left:25px">
                            <button name="search" type="submit" id="search" class="btn btn-common btn-nv-sty">
                              Search
                            </button>
                        </div>
                      </div>
                      </form>
                      <?php
                        $cno="";
                        $cname="";
                        $freq="";
                        if(isset($_POST['search'])){
                          $no = $_POST['mobileno'];
                          $sql = "SELECT * from customers WHERE c_number='$no'";
                          $res = mysqli_query($link,$sql);
                          if(mysqli_num_rows($res) > 0){
                            while($row = mysqli_fetch_array($res)){
                              $cno = $row['c_number'];
                              $freq=$row['frequency'];
                              $cname = $row['c_name'];
                              echo "<h4 style="text-align:center;">Record found : {$cno}   {$cname}    {$freq} </h4>";
                            }
                          }
                          else{
                            echo "<h4 style="text-align:center; color: red"> NO customer found </h4>";
                          }
                        }
                      ?>
                      
                      <div class="container-fluid br-line"></div>
                      <br />
                      <h1 style="font-size: 30px; text-align: center;">Enter new customer</h1>
                      <form action="" method="post">
                      <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-2 col-md-1">
                          <p style="font-size: 15px; padding-top: 13px;">Name:</p>
                        </div>
                        <div class="col-3 col-md-2" style="padding-top: 10px;">
                            <input type="text" class="form-control" name="name"/>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-1.5">
                          <p style="font-size: 15px; padding-top: 13px;">Mobile number:</p>
                        </div>
                        <div class="col-3 col-md-1.5" style="padding-top: 10px;">
                            <input type="text" class="form-control" name="mobileno"/>
                        </div>
                        <div class="col-5 col-md-1"></div>
                        <div class="col-1">
                          <button name="addnew" type="submit" id="add" class="btn btn-common btn-nv-sty">
                            Add
                          </button>
                        </div>
                      </div>
                      </form>
                      <?php
                        if(isset($_POST['addnew'])){
                          $name= $_POST['name'];
                          $mobile =$_POST['mobileno'];
                          $freq = 1;
                          $sql1 = "INSERT INTO customers VALUES ('$mobile','$name','$freq')";
                          $res= mysqli_query($link,$sql1);
                          echo "<h4 style="text-align:center;"> CUSTOMER ADDED</h4>";
                        }
                      ?>
                      <div class="container-fluid br-line"></div>
                      <div class="design"><br />
                        <h1 style="font-size: 30px; text-align: center;">New order</h1>
                      <form action="" method="POST">
                      <div class="row">
                          <div class="col-4 col-md-2">
                            <p style="font-size: 15px; padding-top: 13px;">Customer mobile number:</p>
                          </div>
                          <div class="col-5 col-md-2" style="padding-top: 10px;">
                              <input type="text" class="form-control" name="customernumber"/>
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-4 col-md-1">
                              <p style="font-size: 15px; padding-top: 13px;">Dish name:</p>
                          </div>
                          <div class="col-5 col-md-2" style="padding-top: 10px;">
                              <input type="text" class="form-control" name="dishname"/>
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-4 col-md-1">
                              <p style="font-size: 15px; padding-top: 13px;">Quantity:</p>
                          </div>
                          <div class="col-5 col-md-2" style="padding-top: 10px;">
                              <input type="text" class="form-control" name="quantity"/>
                          </div>
                        </div><br />
                        <div style="text-align: center;">
                          <button type="button" id="submit" class="btn btn-common btn-nv-sty">
                            Submit
                          </button>
                        </div>
                      </div>
                      <br />
                    <div class="container-fluid br-line"></div>
              </div>
            </div>
          </div>
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