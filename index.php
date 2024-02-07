<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'dbconnect.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



if (isset($_POST['submit'])) {
    date_default_timezone_set("Asia/Manila");
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone_number"];
    $service = $_POST["service"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $price = $_POST["price"];
    $dt = date('Y-m-d h:i:s A');
    $remark = '';

    $randomNumber = str_pad(mt_rand(0, 99999), 10, '0', STR_PAD_LEFT);

    $appointmentCode = "OM063-" . $randomNumber;


    $checkAvailabilityQuery = "SELECT * FROM booking_applicant WHERE appointment_date = '$date' AND appointment_time = '$time'";
    $availabilityResult = $con->query($checkAvailabilityQuery);

    if ($availabilityResult->num_rows > 0) {
        $message = "The selected date and time are not available.";
    } else {

        $sql = "INSERT INTO booking_applicant (appointment_code, name, email, phone_number, service, price, appointment_date, appointment_time, remark, date_created)
                VALUES ('$appointmentCode', '$name', '$email', '$phone', '$service', '$price', '$date', '$time', '$remark', '$dt')";

        if ($con->query($sql) === TRUE) {
            $message = "Appointment booked successfully.";


            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'orthomagic9@gmail.com';
                $mail->Password = 'fqstvttkvjangybt';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('orthomagic9@gmail.com');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = "OrthoMagic Dental Clinic Appointment System - Appointment Confirmation";
                $mail->Body = "Hello <strong>$name</strong>,<br><br>";
                $mail->Body .= "<p>Greetings from OrthoMagic Dental Clinic</p><br>";
                $mail->Body .= "Your appointment at OrthoMagic Dental Clinic has been confirmed. Here are the details:<hr>";
                $mail->Body .= "<p><strong>Appointment Code:</strong> $appointmentCode</p>";
                $mail->Body .= "<p><strong>Name:</strong> $name</p>";
                $mail->Body .= "<p><strong>Service:</strong> $service</p>";
                $mail->Body .= "<p><strong>Price:</strong> ₱" . number_format($price, 2) . "</p>";
                $mail->Body .= "<p><strong>Date and Time:</strong> " . date('F j, Y, g:i A', strtotime($date)) .  $time . "<hr></p>";
                $mail->Body .= "<p><strong>IMPORTANT REMINDERS:</strong></p>";
                $mail->Body .= "<p>1. Please print this email confirmation and make sure the screenshot is printed with utmost clarity. </p>";
                $mail->Body .= "<p>2. Bring the printed email confirmation on the date of your appointment. </p>";
                $mail->Body .= "<p>3. You will need to present the document or proof of email confirmation to the administrator. </p>";
                $mail->Body .= "<p>4. Clients are encouraged to be at the site at least 10 minutes before their scheduled appointment. </p>";

                $mail->send();
                $message .= " An email confirmation has been sent to your email address.";
            } catch (Exception $e) {
                $message .= " Error sending confirmation email: " . $mail->ErrorInfo;
            }
        } else {
            $message = "Error: " . $sql . "<br>" . $con->error;
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrthoMagic Dental Clinic</title>

    <!-- font cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- bootsraps cd link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- custom css file link -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/jpg" href="./assets/Ortho.jpg">
    <style>
        .box {
            border: 1px solid #ccc;
            padding: 5px;
        }

        .error {
            border: 1px solid red;
        }
    </style>
</head>

<body>
    <!-- header -->
    <header class="header fixed-top">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col">
                    <a href="#home">
                        <img src="assets/Ortho.jpg" alt="" width="80" height="80"></a>
                </div>
                <div class="col">
                    <nav class="nav">
                        <a href="#home">Home</a>
                        <a href="#about">About</a>
                        <a href="#services">Services</a>
                        <a href="#footer">Contact</a>
                    </nav>

                </div>
                <div class="col">
                    <a href="#contact" class="link-btn">Make an appointment</a>

                    <div id="menu-btn" class="fas fa-bars"></div>
                </div>
            </div>
        </div>
    </header>

    <!-- header ends here -->

    <!-- home section starts -->
    <section class="home" id="home">
        <div class="container">
            <div class="row min-vh-100 align-items-center">
                <div class="col-md-6 order-md-2">

                    <img src="assets/Ortho.png" class="w-100 mb mmb-md0" alt="">
                </div>
                <div class="col-md-6 order-md-1">

                    <div class="content text-center text-md-left">
                        <h3>Orthomagic Your Dental Clinic</h3>

                        <a href="#contact" class="link-btn">Make an appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- home section ends -->

    <!-- about section starts -->

    <section class="about" id="about">

        <div class="container">

            <div class="row  align-items-center">

                <div class="col-md-6 image">
                    <img src="assets/Doc.jpeg" class="w-100 mb-5 mmb-md0" alt="">
                </div>

                <div class="col-md-6 content">
                    <span>About Us</span>
                    <h3>Your teeth must be healty.</h3>
                    <span>Dr. Rose Ann Flores-Macalindol</span><br>
                    <span>Dentist Since 2017</span><br><br>

                    <a href="AboutUs.php" class="link-btn">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- about section here -->

    <!-- services section start-->
    <section class="services" id="services">

        <h1 class="heading">Our Services</h1>

        <div class="box-container container">

            <a href="OralProphylaxis.php">
                <div class="box">
                    <img src="assets/Cleaning.png" alt="">
                    <h3>Oral Prophylaxis/Cleaning</h3>
                    <p>Cleaning procedure performed to thoroughly clean the teeth.</p>
                </div>
            </a>

            <a href="Restoration.php">
                <div class="box">
                    <img src="assets/Cleaning.png" alt="">
                    <h3>Restoration/Filling/Pasta</h3>
                    <p>Tooth restoration can restore the natural function of your teeth.</p>
                </div>
            </a>

            <a href="Teeth_Whitening.php">
                <div class="box">
                    <img src="assets/Cleaning.png" alt="">
                    <h3>Teeth Whitening</h3>
                    <p>Teeth whitening refers to a variety of processes.</p>
                </div>
            </a>

            <a href="Braces.php">
                <div class="box">
                    <img src="assets/MetalCeramicBraces.png" alt="">
                    <h3>Metal/Ceramic Braces</h3>
                    <p>Braces straighten your teeth and correct a orthodontic issues.</p>
                </div>
            </a>


            <a href="Fixed_JacketCrown.php">
                <div class="box">
                    <img src="assets/JacketCrown.png" alt="">
                    <h3>Fixed Denture/Jacket Crown</h3>
                    <p>Tooth jacket crowns are described as complete porcelain ceramic.</p>
                </div>
            </a>

            <a href="Fixed_PorcelainBridge.php">
                <div class="box">
                    <img src="assets/PorcelainBridge.png" alt="">
                    <h3>Fixed Partial Denture/Porcelain Bridge</h3>
                    <p>Dental bridges replace missing teeth.</p>
                </div>
            </a>

            <!-- div class="box">
                <img src="assets/PorcelainBridge.png" alt="">
                <h3>Fixed Partial Denture/Porcelain Bridge</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, culpa!</p>
        </div> -->

            <!-- <div class="box">
                <img src="assets/CompleteDenture.png" alt="">
                <h3>Complete Denture</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, culpa!</p>
            </div> -->

            <a href="CompleteDenture.php">
                <div class="box">
                    <img src="assets/CompleteDenture.png" alt="">
                    <h3>Complete Denture</h3>
                    <p>A denture is a removable replacement for
                        missing teeth and surrounding tissues.</p>
                </div>
            </a>

            <!-- <div class="box">
                <img src="assets/CosmeticRestoration.png" alt="">
                <h3>Cosmetic Restoration</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, culpa!</p>
            </div> -->

            <a href="CosmeticRestoration.php">
                <div class="box">
                    <img src="assets/CosmeticRestoration.png" alt="">
                    <h3>Cosmetic Restoration</h3>
                    <p>Cosmetic dental, are elective procedures used to alter your teeth.</p>
                </div>
            </a>

            <!-- <div class="box">
                <img src="assets/ImpactedWisdomTooth.png" alt="">
                <h3>Impacted Wisdom Tooth</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, culpa!</p>
            </div> -->

            <a href="ImpactedWisdomTooth.php">
                <div class="box">
                    <img src="assets/ImpactedWisdomTooth.png" alt="">
                    <h3>Impacted Wisdom Tooth</h3>
                    <p>Impacted wisdom teeth are likely to be difficult to treat.</p>
                </div>
            </a>

            <!-- <div class="box">
                <img src="assets/PartialDenture.png" alt="">
                <h3>Partial Denture/Pustiso</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, culpa!</p>
            </div> -->

            <a href="PartialDenture.php">
                <div class="box">
                    <img src="assets/PartialDenture.png" alt="">
                    <h3>Partial Denture/ Pustiso</h3>
                    <p>his is a plate with one or more false teeth on it.</p>
                </div>
            </a>

        </div>
    </section>
    <!-- services section ends -->

    <!-- process section start -->

    <section class="process">
        <h1 class="heading">Work Process</h1>

        <div class="box-container container">

            <div class="box">
                <img src="assets/CosmeticDentistry.png" alt="">
                <h3>Cosmetic Dentistry</h3>
                <p>Cosmetic dentistry is a method of professional oral care that focuses on
                    improving the appearance of your teeth. And although cosmetic dentistry
                    procedures are usually elective rather than essential, some treatment
                    cases also provide restorative benefits.</p>
            </div>

            <div class="box">
                <img src="assets/Pediatric.png" alt="">
                <h3>Pediatric Dentistry</h3>
                <p>Pediatric dentists are dedicated to the oral health of children from
                    infancy through the teen years. They have the experience and
                    qualifications to care for a child's teeth, gums, and mouth throughout
                    the various stages of childhood. Children begin to get their baby
                    teeth ​during the first 6 months of life.</p>
            </div>

            <div class="box">
                <img src="assets/DentalImplant.png" alt="">
                <h3>Dental Implants</h3>
                <p>Dental implants are medical devices surgically implanted into the jaw
                    to restore a person's ability to chew or their appearance.
                    They provide support for artificial (fake) teeth, such as crowns,
                    bridges, or dentures.</p>
            </div>
        </div>
    </section>
    <!-- process section ends -->

    <!--contact section start-->

    <section class="contact" id="contact">

        <a id="contactn"></a>

        <h1 class="heading">Make appointment</h1>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>#contact" method="post">
            <?php
            if (isset($message)) {
                echo '<p class="message">' . $message . '</p>';
            };
            ?>

            <span>Choose a Date: </span>
            <input type="date" name="date" id="date" class="box" required>

            <div class="center-container">
                <span class="choose-time-heading">Choose a Time: </span>
                <div class="time-options">
                    <label for="time">9:30am - 10:30am</label>
                    <input type="radio" name="time" id="time" value="9:30am - 10:30am" required onchange="checkAvailability()">

                    <label for="time">10:30am - 11:30am</label>
                    <input type="radio" name="time" id="time" value="10:30am - 11:30am" required onchange="checkAvailability()">

                    <label for="time">1:00pm - 2:00pm</label>
                    <input type="radio" name="time" id="time" value="1:00pm - 2:00pm" required onchange="checkAvailability()">

                    <label for="time">2:00pm - 3:00pm</label>
                    <input type="radio" name="time" id="time" value="2:00pm - 3:00pm" required onchange="checkAvailability()">

                    <label for="time">3:30pm - 4:30pm</label>
                    <input type="radio" name="time" id="time" value="3:30pm - 4:30pm" required onchange="checkAvailability()">
                </div>
            </div>


            <br>
            <span>Your Name: </span>
            <input type="text" name="name" placeholder="Enter your name" class="box" required>
            <span>Your Email: </span>
            <input type="email" name="email" placeholder="Enter your email" class="box" required>
            <span>Your Number: </span>
            <input type="number" name="phone_number" placeholder="Enter your number" class="box" required>
            <span>Service: </span>
            <select name="service" id="service" class="box" onchange="updatePrice()" required>
                <option value="">Select Service</option>
                <option value="Extraction">Extraction</option>
                <option value="Resto">Resto</option>
                <option value="Denture">Denture</option>
                <option value="Retainer">Retainer</option>
                <option value="Jacket">Jacket</option>
                <option value="Denture Flexible">Denture flexible</option>
                <option value="Veneers">Veneers</option>
                <option value="Xray per Tooth">Xray per tooth</option>
                <option value="OP/Cleaning">Op/cleaning</option>
                <option value="Check-Up">Check-up</option>
                <option value="Root Canal">Root canal</option>
                <option value="Braces">Braces</option>
                <option value="Whitening">Whitening</option>
            </select>
            <span>Price </span>
            <input type="text" name="price" id="price" placeholder="₱" class="box" readonly>
            <br>

            <input type="submit" value="Make appointment" name="submit" class="link-btn">
        </form>
    </section>
    <!--contact section ends-->

    <!--footer section start-->

    <section class="footer" id="footer">
        <div class="box-container container">
            <div class="column">
                <i class="fas fa-phone"></i>
                <h3>Phone Numbers</h3>
                <p>09775021666</p>
                <p>09190928966</p>
            </div>

            <div class="column">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Our Address</h3>
                <p>355 Avenida St. Molino 3</p>
                <p>Bacoor City, Cavite</p>
            </div>

            <div class="column">
                <i class="fas fa-clock"></i>
                <h3>Opening Hours</h3>
                <p>Monday to Sunday</p>
                <p>10am to 7pm</p>
            </div>

            <div class="column">
                <i class="fas fa-users"></i>
                <h3>Facebook Group</h3>
                <p>Orthomagic Dental Clinic</p>
            </div>
        </div>
    </section>


    <!--footer section ends-->





    <!-- custom js file link -->
    <script src="js/script.js"></script>
    <script>
        document.getElementById("service").addEventListener("change", function() {
            var serviceSelect = document.getElementById("service");
            var priceInput = document.getElementById("price");


            var servicePrices = {
                "Extraction": 800,
                "Resto": 800,
                "Denture": 2500,
                "Retainer": 7000,
                "Jacket": 1000,
                "Denture Flexible": 18000,
                "Veneers": 8500,
                "Xray per Tooth": 400,
                "OP/Cleaning": 800,
                "Check-Up": 550,
                "Root Canal": 5000,
                "Braces": 45000,
                "Whitening": 1000
            };

            var selectedService = serviceSelect.value;

            if (servicePrices[selectedService] !== undefined) {
                priceInput.value = servicePrices[selectedService];
            } else {
                priceInput.value = "";
            }
        });
    </script>

    <script>
        function updatePrice() {

            var selectedService = document.getElementById("service").value;


            var servicePrices = {
                "Extraction": 800,
                "Resto": 800,
                "Denture": 2500,
                "Retainer": 7000,
                "Jacket": 1000,
                "Denture Flexible": 18000,
                "Veneers": 8500,
                "Xray per Tooth": 400,
                "OP/Cleaning": 800,
                "Check-Up": 550,
                "Root Canal": 5000,
                "Braces": 45000,
                "Whitening": 1000
            };


            document.getElementById("price").value = servicePrices[selectedService];
        }
    </script>
    <script>
        const phoneNumberInput = document.querySelector('input[name="phone_number"]');

        phoneNumberInput.addEventListener('input', function() {
            const phoneNumber = phoneNumberInput.value;

            const numericPhoneNumber = phoneNumber.replace(/\D/g, '');

            if (numericPhoneNumber.length === 11) {
                phoneNumberInput.classList.remove('error');
            } else {
                phoneNumberInput.classList.add('error');
            }
        });
    </script>


    <script>
        const emailInput = document.querySelector('input[name="email"]');

        emailInput.addEventListener('input', function() {
            const email = emailInput.value;

            const emailPattern = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;

            if (emailPattern.test(email)) {
                emailInput.classList.remove('error');
            } else {
                emailInput.classList.add('error');
            }
        });
    </script>

    <script>
        const nameInput = document.querySelector('input[name="name"]');

        nameInput.addEventListener('input', function() {
            const name = nameInput.value;

            if (name.trim() === '') {
                nameInput.classList.add('error');
            } else {
                nameInput.classList.remove('error');
            }
        });
    </script>

<script>
  
    function isThursday(date) {
      return date.getDay() === 4; 
    }
    function initializeDatePicker() {
      var datePicker = document.getElementById('date');

      datePicker.addEventListener('focus', function() {
        var currentDate = new Date();
        var day = currentDate.getDate();
        var month = currentDate.getMonth() + 1; 
        var year = currentDate.getFullYear();
        var today = year + '-' + (month < 10 ? '0' + month : month) + '-' + (day < 10 ? '0' + day : day);

        datePicker.setAttribute('min', today); 

        datePicker.addEventListener('input', function() {
          var selectedDate = new Date(datePicker.value);
          if (isThursday(selectedDate)) {
            alert('Sorry, Thursdays are unavailable as its the clinics day off. Please choose a different date.');
            datePicker.value = ''; 
          }
        });
      });
    }

    initializeDatePicker();
  </script>
    <!-- <script>
    checkAvailability();
</script>

    <script>
        function checkAvailability() {
            var selectedTime = document.querySelector('input[name="time"]:checked').value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "check_availability.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText); 
                    if (xhr.responseText === "available") {
                     
                        document.querySelectorAll('form input:not([name="date"]), form select').forEach(function (element) {
                            element.removeAttribute('disabled');
                        });
                    } else {
                      
                        document.querySelectorAll('form input:not([name="date"]), form select').forEach(function (element) {
                            element.setAttribute('disabled', 'disabled');
                        });
                    }
                }
            };

            var data = "date=" + encodeURIComponent(document.getElementById("date").value) +
                "&time=" + encodeURIComponent(selectedTime);

            xhr.send(data);
        }
    </script> -->

</body>

</html>