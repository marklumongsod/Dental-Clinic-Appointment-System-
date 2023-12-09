<?php
include('dbconnect.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Impacted Wisdom Tooth</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #9A1E1E;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        main {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content img {
            width: 100%;
            height: auto;
            max-width: 500px;
            display: block;
            margin: 0 auto;
        }

        h2 {
            color: #9A1E1E;
        }

        ul {
            list-style-type: disc;
            margin-left: 20px;
        }

        footer {
            background-color: #9A1E1E;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        .col {
            display: flex;
            align-items: center;
        }

        .link-btn {
            background-color: #c13636;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
            /* Add some spacing between the button and the heading */
        }

        .link-btn:hover {
            background-color: #9A1E1E;
        }

        h1 {
            margin: 0;
            /* Remove default margin for the heading */
        }
    </style>
</head>

<body>
    <header>
        <div class="col">
            <a href="index.php" class="link-btn">Back</a>
            <h1>ABOUT US</h1>
        </div>
    </header>

    <main>

        <div class="content">
            <img src="assets/Doc.jpeg" alt="About Us" width="700" height="500">

            <p style="text-align: center;">
                I was still a student, I worked as a part-time assistant in a private clinic every Saturday,
                then when I graduated and passed the board exam, I started as an associate first in different
                clinics to gain more experiences (clinic in the mall, school, etc) then someone offered
                Let me buy her things from the clinic because her clinic is closed and I don't have any
                money yet, so she offered that I can pay in installments, then in our house, mom has
                something for rent, and she made a container for the things, then she said it would be
                a shame if the things just piled up I started there so it was repaired and opened in public
                so at first every evening or day off I was there because I had work at another clinic
                then when I got stronger little by little I resigned and went full-time. I gained customers
                only through referral of patients who were satisfied and happy with my services.
            </p>
        </div>
    </main>

    <footer>
        <p></p>
    </footer>
</body>

</html>