<?php
include_once ('root.php');
if(isset($_POST['add'])){
  $ingredientname=$_POST['ingredientname'];
  $supplierno=$_POST['suppliernumber'];
  $quantity=$_POST['quantity'];
  $amt=$_POST['amount'];
  $iquantity=$quantity;
  $sql6="INSERT INTO ingredients VALUES ('$ingredientname','$iquantity')";
  $result = mysqli_query($link,$sql6);
  $sql7="INSERT INTO supplier_info (s_number) VALUES ('$supplierno')";
  $result2 = mysqli_query($link,$sql7);
  $sql8="INSERT INTO ingredient_supplier VALUES ('$ingredientname','$supplierno')";
  $result1 = mysqli_query($link,$sql8);
  $des=$ingredientname." quantity-".strval($quantity)." supplierno-".strval($supplierno)." amount-".strval($amt);
  $sql = "INSERT INTO transaction (t_type,t_description,t_amount) VALUES ('payment','$des','$amt')";
  $result = mysqli_query($link,$sql);
  $sql1="SELECT MAX(t_id) as last FROM transaction";
  $result2 = mysqli_query($link,$sql1);
  $row = mysqli_fetch_array($result2);
  $last = $row['last'];
  $sql2="SELECT t_id,t_timestamp FROM transaction WHERE t_id='$last'";
  $result3=mysqli_query($link,$sql2);
  $row = mysqli_fetch_array($result3);
  $tid=$row['t_id'];
  $ctime=$row['t_timestamp'];
  $sql4="INSERT INTO purchase (i_name,p_quantity,t_id,p_amount,p_timestamp,s_number) VALUES ('$ingredientname','$quantity','$tid','$amt','$ctime','$supplierno')";
  $result4=mysqli_query($link,$sql4);
  $sql5="UPDATE ingredients SET i_quantity=i_quantity+$quantity WHERE i_name='$ingredientname'";
  $result6=mysqli_query($link,$sql5);
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
              <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="new-user.php">Create new user</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="transactions.php">Transactions</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="purchases.php">Purchases</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="orders.php">Orders</a>
              </li>
              <li class="nav-item">
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
                      Purchases
                    </h1>
                  </div></br>
                  <h1 style="font-size: 30px; text-align: center;">Enter new purchase details</h1>
                    <form action="" method="POST">
                    <div class="row">
                    <div class="col-2 col-md-1">
                        <p style="font-size: 15px; padding-top: 13px;">Ingredient name:</p>
                    </div>
                    
                    <div class="col-4 col-md-2" style="padding-top: 10px;">
                        <input type="text" class="form-control" name="ingredientname"/>
                    </div>
                    <div class="col-2 col-md-1">
                        <p style="font-size: 15px; padding-top: 13px;">Supplier mobile number:</p>
                    </div>
                    <div class="col-4 col-md-2" style="padding-top: 10px;">
                        <input type="text" class="form-control" name="suppliernumber"/>
                    </div>
                    <div class="col-1.5">
                        <p style="font-size: 15px; padding-top: 13px;">Quantity:</p>
                    </div>
                    <div class="col-4 col-md-2" style="padding-top: 10px;">
                        <input type="text" class="form-control" name="quantity"/>
                    </div>
                    <div class="col-1.5">
                        <p style="font-size: 15px; padding-top: 13px;">Amount:</p>
                    </div>
                    <div class="col-4 col-md-2" style="padding-top: 10px;">
                        <input type="text" class="form-control" name="amount"/>
                    </div>
                    <div class="col-4 col-md-5"></div>
                    <div class="col-2 col-md-1" style="padding-left:25px">
                        <button name="add" type="submit" id="add" class="btn btn-common btn-nv-sty">
                        Add/Update
                        </button>
                    </div>
                    </div>
                    <div class="container-fluid br-line"></div><br />
                    </form>
                </div>
                <h1 style="font-size: 30px; text-align: center;">List of purchases</h1><br />
            </div>
            <div class="container">
              <table style="width: 100%;" id="purchases" class="styled-table">
                <?php
                $sql2 = "SELECT * FROM purchase";
                if($result = mysqli_query($link,$sql2)){
                    if(mysqli_num_rows($result) > 0){
                ?>
                <thead>
                <tr>
                  <th>Transaction ID</th>
                  <th>Ingredient name</th>
                  <th>Quantity</th>
                  <th>Amount</th>
                  <th>Supplier Mobile number</th>
                  <th>Date and Time</th>
                </tr>
                </thead>
                <?php
                      while($row = mysqli_fetch_array($result)){
                        $dname = $row['t_id'];
                        $ddesc = $row['i_name'];
                        $dtype = $row['p_quantity'];
                        $dprice = $row['p_amount'];
                        $cnumber=$row['s_number'];
                        $datetime = $row['p_timestamp'];
                ?>
                <tr>
                    <td><?php echo $dname; ?></td>
                    <td><?php echo $ddesc; ?></td>
                    <td><?php echo $dtype; ?></td>
                    <td><?php echo $dprice; ?></td>
                    <td><?php echo $cnumber; ?></td>
                    <td><?php echo $datetime; ?></td>
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
  