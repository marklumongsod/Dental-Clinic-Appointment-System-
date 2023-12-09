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
            <h1>IMPACTED WISDOM TOOTH</h1>
        </div>
    </header>

    <main>

        <div class="content">
            <img src="assets/Wisdom.jpg" alt="IMPACTED WISDOM TOOTH" width="700" height="500">

            <p>If your impacted wisdom teeth are likely to be difficult to treat or if you have medical conditions that may increase surgical risks,
                your dentist will likely ask you to see an oral surgeon to discuss the best course of action.</p>

            <h2>Managing asymptomatic wisdom teeth</h2>
            <p>If impacted wisdom teeth aren't causing symptoms or apparent dental problems, they're called asymptomatic. Some disagreement
                exists in the dental community about how to manage asymptomatic impacted wisdom teeth. Research on this topic doesn't
                strongly favor one strategy over the other.</p>

            <p>Some dentists and oral surgeons recommend removing asymptomatic wisdom teeth to prevent future potential problems. They argue:</p>

            <ul>
                <li>Symptom-free wisdom teeth may not be free of disease.</li>
                <li>If there isn't enough space for the teeth to erupt, it's often hard to get to them and clean them properly.</li>
                <li>Serious complications with wisdom teeth happen less often in younger adults.</li>
                <li>The procedure is more difficult and more likely to cause complications later in life, particularly among older adults.</li>
            </ul>

            <p>Other dentists and oral surgeons recommend a more conservative approach. They note:</p>

            <ul>
                <li>There isn't enough evidence to suggest that impacted wisdom teeth not causing problems in young adulthood will later cause problems.</li>
                <li>The expense and risks of the procedure don't justify the expected benefit.</li>
            </ul>

            <p>With a conservative approach, your dentist will monitor your teeth for decay, gum disease or other complications.
                He or she may recommend removing a tooth if problems arise.</p>

            <h2>Surgical removal</h2>
            <p>Impacted wisdom teeth that are causing pain or other dental problems are usually surgically removed (extracted).
                Extraction of a wisdom tooth is usually required for:</p>

            <ul>
                <li>Infection or gum disease (periodontal disease) involving the wisdom teeth.</li>
                <li>Tooth decay in partially erupted wisdom teeth.</li>
                <li>Cysts or tumors involving the wisdom teeth.</li>
                <li>Wisdom teeth that are causing damage to neighboring teeth.</li>
            </ul>

            <p>Extraction is almost always done as an outpatient procedure, so you'll go home the same day.
                The process includes:</p>

            <ul>
                <li>Sedation or anesthesia. You may have local anesthesia, which numbs your mouth;
                    sedation anesthesia that depresses your consciousness; or general anesthesia,
                    which makes you lose consciousness.</li>
                <li>Tooth removal. During an extraction your dentist or oral surgeon makes an
                    incision in your gums and removes any bone that blocks access to the impacted tooth root.
                    After removing the tooth, the dentist or oral surgeon typically closes the wound with
                    stitches and packs the empty space (socket) with gauze.</li>
            </ul>

            <p>Wisdom tooth extractions may cause some pain and bleeding, as well as swelling of the site or jaw.
                Temporarily, some people have trouble opening their mouth wide due to swelling of the jaw muscles.
                You'll receive instructions for caring for wounds and for managing pain and swelling, such as taking
                pain medication and using cold compresses to reduce swelling.</p>

            <p>Much less commonly, some people may experience:</p>

            <ul>
                <li>Painful dry socket, or exposure of bone if the post-surgical blood clot
                    is lost from the socket.</li>
                <li>Infection in the socket from bacteria or trapped food particles.</li>
                <li>Damage to nearby teeth, nerves, jawbone or sinuses.</li>
            </ul>

        </div>
    </main>

    <footer>
        <p></p>
    </footer>
</body>

</html>