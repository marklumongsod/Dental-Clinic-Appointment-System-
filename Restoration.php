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
            <h1>Restoration/Filling/Pasta</h1>
        </div>
    </header>

    <main>

        <div class="content">
            <img src="assets/Restoration.jpg" alt="ORAL PROPHYLAXIS " width="700" height="500">

            <p>Tooth restoration can restore the natural function of your teeth, plus prevent additional damage from
                decay.
                These procedures can also restore the look of your teeth and can be beneficial for cosmetic reasons.</p>

            <p> In many instances, a dental restoration procedure may restore tooth function and appearance at the same
                time. </p>

            <h4>Types of tooth restoration </h4>

            <p>There are a number of procedures which can restore the look and function of teeth.
                The type of restoration procedure you need will be determined by the type and scope of dental damage you
                have.</p>

            <h2>Common dental restoration procedures include:</h2>
            <ul>
                <h3>Dental fillings</h3>
                <li>Fillings are used to fill in a cavity, caused by dental decay. This is the most common type of tooth
                    restoration.</li>
                <li>Fillings are done in a dentist’s office and don’t require a specialist’s care.</li>
                <li>Your dentist will clean out the tooth decay and fill in the cavity.
                    Several different materials may be used in a dental filling, including silver amalgam or composite
                    resin.</li>
                <li>If the tooth is near the front of your mouth and visible when you speak or smile,
                    your dentist may recommend using a tooth-colored material for the filling. Options include:</li>

                <h3>Composite resins (white filling):</h3>
                <li>These are a newer material used for dental fillings, and are
                    preferred over amalgam fillings for a couple reasons. They look the same color as your teeth, and do
                    not expand and contract or damage teeth, like metal fillings. However, they are just as strong and
                    durable as metal fillings.
                    Glass ionomer: This material acts more like a sealant than the composite resins, and is opaque.
                    Resin-modified glass ionomer: This is similar to the glass ionomer, but have an enamel color to
                    better match teeth, and is made to last longer.
                    Talk with your dental professional to determine which filling is best for your teeth.
                </li>

                <h3>Crowns</h3>
                <p>Dental crowns are a type of cap placed over an entire tooth. Dental crowns are used to protect:</p>
                <li>Teeth with cavities too large for dental fillings</li>
                <li>Weak or cracked teeth</li>
                <li>Worn down teeth</li>
                <li>A vulnerable tooth after root canal</li>
                <li>They’re also used to anchor a bridge that replaces missing teeth.</li>

                <p>Crowns are placed by a dentist or a dental specialist known as a prosthodontist. If you need a crown,
                    your dentist may be able to make it in their office.</p>

                <p>In most cases, a dental professional will take an impression of your tooth and send it to a lab,
                    where your crown will be made. When this occurs,
                    a temporary crown will be placed over your natural tooth until your dentist can replace it with the
                    actual crown.</p>

                <h3>Implants</h3>
                <p>Implants are artificial roots that hold replacement teeth, such as crowns or bridges, in place. There
                    are two main types:

                    <li>Endosteal. In this type, the artificial root is drilled into the jawbone.</li>
                    <li>Subperiosteal. The artificial root is placed on or above the jawbone.
                        This type of implant is done when there isn’t enough healthy jawbone to hold an endosteal
                        implant in place.</li>
                    <li>Dental implants look and feel like natural teeth. They can help improve your bite and speech.
                    </li>

                </p>
            </ul>
        </div>
    </main>

    <footer>
        <p>Implants require multiple procedures prior to completion. Though they can take several months to complete,
            they may last for decades.

            Oral surgeons and periodontists are the type of dentists that do implant procedures.
        </p>
    </footer>
</body>

</html>