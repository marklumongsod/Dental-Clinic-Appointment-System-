<?php
include('../dbconnect.php');

// SQL query to select all doctors
$sql = "SELECT * FROM doctors order by id asc";
$result = $con->query($sql);

// count total bookings
$sql = "SELECT COUNT(*) AS total_booking FROM booking_applicant WHERE remark = ''";
$result_bookings = $con->query($sql);

$row = $result_bookings->fetch_assoc();
$totalbookings = $row["total_booking"];

// count total doctors
$sql = "SELECT COUNT(*) AS total_doctors FROM doctors";
$result_doctors = $con->query($sql);

$row = $result_doctors->fetch_assoc();
$totaldoctors = $row["total_doctors"];

// count total clients
$sql = "SELECT COUNT(DISTINCT name) AS total_clients FROM booking_applicant";
$result_clients = $con->query($sql);

$row = $result_clients->fetch_assoc();
$totalclients = $row["total_clients"];

// count total completed bookings
$sql = "SELECT COUNT(*) AS total_booking FROM booking_applicant WHERE remark = 'Complete'";
$result_completed = $con->query($sql);

$row = $result_completed->fetch_assoc();
$totalcompleted = $row["total_booking"];

// SQL to display applicant names in doctor assigning
$sql = "SELECT * FROM booking_applicant WHERE doctor_assigned IS NULL OR doctor_assigned = ''";
$result1 = $con->query($sql);

if (isset($_POST['submit'])) {
  $booking_id = $_POST['booking_id'];
  $doctorId = $_POST['doctor_id'];

  // Select doctor details from the database
  $doctor_sql = "SELECT * FROM doctors WHERE id = ?";
  $doctor_stmt = $con->prepare($doctor_sql);
  $doctor_stmt->bind_param("i", $doctorId);
  $doctor_stmt->execute();
  $doctor_result = $doctor_stmt->get_result();

  if ($doctor_result->num_rows > 0) {
    // Fetch doctor details
    $doctor_row = $doctor_result->fetch_assoc();
    $doctor_name = $doctor_row['full_name'];

    // Update the database accordingly
    $update_sql = "UPDATE booking_applicant SET doctor_assigned = ?  WHERE booking_id = ?";
    $update_stmt = $con->prepare($update_sql);
    $update_stmt->bind_param("si", $doctor_name, $booking_id);
    $update_stmt->execute();

    if ($update_stmt->affected_rows > 0) {
      $_SESSION['statuss'] = "Doctor assigned successfully";
      $_SESSION['status_code'] = "success";
    } else {
      $_SESSION['statuss'] = "Error, Failed to assign doctor";
      $_SESSION['status_code'] = "error";
    }
  } else {
    echo "Doctor not found.";
  }

  // Close statements
  $doctor_stmt->close();
  $update_stmt->close();
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
    OMDC - Dashboard
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <link href="../assets/css1/modal.content.css" rel="stylesheet" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
    /* Style the dropdown */
    .form-control {
      display: block;
      width: 100%;
      height: calc(2.25rem + 2px);
      padding: .375rem .75rem;
      font-size: 1rem;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    /* Style the dropdown when it's focused */
    .form-control:focus {
      color: #495057;
      background-color: #fff;
      border-color: #80bdff;
      outline: 0;
      box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25);
    }
    .close {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
      color: #000000;
    }

    .close:hover,
    .close:focus {
      color: #fa0000;
      text-decoration: none;
    }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../assets/img/Ortho.jpg" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">OrthoMagic Dental Clinic</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="../pages1/dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages1/view_schedule.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">View Schedules</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages1/patient_record.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Patient Record</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages1/inventory.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Inventory</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link text-white " href="../pages1/transaction_history.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Transaction History</span>
          </a>
        </li> -->
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Configuration Page</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages1/add_doctor.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Add Doctor</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages1/qr_payment.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">QR Code Payment</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages1/logout.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        </div>
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
          <li class="nav-item dropdown pe-2 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell cursor-pointer"></i>
            </a>
            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                      <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">New message</span> from Laur
                      </h6>
                      <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
                        13 minutes ago
                      </p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                      <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">New album</span> by Travis Scott
                      </h6>
                      <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
                        1 day
                      </p>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                      <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>credit-card</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(453.000000, 454.000000)">
                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        Payment successfully completed
                      </h6>
                      <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
                        2 days
                      </p>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link text-body font-weight-bold px-0">
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline d-none">Administrator</span>
            </a>
          </li>
        </ul>
      </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">recent_actors</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Pending Booking/s</p>
                <h4 class="mb-0"><?php echo $totalbookings ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <div class="col-6 text-end"> -->
              <!-- <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Card</a> -->
              <!-- </div> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Doctor/s</p>
                <h4 class="mb-0"><?php echo $totaldoctors ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">

            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Client/s</p>
                <h4 class="mb-0"><?php echo $totalclients ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">

            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">done_all</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Completed Booking/s</p>
                <h4 class="mb-0"><?php echo $totalcompleted ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">

            </div>
          </div>
        </div>
      </div><br>

      <div class="col-12">

        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-0">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">List of Doctors</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-4">
              <table id="myTable" class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact Number</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>";
                      echo "<div class='d-flex px-2 py-1'>";
                      echo "<div>";
                      echo "<img src='../assets/img/doctor.png' class='avatar avatar-sm me-3 border-radius-lg' alt='user'>";
                      echo "</div>";
                      echo "<div class='d-flex flex-column justify-content-center'>";
                      echo "<h6 class='mb-0 text-sm'>" . $row['full_name'] . "</h6>";
                      echo "</div>";
                      echo "</div>";
                      echo "</td>";
                      echo "<td class='align-middle text-center'>";
                      echo "<span class='text-secondary text-xs font-weight-bold'>" . $row['contact_number'] . "</span>";
                      echo "</td>";
                      echo "<td class='align-middle text-center text-sm'>";
                      if ($row['status'] == 'Active') {
                        echo "<span class='badge badge-sm bg-gradient-success'>" . $row['status'] . "</span>";
                      } else {
                        echo "<span class='badge badge-sm bg-gradient-secondary'>" . $row['status'] . "</span>";
                      }
                      echo "</td>";
                      echo "<td class='align-middle text-center'>";
                      echo "<span class='text-secondary text-xs font-weight-bold'>" . $row['created_at'] . "</span>";
                      echo "</td>";
                      echo "<td class='align-middle'>";
                      //  echo '<button class="btn btn-primary assign-btn" id="myBtn_' . $row['id'] . '" data-id="' . $row['id'] . '">Assign</button>';
                      echo "<button class='btn btn-primary assign-btn' id='myBtn' data-id='" . $row['id'] . "'>Assign</button>";
                      echo "</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "0 results";
                  }
                  $con->close();
                  ?>
                </tbody>
              </table>
              <!-- The Modal -->
              <div id="myModal" class="modal">

                <!-- Modal content -->
                <form method="post" action="">
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="close">&times;</span>
                      <h3>Assign Doctor</h3>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="name">Patient:</label>
                        <select id="booking_id" name="booking_id" class="form-control">
                          <option value="">Select Name</option>
                          <?php
                          if ($result1->num_rows > 0) {
                            while ($row = $result1->fetch_assoc()) {
                              echo "<option value='" . $row['booking_id'] . "'>" . $row['name'] . " (" . $row['service'] . ")</option>";
                            }
                          } else {
                            echo "<option value=''>No applicants found</option>";
                          }
                          ?>
                        </select>
                        <input type="hidden" id="doctor_id" name="doctor_id" value="">
                      </div>
                      <br>
                      <div class="row justify-content-end">
                        <div class="col-auto">
                          <button type="submit" name="submit" class="btn btn-primary view-history-btn">Assign</button>
                        </div>
                      </div>
                    </div>
                    <br>
                  </div>
                </form>
              </div>
              <?php
              if (isset($_SESSION['statuss'])) {
              ?>
                <script>
                  swal({
                    title: "<?php echo $_SESSION['statuss']; ?>",
                    icon: "<?php echo $_SESSION['status_code']; ?>",
                    button: "OK",
                  }).then(function() {
                    window.location.href = "dashboard.php";
                  });
                </script>
              <?php
                unset($_SESSION['statuss']);
              }
              ?>
            </div>
          </div>
        </div>
      </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js1/core/popper.min.js"></script>
  <script src="../assets/js1/core/bootstrap.min.js"></script>
  <script src="../assets/js1/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js1/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js1/plugins/chartjs.min.js"></script>

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
  <!-- Include jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Include DataTables JS -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({
        "pagingType": "simple",
      });
    });
  </script>

<script>
    // Get all elements with the class "assign-btn"
    var buttons = document.querySelectorAll(".assign-btn");
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];

    // Add click event listeners to each button
    buttons.forEach(function(button) {
        button.onclick = function() {
            // Get the data-id attribute value of the clicked button
            var id = this.getAttribute("data-id");
            // Set the value of the hidden input field to the data-id
            document.getElementById("doctor_id").value = id;
            // Display the modal
            modal.style.display = "block";
        };
    });

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var assignButtons = document.querySelectorAll('.assign-btn');


      assignButtons.forEach(function(button) {
        button.addEventListener('click', function() {

          var doctorId = this.getAttribute('data-id');

          // Log the doctor ID to the console
          console.log('Doctor ID:', doctorId);

          document.getElementById('doctor_id').value = doctorId;
        });
      });
    });
  </script>

</body>

</html>