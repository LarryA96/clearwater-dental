<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Defines the character encoding used by the page -->
    <meta charset="UTF-8">

    <!-- Makes the page display properly on phones/tablets -->
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <!-- Text displayed in the browser tab -->
    <title>Clearwater Dental</title>

    <!-- Load the application's CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <!--
        ========================================================
        APPLICATION HEADER
        ========================================================

        Displays the name of the application and describes
        what the application is used for.
    -->

    <header>

        <h1>Clearwater Dental</h1>

        <p>Patient Management System</p>

    </header>


    <!--
        ========================================================
        MAIN MENU
        ========================================================

        These links allow the user to navigate to the three
        main functions required by the assignment.
    -->

    <div class="menu">

        <!-- Open the patient search page -->
        <a href="search.php" class="menu-button">
            Search Patient
        </a>


        <!-- Open the new patient form -->
        <a href="add_patient.php" class="menu-button">
            Add New Patient
        </a>


        <!-- Open the new patient history event form -->
        <a href="add_event.php" class="menu-button">
            Add Patient Event
        </a>

    </div>

</div>

</body>

</html>