<?php
include('dbconnect.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Oral Prophylaxis</title>
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
            <h1>FIXED PARTIAL DENTURE/JACKET CROWN </h1>
        </div>
    </header>

    <main>

        <div class="content">
            <img src="assets/JacketCrown.jpg" alt="FIXED PARTIAL DENTURE/JACKET CROWN " width="700" height="500">

            <p>Tooth jacket crowns are best described as complete porcelain ceramic crowns that cover and protect
                the full surface of the tooth. The crown is shaped just like the tooth. It serves as a protective
                cover over a broken, chipped or missing tooth. Crowns bolster tooth strength when the leftover
                tooth structure is no longer capable of supporting the filling. The crown is enhanced with cement
                to improve tooth structure as well as oral aesthetics.</p>

            <h2>Why Jacket Crowns are Used?</h2>
            <p>Jacket crowns are favored for a litany of reasons. For one, jacket crowns do not rust.
                The typical black gum spotted around porcelain connected to metal crowns does not occur as the
                material in question is a robust ceramic. Furthermore, you will not feel those cold and hot sensations
                that occur with other types of crowns as there is no electrical conduction. These protective caps
                serve as a covering over a damaged tooth. Their purpose is to permanently restore the tooth for
                optimal aesthetics and functionality. There is no worry over corrosion or a black gum line that
                sometimes occurs near porcelain fused metal crowns. The rigid ceramic material proves incredibly
                protective across posterity.</p>

            <h2>Jacket Crowns are Especially Helpful for Anterior Teeth</h2>
            <p>Jacket crowns are often used on anterior teeth for multiple reasons. For one, they match the natural
                tooth's translucency. Furthermore, the jacket crown provides permanent restoration,
                allowing for beautiful and highly functional teeth that can withstand the chewing process.</p>

            <h2>The Tooth Jacket Crown Procedure</h2>
            <p>The placement of a tooth jacket commences with an initial consultation along with an x-ray.
                The teeth are then prepared. An impression is taken. This procedure requires the removal of portions
                of the natural tooth structure to permit the placement of the crown. The temporary crown is fitted
                while the permanent crown is built from the original tooth's impression.</p>

        </div>
    </main>

    <footer>
        <p>The temporary crown is subsequently removed so the customized tooth jacket crown can protect the tooth's full surface.</p>
    </footer>
</body>

</html>