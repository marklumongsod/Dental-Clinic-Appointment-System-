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
            <h1>Teeth Whitening</h1>
        </div>
    </header>

    <main>

        <div class="content">
            <img src="assets/Teeth_Whitening.jpg" alt="Teeth Whitening" width="700" height="500">

            <p>Teeth whitening refers to a variety of processes that aim to make someone’s natural teeth appear brighter
                and whiter. Teeth whitening methods include sanding down stains, bleaching, ultraviolet (UV) light
                therapy, and more.</p>

            <p> Many different teeth whitening products are available, and you can try many approaches at home. You can
                also get your teeth whitened at your dentist’s office.</p>

            <p>Some teeth whitening methods can cause uncomfortable side effects, particularly tooth sensitivity and gum
                irritation. Let’s take a look at how teeth whitening works, how to do it safely, and what you should
                know about its side effects.</p>
            <h2>Types of teeth stains</h2>

            <p>To whiten your teeth effectively, you’ll need to choose a whitening method that addresses the type of
                staining you have. If you have both intrinsic and extrinsic staining (explained below), you’ll likely
                need to choose a whitening method that safely addresses each type.</p>
            <p>If you aren’t sure which kind of staining you have, consider consulting your dentist. They can advise you
                on the type of stains on your teeth and which method might work best.</p>

            <ul>

                <h3>Intrinsic stains</h3>
                <li>Stains that are inside your tooth enamel are called intrinsic stains. Intrinsic staining is
                    sometimes
                    present even before your teeth erupt from your gums when you’re a kid.</li>
                <li>These stains can result from antibiotic use, high levels of fluoride exposure, and your tooth enamel
                    growing thinner as you age. Intrinsic staining can sometimes even be genetic, according to 2014
                    researchTrusted Source.</li>
                <h3>Extrinsic stains</h3>
                <li>Extrinsic stains are on the outside of your tooth. These happen due to environmental exposure to
                    things that leave discoloration on your tooth enamel. Coffee, artificial food colorings, and smoking
                    can all cause this type of staining.</li>
                <li>Like intrinsic stains, extrinsic stains can also be linked to antibiotic use, based on the 2014
                    research above.</li>
                <h3>Teeth whitening side effects</h3>
                <li>The most common side effect of teeth whitening is temporary tooth sensitivity. Mouth and gum
                    irritation is also common. Hydrogen peroxide especially can cause this reaction.</li>

                <p>When you get your teeth whitened at the dentist’s office, your gum tissue will be protected during
                    the treatment to reduce this side effect.</p>
                <p>You may also experience increased tooth sensitivity after whitening with an at-home kit or at the
                    dentist’s office. Tooth sensitivity can occur when consuming particularly hot or cold food and
                    drinks. It can also feel like a sharp pain in your tooth, sometimes out of nowhere. This sensitivity
                    should be temporary.</p>
            </ul>
        </div>
    </main>

    <footer>
        <p>Getting your teeth whitened repeatedly or using tooth whitening kits for longer than the recommended duration
            can result in permanent damage to your tooth enamel, 2019 researchTrusted Source suggests.
        </p>
    </footer>
</body>

</html>