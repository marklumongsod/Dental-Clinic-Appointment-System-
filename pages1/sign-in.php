<?php
include('../dbconnect.php');

if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  $stmt = mysqli_prepare($con, "SELECT acc_id FROM users WHERE username=? AND password=?");
  mysqli_stmt_bind_param($stmt, "ss", $username, $password);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);

  if (mysqli_stmt_num_rows($stmt) == 1) {
      mysqli_stmt_bind_result($stmt, $acc_id);
      mysqli_stmt_fetch($stmt);
      
      $_SESSION['id'] = $acc_id;
      header("Location: dashboard.php");
      exit();
  } else {
    $_SESSION['statuss'] = "Double-check your username or password";
    $_SESSION['status_code'] = "error";
      ?>
      <!-- <script type="text/javascript">
          alert("Error, double-check your username or password");
          window.location = "sign-in.php";
      </script> -->
      <?php
  }
  mysqli_stmt_close($stmt);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/Ortho.jpg">
  <title>
  OMDC - Sign in
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css1/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css1/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css1/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="bg-gray-200">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid ps-2 pe-0" style="display: block; text-align: center;">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3" href="" >
              OrthoMagic Dental Clinic Admin 
            </a>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
  <div class="page-header align-items-start min-vh-100" style="background-image: url('../assets/img/Ortho.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                  
                </div>
              </div>
              <div class="card-body">
                <form method="POST" >
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
                                        window.location.href = "sign-in.php";
                                    });
                                </script> 
                       <?php 
                            unset($_SESSION['statuss']);
                       }
                    ?>
                  
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" >
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                  </div>
                 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                <a href="" class="font-weight-bold text-white">OrthoMagic Dental Clinic</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js1/core/popper.min.js"></script>
  <script src="../assets/js1/core/bootstrap.min.js"></script>
  <script src="../assets/js1/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js1/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js1/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>