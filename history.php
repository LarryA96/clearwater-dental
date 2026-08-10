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
 * The patient's ID comes from the URL.
 *
 * Example:
 *
 * history.php?id=25
 */

$patient_id = filter_input(
    INPUT_GET,
    "id",
    FILTER_VALIDATE_INT
);


if (!$patient_id) {

    die("Invalid patient ID.");

}


/*
 * ============================================================
 * FIND PATIENT
 * ============================================================
 *
 * This retrieves the patient's name so we can display whose
 * history is being viewed.
 */

$stmt = $pdo->prepare("
    SELECT
        `Patient_ID`,
        `Name`
    FROM patientlist_1
    WHERE `Patient_ID` = ?
");

$stmt->execute([$patient_id]);

$patient = $stmt->fetch();


if (!$patient) {

    die("Patient not found.");

}


/*
 * ============================================================
 * RETRIEVE PATIENT HISTORY
 * ============================================================
 *
 * patienthistory contains the actual history records.
 *
 * However, patienthistory only contains the Procedure_ID.
 *
 * The procedures table contains the readable procedure name
 * and category.
 *
 * Therefore, we JOIN the two tables together.
 *
 * Example:
 *
 * patienthistory:
 *
 * Procedure_ID = D2140
 *
 * becomes:
 *
 * D2140 - Amalgam Filling, One Surface
 */

$stmt = $pdo->prepare("
    SELECT
        ph.`Date`,
        ph.`Procedure_ID`,
        p.`ProcedureName`,
        p.`Category`,
        ph.`Amount Billed`,
        ph.`Amount Owed`,
        ph.`Notes`

    FROM patienthistory ph

    LEFT JOIN procedures p
        ON ph.`Procedure_ID` = p.`ProcedureCode`

    WHERE ph.`Patient_ID` = ?

    ORDER BY ph.`Date` DESC
");


/*
 * Execute the history query for this patient.
 */

$stmt->execute([$patient_id]);


/*
 * Retrieve all history records.
 */

$history = $stmt->fetchAll();

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
        Patient History - Clearwater Dental
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
            Patient History
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
         DISPLAY HISTORY
         ====================================================== -->

    <?php if (count($history) === 0): ?>

        <!-- Display this if the patient has no history records -->

        <div class="message">

            No patient history was found.

        </div>


    <?php else: ?>


        <h2>
            Dental History
        </h2>


        <!--
            Display each history record in a table.
        -->

        <table>

            <thead>

                <tr>

                    <th>
                        Date
                    </th>

                    <th>
                        Procedure
                    </th>

                    <th>
                        Category
                    </th>

                    <th>
                        Amount Billed
                    </th>

                    <th>
                        Amount Owed
                    </th>

                    <th>
                        Notes
                    </th>

                </tr>

            </thead>


            <tbody>


            <!--
                foreach loops through every history record
                returned by the database.
            -->

            <?php foreach ($history as $event): ?>

                <tr>


                    <!-- Date of the dental event -->

                    <td>
                        <?= htmlspecialchars(
                            $event["Date"]
                        ) ?>
                    </td>


                    <!--
                        Display both the procedure code and
                        the readable procedure name.
                    -->

                    <td>

                        <strong>

                            <?= htmlspecialchars(
                                $event["Procedure_ID"]
                            ) ?>

                        </strong>

                        <br>

                        <?= htmlspecialchars(
                            $event["ProcedureName"]
                            ?? "Unknown procedure"
                        ) ?>

                    </td>


                    <!-- Procedure category -->

                    <td>

                        <?= htmlspecialchars(
                            $event["Category"]
                            ?? ""
                        ) ?>

                    </td>


                    <!-- Amount billed -->

                    <td>

                        <?= htmlspecialchars(
                            $event["Amount Billed"]
                        ) ?>

                    </td>


                    <!-- Amount still owed -->

                    <td>

                        <?= htmlspecialchars(
                            $event["Amount Owed"]
                        ) ?>

                    </td>


                    <!-- Notes associated with the event -->

                    <td>

                        <?= htmlspecialchars(
                            $event["Notes"]
                        ) ?>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    <?php endif; ?>


    <!-- ======================================================
         PAGE ACTIONS
         ====================================================== -->

    <div class="page-actions">


        <!-- Return to demographics -->

        <a
            href="demographics.php?id=<?= urlencode($patient["Patient_ID"]) ?>"
            class="button"
        >
            View Demographics
        </a>


        <!-- Add another history event -->

        <a
            href="add_event.php?patient_id=<?= urlencode($patient["Patient_ID"]) ?>"
            class="button"
        >
            Add New Event
        </a>

    </div>

</div>

</body>

</html>