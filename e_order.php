<?php
include_once ('root.php');
if(isset($_POST['order'])){
  $b = 0;
  $dish = $_POST['dishname'];
  $quantity = $_POST['quantity'];
  $cno = $_POST['customernumber'];
  $sql="SELECT ingredients.i_quantity,requirements.r_quantity FROM ingredients,requirements WHERE ingredients.i_name = requirements.i_name and requirements.i_name in (SELECT ingredients.i_name FROM requirements WHERE d_name='$dish')";
  if($res = mysqli_query($link,$sql)){ 
    if(mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_array($res)){
        if($row['i_quantity'] > ($row['r_quantity']*$quantity))
        {
          continue;
        }
        else{
          $b = 1;
          break;
        }
      }
    }
  }
  if($b == 1){
    echo "<h4>Not sufficient ingredients</h4>";
  }
  else{
    $sql1="SELECT ingredients.i_quantity,requirements.r_quantity,ingredients.i_name FROM ingredients,requirements WHERE ingredients.i_name = requirements.i_name and requirements.i_name in (SELECT ingredients.i_name FROM requirements WHERE d_name='$dish')";
    if($res1 = mysqli_query($link,$sql1)){ 
      if(mysqli_num_rows($res1) > 0){
        while($row = mysqli_fetch_array($res1)){
          $sub=$row['r_quantity']*$quantity;
          $iname = $row['i_name'];
          $sql2="UPDATE ingredients SET i_quantity=i_quantity-$sub WHERE i_name='$iname'";
          $res2 = mysqli_query($link,$sql2);
        }
      }
    }
    $sql3 = "SELECT d_price FROM menu WHERE d_name='$dish'";
    $res3 = mysqli_query($link,$sql3);
    $amt = 0;
    if($row = mysqli_fetch_array($res3)){
      $amt = $quantity * $row['d_price'];
    }
    $des=$dish." quantity-".strval($quantity)." customerno-".strval($cno)." amount-".strval($amt);
    $sql4 = "INSERT INTO transaction (t_type,t_description,t_amount) VALUES ('bill','$des','$amt')";
    $result4 = mysqli_query($link,$sql4);
    $sql5="SELECT MAX(t_id) as last FROM transaction";
    $result5 = mysqli_query($link,$sql5);
    $row = mysqli_fetch_array($result5);
    $last = $row['last'];
    $sql6="SELECT t_id,t_timestamp FROM transaction WHERE t_id='$last'";
    $result6=mysqli_query($link,$sql6);
    $row = mysqli_fetch_array($result6);
    $tid=$row['t_id'];
    $ctime=$row['t_timestamp'];
    $sql7="INSERT INTO orders (d_name,o_quantity,t_id,o_amount,o_timestamp,c_number) VALUES ('$dish','$quantity','$tid','$amt','$ctime','$cno')";
    $result7=mysqli_query($link,$sql7);
    $sql8 = "UPDATE customers SET frequency=frequency + 1 WHERE c_number='$cno'";
    $res8= mysqli_query($link,$sql8);
  }
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
                  <a class="nav-link" href="e_order.php">Orders</a>
                </li>
                <li class="nav-item">
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
                              echo "<h4>Record found : {$cno}   {$cname}    {$freq} </h4>";
                            }
                          }
                          else{
                            echo "<h4> NO customer found </h4>";
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
                          echo "<h4> CUSTOMER ADDED</h4>";
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
                          <button name="order" type="submit" id="submit" class="btn btn-common btn-nv-sty">
                            Submit
                          </button>
                        </div>
                      </div>
                      </form>
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