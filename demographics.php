<?php

/*
 * ============================================================
 * DATABASE CONNECTION
 * ============================================================
 */

require_once "db.php";


/*
 * ============================================================
 * GET PATIENT ID
 * ============================================================
 *
 * The patient ID is passed through the URL.
 *
 * Example:
 *
 * demographics.php?id=25
 *
 * filter_input() retrieves the value and validates that it
 * is an integer.
 */

$patient_id = filter_input(
    INPUT_GET,
    "id",
    FILTER_VALIDATE_INT
);


/*
 * Stop the page if a valid patient ID wasn't provided.
 */

if (!$patient_id) {

    die("Invalid patient ID.");

}


/*
 * ============================================================
 * FIND PATIENT
 * ============================================================
 *
 * Search patientlist_1 for the requested Patient_ID.
 */

$stmt = $pdo->prepare("
    SELECT
        `Patient_ID`,
        `Name`,
        `Age`,
        `Email`,
        `D.O.B`,
        `Phone`,
        `Insurance`,
        `Address`
    FROM patientlist_1
    WHERE `Patient_ID` = ?
");


/*
 * Execute the query using the patient ID.
 */

$stmt->execute([$patient_id]);


/*
 * Retrieve the patient.
 */

$patient = $stmt->fetch();


/*
 * If no matching patient exists, stop the page.
 */

if (!$patient) {

    die("Patient not found.");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Patient Demographics - Clearwater Dental
    </title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <!-- ======================================================
         PAGE HEADER
         ====================================================== -->

    <header>

        <h1>
            Patient Demographics
        </h1>


        <nav>

            <a href="index.php">
                Home
            </a>

            <a href="search.php">
                Search
            </a>

            <a href="add_patient.php">
                Add Patient
            </a>

        </nav>

    </header>


    <!-- ======================================================
         PATIENT IDENTIFICATION
         ====================================================== -->

    <div class="patient-header">

        <h2>
            <?= htmlspecialchars($patient["Name"]) ?>
        </h2>

        <p>

            Patient ID:

            <strong>
                <?= htmlspecialchars(
                    $patient["Patient_ID"]
                ) ?>
            </strong>

        </p>

    </div>


    <!-- ======================================================
         DEMOGRAPHIC INFORMATION
         ======================================================

         Each database field is displayed in its own information
         box.
    -->

    <div class="demographics">


        <!-- Patient name -->

        <div class="info-item">

            <span class="label">
                Name
            </span>

            <span>
                <?= htmlspecialchars(
                    $patient["Name"]
                ) ?>
            </span>

        </div>


        <!-- Patient ID -->

        <div class="info-item">

            <span class="label">
                Patient ID
            </span>

            <span>
                <?= htmlspecialchars(
                    $patient["Patient_ID"]
                ) ?>
            </span>

        </div>


        <!-- Age -->

        <div class="info-item">

            <span class="label">
                Age
            </span>

            <span>
                <?= htmlspecialchars(
                    $patient["Age"]
                ) ?>
            </span>

        </div>


        <!-- Date of birth -->

        <div class="info-item">

            <span class="label">
                Date of Birth
            </span>

            <span>
                <?= htmlspecialchars(
                    $patient["D.O.B"]
                ) ?>
            </span>

        </div>


        <!-- Email -->

        <div class="info-item">

            <span class="label">
                Email
            </span>

            <span>
                <?= htmlspecialchars(
                    $patient["Email"]
                ) ?>
            </span>

        </div>


        <!-- Phone -->

        <div class="info-item">

            <span class="label">
                Phone
            </span>

            <span>
                <?= htmlspecialchars(
                    $patient["Phone"]
                ) ?>
            </span>

        </div>


        <!-- Insurance -->

        <div class="info-item">

            <span class="label">
                Insurance
            </span>

            <span>
                <?= htmlspecialchars(
                    $patient["Insurance"]
                ) ?>
            </span>

        </div>


        <!-- Address -->

        <div class="info-item">

            <span class="label">
                Address
            </span>

            <span>
                <?= htmlspecialchars(
                    $patient["Address"]
                ) ?>
            </span>

        </div>

    </div>


    <!-- ======================================================
         PATIENT ACTIONS
         ====================================================== -->

    <div class="page-actions">

        <!-- View the patient's dental history -->

        <a
            href="history.php?id=<?= urlencode($patient["Patient_ID"]) ?>"
            class="button"
        >
            View Patient History
        </a>


        <!-- Add an event to this patient's history -->

        <a
            href="add_event.php?patient_id=<?= urlencode($patient["Patient_ID"]) ?>"
            class="button"
        >
            Add Patient Event
        </a>

    </div>

</div>

</body>

</html>