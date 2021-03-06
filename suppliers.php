<?php
include_once ('root.php');
if(isset($_POST['insert'])){
  $sname=$_POST['suppliername'];
  $snumber=$_POST['suppliernumber'];
  $iname=$_POST['ingredientsupplied'];
  $iquantity=0;
  
  // making entry of new ingredient to ingredient table
  
  $sql3="INSERT INTO ingredients VALUES ('$iname','$iquantity')";
  
  $result = mysqli_query($link,$sql3);
  
  // making entry of new supplier into supplier info table 
  
  $sql2="INSERT INTO supplier_info VALUES ('$sname','$snumber')";
  
  $result2 = mysqli_query($link,$sql2);
  
  // making entry of supplier and corresponding ingredient bought from him
  
  $sql1="INSERT INTO ingredient_supplier VALUES ('$iname','$snumber')";
  
  $result1 = mysqli_query($link,$sql1);
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
              <li class="nav-item">
                <a class="nav-link" href="purchases.php">Purchases</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="orders.php">Orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ingredients.php">Ingredients</a>
              </li>
              <li class="nav-item active">
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
                      Suppliers
                    </h1>
                </div></br>
                <h1 style="font-size: 30px; text-align: center;">Enter new supplier information</h1>
                <form id='insert-form' action="" method="POST">
                <div class="row">
                  <div class="col-1.5">
                    <p style="font-size: 15px; padding-top: 13px;">Supplier name:</p>
                  </div>
                  <div class="col-3 col-md-2" style="padding-top: 10px;">
                    <input type="text" class="form-control" name="suppliername"/>
                  </div>
                  <div class="col-1.5">
                    <p style="font-size: 15px; padding-top: 13px;">Mobile number of supplier:</p>
                  </div>
                  <div class="col-3 col-md-2" style="padding-top: 10px;">
                    <input type="text" class="form-control" name="suppliernumber"/>
                  </div>
                  <div class="col-1.5">
                    <p style="font-size: 15px; padding-top: 13px;">Ingredient supplied:</p>
                  </div>
                  <div class="col-3 col-md-2" style="padding-top: 10px;">
                    <input type="text" class="form-control" name="ingredientsupplied"/>
                  </div>
                  <div class="col-1"></div>
                  <div class="col-0.5">
                    <button name="insert" type="submit" id="go" class="btn btn-common btn-nv-sty">
                      Go
                    </button>
                  </div>
                </div>
                </form>
                <div class="container-fluid br-line"></div><br />
            </div></br>
            <h1 style="font-size: 30px; text-align: center;">List of all suppliers</h1>
            <div class="container">
              <table style="width: 100%;" id="transactions" class="styled-table">
                <?php
                    
                    // selecting details about suppliers
                    
                    $sql2 = "SELECT * FROM supplier_info,ingredient_supplier where supplier_info.s_number=ingredient_supplier.s_number";
                    
                    if($result = mysqli_query($link,$sql2)){
                        if(mysqli_num_rows($result) > 0){
                ?>
                <thead>
                <tr>
                  <th>Supplier name</th>
                  <th>Mobile number</th>
                  <th>Ingredient supplied</th>
                </tr>
                </thead>
                <?php
                        while($row = mysqli_fetch_array($result)){
                            $dname = $row['s_name'];
                            $ddesc = $row['s_number'];
                            $dtype = $row['i_name'];
                ?>
                <tr>
                <td><?php echo $dname; ?></td>
                <td><?php echo $ddesc; ?></td>
                <td><?php echo $dtype; ?></td>
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
  