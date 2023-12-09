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
            <h1>ORAL PROPHYLAXIS - Cleaning Procedure</h1>
        </div>
    </header>

    <main>

        <div class="content">
            <img src="assets/Oral_Prophylaxis.jpg" alt="ORAL PROPHYLAXIS " width="700" height="500">

            <p>Oral Prophylaxis is a cleaning procedure performed to thoroughly clean the teeth. Prophylaxis is an
                important dental treatment for halting the progression of periodontal disease and gingivitis.</p>

            <p>Periodontal disease and gingivitis occur when bacteria from plaque colonize on the gingival (gum) tissue
                – either above or below the gum line. These bacteria colonies cause serious inflammation and irritation
                which in turn produce a chronic inflammatory response in the body. As a result, the body begins to
                systematically destroy gum and bone tissue, making the teeth shift, become unstable, or completely fall
                out. The pockets between the gums and teeth become deeper and house more bacteria which may travel via
                the bloodstream and infect other parts of the body.</p>

            <h2>Reasons for Prophylaxis/Teeth Cleaning</h2>
            <ul>
                <li>Tartar removal – Tartar (calculus) and plaque buildup, both above and below the gum line, can cause
                    serious periodontal problems if left untreated. Even using the best brushing and flossing homecare
                    techniques, it can be impossible to remove debris, bacteria, and deposits from gum pockets. The
                    experienced eye of a dentist using specialized dental equipment is needed in order to spot and treat
                    problems such as tartar and plaque buildup.</li>
                <li>Aesthetics – It’s hard to feel confident about a smile marred by yellowing, stained teeth.
                    Prophylaxis can rid the teeth of unsightly stains and return the smile to its former glory.</li>
                <li>Fresher breath – Periodontal disease is often signified by persistent bad breath (halitosis). Bad
                    breath is generally caused by a combination of rotting food particles below the gum line, possible
                    gangrene stemming from gum infection, and periodontal problems. The removal of plaque, calculus, and
                    bacteria noticeably improves breath and alleviates irritation.</li>
                <li>Identification of health issues – Many health problems first present themselves to the dentist.
                    Since prophylaxis involves a thorough examination of the entire oral cavity, the dentist is able to
                    screen for oral cancer, evaluate the risk of periodontitis, and often spot signs of medical problems
                    like diabetes and kidney problems. Recommendations can also be provided for altering the home care
                    regimen.</li>
            </ul>
        </div>
    </main>

    <footer>
        <p>Prophylaxis is recommended twice annually as a preventative measure, but should be performed every 3-4 months
            on periodontitis sufferers. Though gum disease cannot be completely reversed, prophylaxis is one of the
            tools the dentist can use to effectively halt its destructive progress.</p>
    </footer>
</body>

</html>