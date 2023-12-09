<?php 

session_start();
include('../dbconnect.php');

if (!isset($_SESSION['id'])) {
       
    $_SESSION['error_message'] = "You must log in to access this page.";
    header("Location: ../index_admin.php");
    exit();
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>OMDC - Transaction History</title>
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
    <link rel="stylesheet" href="css/modals.css">

    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="icon" type="image/jpg" href="../assets/Ortho.jpg">
    <style>

.button {
  display: flex;
  align-items: center;
  justify-content: center;
  outline: none;
  cursor: pointer;
  width: 150px;
  height: 50px;
  background-image: linear-gradient(to top, #D8D9DB 0%, #fff 80%, #FDFDFD 100%);
  border-radius: 30px;
  border: 1px solid #8F9092;
  transition: all 0.2s ease;
  font-family: "Source Sans Pro", sans-serif;
  font-size: 14px;
  font-weight: 600;
  color: #606060;
  text-shadow: 0 1px #fff;
  margin-left: auto;
}

.button:hover {
  box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 3px 3px #CECFD1;
}

.button:active {
  box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 5px 3px #999, inset 0 0 30px #aaa;
}

.button:focus {
  box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 5px 3px #999, inset 0 0 30px #aaa;
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
                    <strong>ODM</strong>
                </div>
                <div class="left-custom-menu-adp-wrap">
                    <ul class="nav navbar-nav left-sidebar-menu-pro">
                        <li>
                            <a href="dashboard.php" role="button" aria-expanded="false" class="nav-link"><i
                                    class="fa big-icon fa-home"></i> <span class="mini-dn">Dashboard</span> </a>
                        </li>
                        <li class="">
                            <a href="bookinglist.php" role="button" aria-expanded="false" class="nav-link"><i
                                    class="fa big-icon fa-book"></i> <span class="mini-dn">Booking</span> </a>
                        </li>
                        <li class="active" style="background-color: #03a9f0">
                            <a href="transaction_history.php" role="button" aria-expanded="false" class="nav-link"><i
                                    class="fa big-icon fa-credit-card"></i> <span class="mini-dn">Transaction History</span> </a>
                        </li>
                        <li class="active">
                            <a href="inventory.php" role="button" aria-expanded="false" class="nav-link"><i class="fa big-icon fas fa-clipboard"></i> <span class="mini-dn">Inventory</span> </a>
                        </li>
                        <li class="active">
                            <a href="patient_history.php" role="button" aria-expanded="false" class="nav-link"><i class="fa big-icon fas fa-user"></i> <span class="mini-dn">Patient History</span> </a>
                        </li>
                      <!--   <li class="active">
                            <a href="clientinfo.php" role="button" aria-expanded="false" class="nav-link"><i
                                    class="fa big-icon fa-list-alt"></i> <span class="mini-dn">Client Information</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="databasebackup.php" role="button" aria-expanded="false" class="nav-link"><i
                                    class="fa big-icon fa-database"></i> <span class="mini-dn">Database Backup</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="incomereport.php" role="button" aria-expanded="false" class="nav-link"><i
                                    class="fa big-icon fa-calendar"></i> <span class="mini-dn">Income Report</span> </a>
                        </li>-->

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
                                <button type="button" id="sidebarCollapse"
                                    class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
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
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                                class="nav-link dropdown-toggle">
                                                <span
                                                    class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                                <span class="admin-name">Administrator</span>
                                                <span
                                                    class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                                            </a>
                                            <ul role="menu"
                                                class="dropdown-header-top author-log dropdown-menu animated flipInX">


                                                <li><a href="logout.php"><span
                                                            class="adminpro-icon adminpro-locked author-log-ic"></span>Log
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
            <!-- Header top area end-->
            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">

                    </div>
                </div>
            </div>
            <!-- Breadcome End-->


            <!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>Payment Transaction</h1>
                                        <div class="sparkline13-outline-icon">
                                            <span class="sparkline13-collapse-link"><i
                                                    class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <button class="btn btn-default" style="margin-bottom:0.1%; margin-left: 66.5%"
                                            data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></button>
                                        <div id="add"
                                            class="modal modal-adminpro-general modal-zoomInDown fade zoomInDown animated in"
                                            role="dialog">
                                            <div class="modal-dialog">
                                                
                                                    <div class="modal-content">
                                                        <div class="modal-close-area modal-close-df">
                                                            <a class="close" data-dismiss="modal" href="#"><i
                                                                    class="fa fa-close"></i></a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="modal-login-form-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div
                                                                            class="basic-login-inner modal-basic-inner">
                                                                            <h3>Add Payment</h3>
                                                                            <p>Fill In :</p>
                                                                            <form action="" method="POST">
                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4">
                                                                                            <label class="">Name</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8">
                                                                                            <select class="form-control" id="personname" name="personname" required>
                                                                                                <option value="" selected>Select Client Name</option>
                                                                                                <?php                                                                            
                                                                                                $sql = "SELECT name FROM booking_applicant WHERE remark = ''";
                                                                                                $result = $con->query($sql);

                                                                                                if ($result->num_rows > 0) {
                                                                                                    while ($row = $result->fetch_assoc()) {
                                                                                                        echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                                                                                    }
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4">
                                                                                            <label class="">Service</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8">
                                                                                            <input type="text" class="form-control" placeholder="Service" id="service" name="service" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4">
                                                                                            <label class="">Amount</label>
                                                                                        </div>
                                                                                        <div class="col-lg-3">
                                                                                            <input type="text" class="form-control" placeholder="00.00" id="amount" name="amount" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4">
                                                                                            <label class="">Official Receipt</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8">
                                                                                            <input type="text" class="form-control" id="official_receipt" name="official_receipt" placeholder="Official Receipt" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            

                                                                                <div class="modal-footer">
                                                                                  
                                                                                    <button type="submit" name="submit" id="submit" class="button">Add</button>
                                                                                </div>
                                                                            </form>

                                                                            <?php
                                                                                if (isset($_POST['submit'])) {
                                                                                    date_default_timezone_set("Asia/Manila");
                                                                                    $name = $_POST["personname"];
                                                                                    $service = $_POST["service"];
                                                                                    $amount = $_POST["amount"];
                                                                                    $officialReceipt = $_POST["official_receipt"];
                                                                                    $dt = date('Y-m-d h:i:s A');
                                                                                    $remark = "Completed";

                                                                                  
                                                                                    $checkQuery = "SELECT * FROM applicant_payment WHERE official_receipt = '$officialReceipt'";
                                                                                    $checkResult = $con->query($checkQuery);

                                                                                    if ($checkResult->num_rows == 0) {
                                                                                        $query = "SELECT booking_id FROM booking_applicant WHERE name = '$name'";
                                                                                        $result = $con->query($query);

                                                                                        if ($result->num_rows > 0) {
                                                                                            $row = $result->fetch_assoc();
                                                                                            $bookingId = $row['booking_id'];

                                                                                            $sql = "INSERT INTO applicant_payment (applicant_id, name, official_receipt, service, amount, date_created) 
                                                                                                    VALUES ('$bookingId', '$name', '$officialReceipt', '$service', '$amount', '$dt')";

                                                                                            if ($con->query($sql) === TRUE) {
                                                                                                
                                                                                                $updateQuery = "UPDATE booking_applicant SET remark = '$remark' WHERE booking_id = '$bookingId'";
                                                                                                if ($con->query($updateQuery) === TRUE) {
                                                                                                    echo "<script>alert('Payment added successfully.');</script>";
                                                                                                    echo '<script>window.location.href = window.location.pathname;</script>';
                                                                                                    exit;
                                                                                                } else {
                                                                                                    echo "Error updating booking: " . $con->error;
                                                                                                }
                                                                                            } else {
                                                                                                echo "Error inserting payment record: " . $con->error;
                                                                                            }
                                                                                        } else {
                                                                                            echo "<script>alert('Error: No matching booking found for the selected name.');</script>";
                                                                                        }
                                                                                    } else {
                                                                                        echo "<script>alert('Error: Official receipt already exists in the database.');</script>";
                                                                                    }
                                                                                }
                                                                                ?>




                                                
                                            </div>
                                        </div>
                                    </div></div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                                    $sql = "SELECT * FROM applicant_payment";
                                    $result = mysqli_query($con, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        echo '<table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                            data-show-columns="true" data-show-pagination-switch="false"
                                            data-show-refresh="true" data-key-events="true" data-show-toggle="false"
                                            data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                                            data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th>Date Created</th>
                                                    <th style="width: 30%">Client Name</th>
                                                    <th>Service</th>
                                                    <th style="width: 30%">Amount</th>
                                                    <th>Official Receipt No.</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>';

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<tr>';
                                                echo '<td>' . $row['date_created'] . '</td>';
                                                echo '<td>' . $row['name'] . '</td>';
                                                echo '<td>' . $row['service'] . '</td>';
                                                echo '<td><i>₱' . $row['amount'] . '</i></td>';
                                                echo '<td>' . $row['official_receipt'] . '</td>';
                                            
                                                echo '<td class="datatable-ct">';
                                                echo '<button class="btn btn-danger btn-xs" onclick="deleteEntry(' . $row['payment_id'] . ')"><i class="fa fa-trash"></i></button>';
                                                echo '</td>';
                                            
                                                echo '</tr>';
                                            }
                                            

                                        echo '</tbody></table>';
                                    } else {
                                        echo 'No data found.';
                                    }

                                    mysqli_close($con);
                                    ?>
                                      
                </div>
            </div>
        </div>
        <!-- Static Table End -->
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
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <!-- peity JS
		============================================ -->
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
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

   
    <script>
    $("#personname").on("change", function() {
        var personname = $(this).val();
        if (personname != '') {
            $.ajax({
                type: 'POST',
                url: 'get_service_amount.php',
                data: {
                    personname: personname
                },
                success: function(data) {
                    var parsedData = JSON.parse(data);
                    
       
                    var formattedAmount = parseFloat(parsedData.amount).toLocaleString('en-US', {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
});
                    
                    $("#service").val(parsedData.service);
                    $("#amount").val(formattedAmount); //
                },
                error: function() {
                    alert('An error occurred while fetching data.');
                }
            });
        }
    });
</script>
<script>
function deleteEntry(paymentId) {
    if (confirm("Are you sure you want to delete this payment record?")) {
        $.ajax({
            type: "POST",
            url: "delete_payment.php",
            data: { delete_payment_id: paymentId },
            success: function(response) {
    
                alert(response);
                
                if (response.includes("successfully")) {
                    location.reload();
                }
                
            },
            error: function() {
                alert("An error occurred while deleting the payment record.");
            }
        });
    }
}
</script>







</body>

</html>