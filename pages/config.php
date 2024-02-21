<?php
session_start();
include('../dbconnect.php');

if (!isset($_SESSION['id'])) {
    $_SESSION['error_message'] = "You must log in to access this page.";
    header("Location: ../index_admin.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $target_dir = "uploads_qr/"; // Directory where uploaded files will be saved
  $target_file = $target_dir . basename($_FILES["image"]["name"]); // Full path of the uploaded file
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if ($check !== false) {
          // echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "<script>swal('Error', 'File is not an image', 'error');</script>";
          $uploadOk = 0;
      }
  }

  // Check file size
  if ($_FILES["image"]["size"] > 500000) { // Adjust size limit as needed
      echo "<script>swal('Error', 'Sorry, your file is too large', 'error');</script>";
      $uploadOk = 0;
  }

  // Allow certain file formats
  if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
      echo "<script>swal('Error', 'Sorry, only JPG, JPEG, and PNG files are allowed', 'error');</script>";
      $uploadOk = 0;
  }

  // Check if a file is already uploaded in the database
  $sql_check = "SELECT * FROM qr_code LIMIT 1";
  $result_check = mysqli_query($con, $sql_check);
  if (mysqli_num_rows($result_check) > 0) {
      // If a file exists, update the existing record in the database
      $row = mysqli_fetch_assoc($result_check);
      $attachment_path = mysqli_real_escape_string($con, $target_file);
      $sql = "UPDATE qr_code SET attachment = '$attachment_path' WHERE id = {$row['id']}";
      if(mysqli_query($con, $sql)) {
          $_SESSION['statuss'] = "File updated successfully!";
          $_SESSION['status_code'] = "success";
      } else {
          echo "<script>swal('Error', 'Error updating file', 'error');</script>";
          $uploadOk = 0;
      }
  } else {
      // If no file exists, move the uploaded file to the target directory and insert its path into the database
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          echo "<script>swal('Success', 'The file " . basename($_FILES["image"]["name"]) . " has been uploaded', 'success');</script>";

          // Insert into database
          $attachment_path = mysqli_real_escape_string($con, $target_file);
          $sql = "INSERT INTO qr_code (attachment) VALUES ('$attachment_path')";
          if(mysqli_query($con, $sql)) {
              echo "<script>swal('Success', 'Record inserted successfully', 'success');</script>";
          } else {
              echo "<script>swal('Error', 'Error inserting record', 'error');</script>";
          }
      } else {
          echo "<script>swal('Error', 'Sorry, there was an error uploading your file', 'error');</script>";
      }
  }
}
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>OMDC - Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- charts CSS
		============================================ -->
    <link rel="stylesheet" href="css/c3.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" type="image/jpg" href="../assets/Ortho.jpg">
    <style>
        .empty-list-item {
            height: 470px;
            /* Adjust the height as needed for spacing */
        }
    </style>
</head>

<body class="materialdesign">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Header top area start-->
    <div class="wrapper-pro">
        <div class="left-sidebar-pro">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="#"><img src="img/message/1.jpg" alt="" />
                    </a>
                    <h3>OrthoMagic Dental</h3>
                    <p>Admin</p>
                    <strong>OMD</strong>
                </div>
                <div class="left-custom-menu-adp-wrap">
                    <ul class="nav navbar-nav left-sidebar-menu-pro">
                        <li class="active">
                            <a href="dashboard.php" role="button" aria-expanded="false" class="nav-link"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Dashboard</span> </a>
                        </li>
                        <li class="active">
                            <a href="bookinglist.php" role="button" aria-expanded="false" class="nav-link"><i class="fa big-icon fa-book"></i> <span class="mini-dn">View Schedules</span> </a>
                        </li>
                        <li class="active">
                            <a href="patient_history.php" role="button" aria-expanded="false" class="nav-link"><i class="fa big-icon fas fa-user"></i> <span class="mini-dn">Patient Records</span> </a>
                        </li>
                        <li class="active">
                            <a href="inventory.php" role="button" aria-expanded="false" class="nav-link"><i class="fa big-icon fas fa-clipboard"></i> <span class="mini-dn">Inventory</span> </a>
                        </li>
                        <li class="active">
                            <a href="transaction_history.php" role="button" aria-expanded="false" class="nav-link"><i class="fa big-icon fa-credit-card"></i> <span class="mini-dn">Transaction History</span> </a>
                        </li>


                        <!-- <li class="active">
                            <a href="clientinfo.php" role="button" aria-expanded="false" class="nav-link"><i class="fa big-icon fa-list-alt"></i> <span class="mini-dn">Client Information</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="databasebackup.php" role="button" aria-expanded="false" class="nav-link"><i class="fa big-icon fa-database"></i> <span class="mini-dn">Database Backup</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="incomereport.php" role="button" aria-expanded="false" class="nav-link"><i class="fa big-icon fa-calendar"></i> <span class="mini-dn">Income Report</span> </a>
                        </li>-->

                        <li class="empty-list-item"></li>
                        <!-- New sidebar button for Config (moved to the bottom) -->
                        <li class="active" style="background-color: #03a9f0">
                            <a href="config.php" role="button" aria-expanded="false" class="nav-link"><i class="fa big-icon fas fa-cog"></i> <span class="mini-dn">Config</span> </a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
        <!-- Header top area start-->
        <div class="content-inner-all">
            <div class="header-top-area">
                <div class="fixed-header-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <div class="admin-logo logo-wrap-pro">
                                    <a href="#"><img src="img/logo/log.png" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">
                                <div class="header-top-menu tabl-d-n">

                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">


                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                                <span class="admin-name">Administrator</span>
                                                <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">


                                                <li><a href="logout.php"><span class="adminpro-icon adminpro-locked author-log-ic"></span>Log
                                                        Out</a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            if(isset($_SESSION['statuss']))
                        {
                            ?>
                                <script>
                                    swal({
                                        title: "<?php echo $_SESSION['statuss']; ?>",
                                        icon: "<?php echo $_SESSION['status_code']; ?>",
                                        button: "OK",
                                    }).then(function() {
                                        window.location.href = "config.php";
                                    });
                                </script> 
                       <?php 
                            unset($_SESSION['statuss']);
                       }
                    ?>

            <h2>Upload QR Code Image</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="image">Select Image:</label>
                <input type="file" name="image" id="image" accept="image/jpeg, image/jpg, image/png">
                <br><br>
                <button type="submit" name="submit">Upload Image</button>
            </form>

        </div>
    </div>


    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/wow/wow.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/jvectormap/jvectormap-active.js"></script>
    <!-- peity JS
		============================================ -->
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/flot/jquery.flot.spline.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/jquery.flot.pie.js"></script>
    <script src="js/flot/jquery.flot.symbol.js"></script>
    <script src="js/flot/jquery.flot.time.js"></script>
    <script src="js/flot/dashtwo-flot-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>