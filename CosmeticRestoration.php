<?php
include('dbconnect.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cosmetic Restoration</title>
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
            <h1>COSMETIC RESTORATION </h1>
        </div>
    </header>

    <main>

        <div class="content">
            <img src="assets/Cosmetic.jpg" alt="COSMETIC RESTORATION" width="700" height="500">

            <p>Cosmetic dental treatments, are elective procedures used to alter the color, shape, size, alignment, and spacing of teeth.
                Most people seek cosmetic dental treatment as a result of not being happy with the appearance of their smile,
                rather than because they are experiencing symptoms. Therefore, while restorative dental treatments must be performed
                to alleviate symptoms and repair the tooth, cosmetic dental treatments do not have the same urgency. </p>
            <p>The purpose of cosmetic dentistry is to improve visual appearance when a dental crown is used as a cosmetic dental treatment,
                its purpose is generally to improve the contour, color, or size of the tooth. Since cosmetic dental treatments focus on visual
                aesthetics, there are also a couple of treatments that are exclusively considered to be purely cosmetic, including
                professional teeth whitening and dental veneers.</p>
            <p>This is because neither of these treatments improves the function of the teeth and can only be performed on teeth that
                are overall healthy. zed as a class 1 malocclusion, while more severe overbites are known as class 2. Most cases of
                overbites can be corrected with Invisalign treatment alone.</p>
            <p>Cosmetic dental materials, on the other hand, offer durability along with aesthetics. Dental restorations used for cosmetic
                purposes are often selected for their color and translucent properties which allow the restoration to blend in with
                the surrounding teeth.</p>
            <p>One example of this would be composite or tooth-colored fillings, which are made using a dental composite resin that can
                be color-matched to blend with the remaining tooth structure.</p>

        </div>
    </main>

    <footer>
        <p></p>
    </footer>
</body>

</html>