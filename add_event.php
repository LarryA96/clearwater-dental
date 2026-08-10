<?php

/*
 * ============================================================
 * DATABASE CONNECTION
 * ============================================================
 */

require_once "db.php";


/*
 * Store any validation error here.
 */

$error = "";


/*
 * ============================================================
 * DETERMINE PATIENT
 * ============================================================
 *
 * The page can be opened two ways.
 *
 * From demographics/history:
 *
 * add_event.php?patient_id=25
 *
 * Or directly:
 *
 * add_event.php
 *
 * If the form has been submitted, the patient ID comes from
 * the hidden form field instead.
 */

$patient_id = filter_input(
    INPUT_GET,
    "patient_id",
    FILTER_VALIDATE_INT
);


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $patient_id = filter_input(
        INPUT_POST,
        "patient_id",
        FILTER_VALIDATE_INT
    );
}


/*
 * ============================================================
 * FIND PATIENT
 * ============================================================
 *
 * Retrieve the patient's name so that the form can confirm
 * which patient the event is being added to.
 */

$patient = null;


if ($patient_id) {

    $stmt = $pdo->prepare("
        SELECT
            `Patient_ID`,
            `Name`
        FROM patientlist_1
        WHERE `Patient_ID` = ?
    ");

    $stmt->execute([$patient_id]);

    $patient = $stmt->fetch();
}


/*
 * ============================================================
 * GET AVAILABLE PROCEDURES
 * ============================================================
 *
 * Retrieve every procedure from the procedures table.
 *
 * These records will be used to build the dropdown menu.
 */

$stmt = $pdo->query("
    SELECT
        `ProcedureCode`,
        `ProcedureName`,
        `Category`,
        `Cost`
    FROM procedures
    ORDER BY `ProcedureCode`
");


/*
 * Store all procedures in an array.
 */

$procedures = $stmt->fetchAll();


/*
 * ============================================================
 * PROCESS NEW EVENT
 * ============================================================
 */

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    /*
     * Make sure the patient exists.
     */

    if (!$patient) {

        $error = "Patient not found.";

    } else {


        /*
         * Retrieve the form values.
         */

        $procedure_id = trim(
            $_POST["procedure_id"]
        );

        $date = trim(
            $_POST["date"]
        );

        $amount_billed = trim(
            $_POST["amount_billed"]
        );

        $amount_owed = trim(
            $_POST["amount_owed"]
        );

        $notes = trim(
            $_POST["notes"]
        );


        /*
         * ====================================================
         * VALIDATE EVENT FORM
         * ====================================================
         */

        if (
            $procedure_id === "" ||
            $date === "" ||
            $amount_billed === "" ||
            $amount_owed === "" ||
            $notes === ""
        ) {

            $error = "Please complete all fields.";

        } else {


            /*
             * =================================================
             * VERIFY PROCEDURE
             * =================================================
             *
             * Make sure the procedure selected by the user
             * actually exists in the procedures table.
             */

            $stmt = $pdo->prepare("
                SELECT COUNT(*)
                FROM procedures
                WHERE `ProcedureCode` = ?
            ");

            $stmt->execute([
                $procedure_id
            ]);


            /*
             * If the procedure doesn't exist, don't insert
             * the history record.
             */

            if ($stmt->fetchColumn() == 0) {

                $error = "Invalid procedure selected.";

            } else {


                /*
                 * =================================================
                 * INSERT HISTORY EVENT
                 * =================================================
                 *
                 * Insert the new dental event into patienthistory.
                 */

                $stmt = $pdo->prepare("
                    INSERT INTO patienthistory
                    (
                        `Patient_ID`,
                        `Procedure_ID`,
                        `Date`,
                        `Amount Billed`,
                        `Amount Owed`,
                        `Notes`
                    )

                    VALUES
                    (
                        ?, ?, ?, ?, ?, ?
                    )
                ");


                /*
                 * Execute the INSERT statement.
                 */

                $stmt->execute([

                    $patient_id,

                    $procedure_id,

                    $date,

                    $amount_billed,

                    $amount_owed,

                    $notes

                ]);


                /*
                 * =================================================
                 * RETURN TO PATIENT HISTORY
                 * =================================================
                 *
                 * After successfully inserting the event,
                 * display the updated history page.
                 */

                header(
                    "Location: history.php?id=" .
                    urlencode($patient_id)
                );

                exit;
            }
        }
    }
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
        Add Patient Event - Clearwater Dental
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
            Add Patient Event
        </h1>


        <nav>

            <a href="index.php">
                Home
            </a>

            <a href="search.php">
                Search
            </a>

        </nav>

    </header>


    <!-- ======================================================
         NO PATIENT SELECTED
         ======================================================

         If the user opened add_event.php without specifying
         a patient, give them a form to select one by ID.
    -->

    <?php if (!$patient): ?>


        <h2>
            Select Patient
        </h2>


        <form method="GET" class="form">

            <label for="patient_id">
                Patient ID
            </label>


            <input
                type="number"
                id="patient_id"
                name="patient_id"
                required
            >


            <button type="submit">
                Select Patient
            </button>

        </form>


    <?php else: ?>


        <!-- ==================================================
             SELECTED PATIENT
             ================================================== -->

        <div class="patient-header">

            <h2>

                <?= htmlspecialchars(
                    $patient["Name"]
                ) ?>

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


        <!-- ==================================================
             DISPLAY ERROR
             ================================================== -->

        <?php if ($error !== ""): ?>

            <div class="error">

                <?= htmlspecialchars($error) ?>

            </div>

        <?php endif; ?>


        <!-- ==================================================
             NEW EVENT FORM
             ================================================== -->

        <form method="POST" class="form">


            <!--
                Hidden field preserves the patient ID when
                the form is submitted.
            -->

            <input
                type="hidden"
                name="patient_id"
                value="<?= htmlspecialchars(
                    $patient["Patient_ID"]
                ) ?>"
            >


            <!-- =================================================
                 PROCEDURE DROPDOWN
                 ================================================= -->

            <label for="procedure_id">
                Procedure
            </label>


            <select
                id="procedure_id"
                name="procedure_id"
                required
            >

                <option value="">
                    -- Select Procedure --
                </option>


                <!--
                    Loop through the procedures retrieved from
                    the database and create an option for each.
                -->

                <?php foreach ($procedures as $procedure): ?>

                    <option
                        value="<?= htmlspecialchars(
                            $procedure["ProcedureCode"]
                        ) ?>"
                    >

                        <?= htmlspecialchars(
                            $procedure["ProcedureCode"]
                        ) ?>

                        -

                        <?= htmlspecialchars(
                            $procedure["ProcedureName"]
                        ) ?>

                        ($<?= number_format(
                            $procedure["Cost"],
                            2
                        ) ?>)

                    </option>

                <?php endforeach; ?>

            </select>


            <!-- =================================================
                 EVENT DATE
                 ================================================= -->

            <label for="date">
                Date
            </label>

            <input
                type="date"
                id="date"
                name="date"
                required
            >


            <!-- =================================================
                 AMOUNT BILLED
                 ================================================= -->

            <label for="amount_billed">
                Amount Billed
            </label>

            <input
                type="text"
                id="amount_billed"
                name="amount_billed"
                placeholder="Example: $250"
                required
            >


            <!-- =================================================
                 AMOUNT OWED
                 ================================================= -->

            <label for="amount_owed">
                Amount Owed
            </label>

            <input
                type="text"
                id="amount_owed"
                name="amount_owed"
                placeholder="Example: $100"
                required
            >


            <!-- =================================================
                 NOTES
                 ================================================= -->

            <label for="notes">
                Notes
            </label>

            <input
                type="text"
                id="notes"
                name="notes"
                placeholder="Example: Routine follow-up"
                required
            >


            <!-- Submit the new event -->

            <button type="submit">
                Add Event
            </button>

        </form>

    <?php endif; ?>

</div>

</body>

</html>