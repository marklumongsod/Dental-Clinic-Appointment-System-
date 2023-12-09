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
            <h1>METAL/CERAMIC BRACES</h1>
        </div>
    </header>

    <main>

        <div class="content">
            <img src="assets/braces.jpg" alt="BRACES " width="700" height="500">

            <p>Dental braces straighten your teeth and correct a wide range of orthodontic issues, such as:</p>

            <ul>
                <li>
                    Crooked Teeth
                </li>
                <li>
                    Crowded Teeth
                </li>
                <li>
                    Gapped Teeth
                </li>
                <li>
                    Malocclusion (issues with the way your teeth fit together)
                </li>
            </ul>

            <p>Many children and teens wear braces, but adult braces are common, too. In fact, about 20% of all
                orthodontic patients in the United States are over the age of 18.
            </p>
            <p>In most cases, orthodontists place braces. But some general dentists offer them too.</p>

            <h2>How do braces work?</h2>
            <ul>
                <li>Braces use mild, constant pressure to shift your teeth into their proper positions over time.
                    The exact way this happens depends on the type of braces you choose.</li>
            </ul>

            <h2>What are the types of braces?</h2>
            <ul>
                <li>There are several different types of braces. The type that’s best for you depends on a few factors,
                    including the kind of issue you have, the severity of your condition and your personal preferences.</li>
            </ul>

            <h3>Metal Braces</h3>
            <p>When you think of braces, traditional metal braces might be what you imagine. Metal braces use stainless
                steel bands, brackets and wires to gently shift your teeth over time.</p>
            <p>A dentist or orthodontist will bond (glue) a bracket on each tooth, then place a thin, flexible archwire
                over the brackets. Tiny elastic bands called ligatures keep the wire firmly in place.</p>
            <p>Metal braces are visible when you smile. You can choose clear or tooth-colored ligatures to make your
                braces less noticeable. Or, if you’re feeling festive, you can choose brightly colored ligatures.</p>

            <h3>Ceramic braces</h3>
            <p>Ceramic braces — Sometimes called clear braces — work the same way as metal braces. The key difference
                is that the brackets, wires and ligatures are tooth-colored, so they blend in with your smile.
                Ceramic braces are still visible, but they’re less noticeable. One drawback to ceramic braces is that
                they’re more fragile than metal braces, so they’re more likely to break.</p>

            <h3>Lingual Braces</h3>
            <p>Lingual braces are similar to traditional braces. But they go on the back surfaces of your teeth instead
                of the front. Most people who choose lingual braces do so because they don’t want other people to be able
                to tell they have braces.</p>

            <h3>Self-ligating Braces</h3>
            <p>Self-ligating braces look similar to traditional metal braces. The main difference is that, instead of
                ligatures (tiny elastic bands), self-ligating braces use a built-in system to hold the archwire in place.</p>

            <h3>Clear Aligners</h3>
            <p>Sometimes called “invisible braces,” clear aligners are a braces alternative. Instead of brackets and wires,
                clear aligners use a series of custom-made trays to straighten your teeth over time.
                Popular brands include Invisalign® and ClearCorrect®.</p>
            <p>With these systems, you wear each set of aligner trays for approximately two weeks.
                Then, you swap those trays out for the next set in the series. Unlike metal braces, clear aligners are removable.
                But you have to wear them for at least 22 hours every day. You should only take your aligners out to eat,
                drink and brush your teeth.</p>

            <h2>What age is best for braces?</h2>
            <p>You’re never too old for orthodontics. That said, the best time for braces is generally between the ages of 9 and 14.
                At this point, your jaws and facial bones are more malleable (flexible) because they’re still developing.
                Adult braces are just as effective, but it might take a little longer to achieve the desired results.</p>

            <h2>How long do braces take to work?</h2>
            <p>The answer to this question is different for everyone. On average, braces treatment takes about two years to complete.
                But it depends on the severity of misalignment. Some people finish treatment in under 12 months.
                Others may need as long as three years.</p>

            <h2>What are the benefits of dental braces?</h2>
            <p>The most obvious advantage of braces is a straighter, more beautiful smile. But braces can also:</p>
            <ul>
                <li>Make your teeth easier to clean.</li>
                <li>Help prevent cavities and gum disease.</li>
                <li>Correct temporomandibular joint (TMJ) disorders.</li>
                <li>Restore proper functions like chewing and speaking.</li>
            </ul>

        </div>
    </main>

    <footer>
        <p>Braces can improve the health, function and appearance of your smile.
        </p>
    </footer>
</body>

</html>