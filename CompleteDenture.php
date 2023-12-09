<?php
include('dbconnect.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Complete Denture</title>
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
            <h1>COMPLETE DENTURE </h1>
        </div>
    </header>

    <main>

        <div class="content">
            <img src="assets/Complete_Denture.jpg" alt="COMPLETE DENTURE" width="700" height="500">

            <p>A denture is a removable replacement for missing teeth and surrounding tissues. Two types of dentures are available --
                complete and partial dentures. Complete dentures are used when all the teeth are missing, while partial dentures are
                used when some natural teeth remain.</p>

            <h2>Complete Dentures</h2>
            <p>Complete dentures can be either "conventional" or "immediate." Made after the teeth have been removed and the gum
                tissue has begun to heal, a conventional denture is ready for placement in the mouth about eight to 12 weeks after
                the teeth have been removed.Unlike conventional dentures, immediate dentures are made in advance and can be positioned
                as soon as the teeth are removed. As a result, the wearer does not have to be without teeth during the healing period.
                However, bones and gums shrink over time, especially during the healing period following tooth removal.
                Therefore a disadvantage of immediate dentures compared with conventional dentures is that they require more
                adjustments to fit properly during the healing process and generally should only be considered a temporary solution
                until conventional dentures can be made.</p>

            <h2>STEP PROCEDURE FOR COMPLETE DENTURE: </h2>
            <h3>Step 1: Initial consultations</h3>
            <p>When getting new dentures, a consultation is an important step. This initial consultation provides a detailed
                evaluation of your teeth and is the first step in creating a plan for your dentures, including what denture
                type is right for you.</p>
            <p>During this stage, your dental technician will determine what needs to be done to improve your current dental situation
                and will explain how to go about this. Any relevant medical and dental history will also be taken at this stage to
                ensure the best plan can be put in place for you.</p>
            <p>This stage will also include signing any paperwork, such as consent forms and discussing the full costs of your treatment.</p>

            <h3>Step 2: Extraction- if necessary</h3>
            <p>If any oral health concerns were identified during the previous stage, they will be addressed during this step- this often
                includes having teeth extracted. In the case of removing teeth, this is often done in a few steps as it can be a lot of both
                the patient and their mouth to have both front and back teeth removed in one session.</p>

            <p>In order to allow the mouth to heal this is often done several weeks before step 6, where the dentures are fit.
                This also reduces the amount of swelling in the mouth, helping to improve the fit of the dentures.</p>

            <h3>Step 3: Take impressions of the upper and lower jaw</h3>
            <p>Your dental technician will take impressions of your upper and lower jaw to create an exact mould of your teeth.
                This is to provide them with an exact representation of your jaws and any existing teeth.</p>



            <h3>Step 4: Occlusive registration</h3>
            <p>This stage is where the relationship between the upper and lower jaws is worked out, allowing the dental technician to
                accurately record the positioning of the upper and lower jaws in relation to each other.</p>
            <p>At this stage the colour, shape, size, and quality of the denture tooth is also decided. The cost of the treatment
                will also be confirmed during this consultation.</p>

            <h3>Step 5: View the wax trial dentures in the mouth and complete final alterations</h3>
            <p>Being able to see the wax trial dentures in the mouth allows the individual and the dental technician to decide
                if the desired appearance has been achieved. Alterations can be decided during this session if necessary.</p>
            <p>At Kevin Manners Denture Clinic we want to ensure you are happy with your dentures and therefore at this stage
                the final decision is yours. If you feel you need alterations this will be done for you and no extra cost.</p>

            <h3>Step 6: Fitting the dentures or repeating appointment four if necessary</h3>
            <p>The fitting of the finished dentures is done during this appointment. Occasionally however it may be necessary
                to re-run of appointment 4 before this if any alterations have been necessary.</p>
            <p>The process of getting dentures fitted can seem daunting if you haven’t gone through it before, or if you have had
                a bad experience previously. At Kevin Manners we make sure you understand the process and prioritise form and function
                to ensure you are happy with the result. If you want to find out more about the process of getting new dentures fitted,
                watch our short video below to follow the experience of one of our customers.</p>

            <h3>Step 7: Aftercare</h3>
            <p>Attending regular dental check-ups is equally as important as any of the above steps. They are essential for
                maintaining a healthy mouth and to prevent small issues with your dentures from getting worse.</p>

        </div>
    </main>

    <footer>
        <p>Dental check-ups will also enable you to recognise any issues early and get any subsequent denture repairs,
            helping you to extend the life of your dentures.</p>
    </footer>
</body>

</html>