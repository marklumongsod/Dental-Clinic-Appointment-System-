<?php
session_start();
include('../dbconnect.php');

if (!isset($_SESSION['id'])) {

  $_SESSION['error_message'] = "You must log in to access this page.";
  header("Location: sign-in.php");
  exit();
}

$sql = "SELECT * FROM doctors";
$result = $con->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['edit_id']) && isset($_POST['edit_name']) && isset($_POST['edit_contactNumber']) && isset($_POST['edit_dateOfEmployment']) && isset($_POST['edit_status'])) {

    // Update existing doctor data
    $edit_id = $_POST['edit_id'];
    $edit_name = $_POST['edit_name'];
    $edit_contactNumber = $_POST['edit_contactNumber'];
    $edit_dateOfEmployment = $_POST['edit_dateOfEmployment'];
    $edit_status = $_POST['edit_status'];

    $stmt = $con->prepare("UPDATE doctors SET full_name=?, contact_number=?, created_at=?, status=? WHERE id=?");
    $stmt->bind_param("ssssi", $edit_name, $edit_contactNumber, $edit_dateOfEmployment, $edit_status, $edit_id);

    if ($stmt->execute() === TRUE) {
      $_SESSION['statuss'] = "Doctor updated successfully";
      $_SESSION['status_code'] = "success";
    } else {
      $_SESSION['statuss'] = "Error, updating doctor";
      $_SESSION['status_code'] = "error";
    }

    $stmt->close();
  } elseif (isset($_POST['name']) && isset($_POST['contactNumber']) && isset($_POST['dateOfEmployment']) && isset($_POST['status'])) {

    // Add a new doctor
    $name = $_POST["name"];
    $contactNumber = $_POST["contactNumber"];
    $dateOfEmployment = $_POST["dateOfEmployment"];
    $status = $_POST["status"];

    // Check if the full name already exists in the database
    $existingNameQuery = "SELECT * FROM doctors WHERE full_name = ?";
    $existingNameStmt = $con->prepare($existingNameQuery);
    $existingNameStmt->bind_param("s", $name);
    $existingNameStmt->execute();
    $existingNameResult = $existingNameStmt->get_result();

    if ($existingNameResult->num_rows > 0) {

      // Full name already exists in the database
      echo "Error, full name already exists in the database";
    } else {

      // Full name does not exist, proceed with insertion
      $stmt = $con->prepare("INSERT INTO doctors (full_name, contact_number, status, created_at) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssss", $name, $contactNumber, $status, $dateOfEmployment);

      if ($stmt->execute() === TRUE) {
        $_SESSION['statuss'] = "Doctor added successfully";
        $_SESSION['status_code'] = "success";
      } else {
        $_SESSION['statuss'] = "Error, adding doctor";
        $_SESSION['status_code'] = "error";
      }

      $stmt->close();
    }

    $existingNameStmt->close();
  } else {
    echo "All fields are required";
  }
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
    OMDC - Add Doctor
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
      <a class="navbar-brand m-0" href=" ">
        <img src="../assets/Ortho.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">OrthoMagic Dental Clinic</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages1/dashboard.php">
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
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Inventory</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages1/medicine.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">medication</i>
            </div>
            <span class="nav-link-text ms-1">Medicine</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages1/equipment.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">inventory</i>
            </div>
            <span class="nav-link-text ms-1">Equipment</span>
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
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Configuration</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="../pages1/add_doctor.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Add Doctor</span>
          </a>
        </li>
        <li class="nav-item">
                <a class="nav-link text-white " href="../pages1/config_email.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Email Notification</span>
                </a>
                </li>
        <!-- <li class="nav-item">
          <a class="nav-link text-white " href="../pages1/qr_payment.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">QR Code Payment</span>
          </a>
        </li> -->
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add Doctor</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Add Doctor</h6>
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
                        <a href="javascript:;" class="nav-link text-body p-0 position-relative" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                            <?php
                            // Fetch the count of unread notifications
                            $unread_query = "SELECT COUNT(*) AS unread_count FROM notification_log WHERE is_read = 0";
                            $unread_result = $con->query($unread_query);
                            $unread_count = ($unread_result->num_rows > 0) ? $unread_result->fetch_assoc()['unread_count'] : 0;

                            // Display the red label if there are unread notifications
                            if ($unread_count > 0) {
                                echo '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">';
                                echo $unread_count;
                                echo '<span class="visually-hidden">unread messages</span>';
                                echo '</span>';
                            }
                            ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                            <div class="d-flex flex-column justify-content-center">
                                <?php
                                // Fetch notification logs from the database
                                $log_query = "SELECT * FROM notification_log ORDER BY notification_date DESC LIMIT 5"; // Fetch the latest 5 notifications
                                $log_result = $con->query($log_query);

                                // Check if there are any notifications
                                if ($log_result->num_rows > 0) {
                                    while ($row = $log_result->fetch_assoc()) {
                                        $notification_id = $row['id']; // Assuming 'id' is the primary key of your notification_log table
                                        $notification_message = $row['notification_message'];
                                        $notification_date = date('M j, Y g:i A', strtotime($row['notification_date'])); // Format the notification date

                                        // Mark the notification as read
                                        $update_stmt = $con->prepare("UPDATE notification_log SET is_read = 1 WHERE id = ?");
                                        $update_stmt->bind_param("i", $notification_id);
                                        $update_stmt->execute();

                                        echo '<li class="mb-2">';
                                        echo '<a class="dropdown-item border-radius-md" href="javascript:;">';
                                        echo '<div class="d-flex py-1">';
                                        echo '<div class="my-auto">';
                                        echo '<img src="../assets/img/Ortho.jpg" class="avatar avatar-sm me-3">';
                                        echo '</div>';
                                        echo '<div class="d-flex flex-column justify-content-center">';
                                        echo '<h6 class="text-sm font-weight-normal mb-1">';
                                        echo '<span class="font-weight-bold">New notification:</span> ' . $notification_message;
                                        echo '</h6>';
                                        echo '<p class="text-xs text-secondary mb-0">';
                                        echo '<i class="fa fa-clock me-1"></i>' . $notification_date;
                                        echo '</p>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</a>';
                                        echo '</li>';
                                    }
                                } else {
                                    // If there are no notifications
                                    echo '<li class="dropdown-item text-center">No notifications</li>';
                                }
                                ?>
                            </div>
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
    <?php
    if (isset($_SESSION['statuss'])) {
    ?>
      <script>
        swal({
          title: "<?php echo $_SESSION['statuss']; ?>",
          icon: "<?php echo $_SESSION['status_code']; ?>",
          button: "OK",
        }).then(function() {
          window.location.href = "add_doctor.php";
        });
      </script>
    <?php
      unset($_SESSION['statuss']);
    }
    ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <a class="btn bg-gradient-dark mb-0" id="add_myBtn" href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Doctor</a>

      <!-- The Modal -->
      <div id="add_myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <span class="close">&times;</span>
            <h3>Add Doctor</h3>
          </div>
          <div class="modal-body">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
              </div>
              <div class="form-group">
                <label for="contactNumber">Contact Number:</label>
                <input type="number" class="form-control" id="contactNumber" name="contactNumber" placeholder="Enter contact number" required>
              </div>
              <div class="form-group">
                <label for="dateOfEmployment">Date of Employment:</label>
                <input type="date" class="form-control" id="dateOfEmployment" name="dateOfEmployment" required>
              </div>
              <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
              <div class="row justify-content-end">
                <div class="col-auto"><br>
                  <button type="submit" class="btn btn-primary">
                    <i class="material-icons text-sm">save</i>&nbsp;&nbsp;Add Doctor
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>

      <br>
      <br>

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
                      echo '<button class="btn btn-primary update-btn" id="myBtn_' . $row['id'] . '" data-id="' . $row['id'] . '">Edit</button>';
                      echo "</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "0 results";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- The Modal -->
  <div id="edit_myModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h3>Edit Doctor</h3>
      </div>
      <div class="modal-body">
        <form id="editForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="hidden" id="edit_id" name="edit_id">
          <div class="form-group">
            <label for="edit_name">Full Name:</label>
            <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Enter name" required>
          </div>
          <div class="form-group">
            <label for="edit_contactNumber">Contact Number:</label>
            <input type="number" class="form-control" id="edit_contactNumber" name="edit_contactNumber" placeholder="Enter contact number" required>
          </div>
          <div class="form-group">
            <label for="edit_dateOfEmployment">Date of Employment:</label>
            <input type="date" class="form-control" id="edit_dateOfEmployment" name="edit_dateOfEmployment" required>
          </div>
          <div class="form-group">
            <label for="edit_status">Status:</label>
            <select class="form-control" id="edit_status" name="edit_status" required>
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>
          <div class="row justify-content-end">
            <div class="col-auto"><br>
              <button type="submit" class="btn btn-primary">
                <i class="material-icons text-sm">save</i>&nbsp;&nbsp;Save Changes
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

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
    document.addEventListener('DOMContentLoaded', function() {
      // Add Doctor Modal
      var addModal = document.getElementById("add_myModal");
      var addBtn = document.getElementById("add_myBtn");
      var addSpan = addModal.getElementsByClassName("close")[0];

      addBtn.onclick = function() {
        addModal.style.display = "block";
      }

      addSpan.onclick = function() {
        addModal.style.display = "none";
      }

      window.onclick = function(event) {
        if (event.target == addModal) {
          addModal.style.display = "none";
        }
      }
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Edit Doctor Modal
      var editModal = document.getElementById("edit_myModal"); 
      var editSpan = editModal.getElementsByClassName("close")[0];
      var editForm = document.getElementById("editForm");

      function fetchDoctorData(id) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "fetch_doctor_data.php?id=" + id, true);
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            populateEditForm(data);
          }
        };
        xhr.send();
      }

      // Populate edit form fields with fetched data
      function populateEditForm(data) {
        document.getElementById("edit_id").value = data.id;
        document.getElementById("edit_name").value = data.full_name;
        document.getElementById("edit_contactNumber").value = data.contact_number;
        document.getElementById("edit_dateOfEmployment").value = data.created_at;
        document.getElementById("edit_status").value = data.status;
      }

      // Edit button click event
      var editBtns = document.querySelectorAll(".update-btn");
      editBtns.forEach(function(btn) {
        btn.addEventListener("click", function() {
          var id = this.getAttribute("data-id");
          fetchDoctorData(id);
          editModal.style.display = "block";
        });
      });

      editSpan.onclick = function() {
        editModal.style.display = "none";
      }

      window.onclick = function(event) {
        if (event.target == editModal) {
          editModal.style.display = "none";
        }
      }
    });
  </script>
</body>

</html>