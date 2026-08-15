<?php

//Connect database
require_once "db.php";

//Variable for error messages
$error = "";

//Variable for doctor notes
$notes = ["Routine follow-up", "No complications", "Medication adjusted", "Patient improving", "Lab results reviewed", "No notes"];

//Get patient ID from hidden field
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $patient_id = filter_input(
        INPUT_POST,
        "patient_id",
        FILTER_VALIDATE_INT
    );
} else {
    $patient_id = filter_input(
        INPUT_GET,
        "patient_id",
        FILTER_VALIDATE_INT
    );
}

// Variable for patient info
$patient = "";

//Find patient name using ID
if ($patient_id) {

    $sql = "
    SELECT `Patient_ID`, `Name`
    FROM patientlist_1
    WHERE `Patient_ID` = ?
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$patient_id]);

    //Store patient info in $patient
    $patient = $stmt->fetch();

    if (!$patient) {
        $error = "true";
    }
}

//Grab all procedure options from procedures table
$sql = "
    SELECT
        `ProcedureCode`,
        `ProcedureName`,
        `Category`,
        `Cost`
    FROM procedures
    ORDER BY `ProcedureCode`
";
$stmt = $pdo->query($sql);

//Store procedures in $procedures
$procedures = $stmt->fetchAll();

//Run query on form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!$patient) {
        //Give error if patient not found
        $error = "true";

    } else {

        //Grab values from form
        $procedure_id = trim($_POST["procedure_id"]);

        $date = trim($_POST["date"]);

        $amount_billed = trim($_POST["amount_billed"]);

        $amount_owed = trim($_POST["amount_owed"]);

        $note = trim($_POST["note"]);

        //Check form for errors
        if (
            $procedure_id === "" ||
            $date === "" ||
            $amount_billed === "" ||
            $amount_owed === "" ||
            $note === ""
        ) {

            $error = "Please complete all fields.";

        } else {
            //Insert event in the patienthistory table
            $sql = "
                    INSERT INTO patienthistory
                    (
                        `Patient_ID`,
                        `Procedure_ID`,
                        `Date`,
                        `Amount Billed`,
                        `Amount Owed`,
                        `Notes`
                    )
                    VALUES (?, ?, ?, ?, ?, ?)
                ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $patient_id,
                $procedure_id,
                $date,
                $amount_billed,
                $amount_owed,
                $note
            ]);

            //Redirect to patient history page. History page will show successful event adding
            header(
                "Location: history.php?eventRedirect=true&search=" .
                urlencode($patient_id)
            );
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clearwater Dental</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>

<body>
    <div class="container">
        <header>
            <?php require './page_elements/header.php'; ?>
            <br>
            <nav>
                <a href="details.php">Search Patient</a>

                <a href="history.php">Search Patient History</a>

                <a href="add_patient.php">Add New Patient</a>

                <a href="add_event.php" class="main">Add Patient Event</a>
            </nav>
        </header>

        <!-- Choose the patient to add event for -->
        <h2>
            Select Patient
        </h2>

        <form method="GET" class="form" action="add_event.php">

            <label for="patient_id">
                Patient ID
            </label>


            <input type="number" id="patient_id" name="patient_id" value="<?= htmlspecialchars($patient_id) ?>"
                required>


            <button type="submit">
                Select Patient
            </button>

        </form>

        <!-- Make sure ID entered is valid -->
        <?php if ($patient_id && !$patient): ?>
            <br>
            <div class="error">

                Patient ID: <?= htmlspecialchars($patient_id) ?>
                <br>
                Not Found
            </div>

        <?php endif; ?>

        <!-- Generate display if valid ID entered -->
        <?php if ($patient): ?>
            <br>
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

            <!-- Notify user if form is incomplete -->
            <?php if ($error !== ""): ?>
                <div class="error">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="form" action="add_event.php">

                <!-- Hidden field so patient ID can be carried over to the POST request -->
                <input type="hidden" name="patient_id" value="<?= htmlspecialchars(
                    $patient["Patient_ID"]
                ) ?>">

                <label for="procedure_id">
                    Procedure
                </label>

                <select id="procedure_id" name="procedure_id" required>

                    <option value="">-- Select Procedure --</option>

                    <?php foreach ($procedures as $procedure): ?>
                        <option value="<?= htmlspecialchars($procedure["ProcedureCode"]) ?>">
                            <?= htmlspecialchars($procedure["ProcedureCode"]) ?>
                            -
                            <?= htmlspecialchars($procedure["ProcedureName"]) ?> ($<?= number_format($procedure["Cost"], 2) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>

                <label for="date">Date</label>

                <input type="date" id="date" name="date" required>

                <label for="amount_billed">Amount Billed</label>

                <input type="text" id="amount_billed" name="amount_billed" placeholder="$250" required>

                <label for="amount_owed">Amount Owed</label>

                <input type="text" id="amount_owed" name="amount_owed" placeholder="$100" required>

                <label for="note">Note</label>

                <select id="note" name="note" required>
                    <option value="">-- Add Note --</option>
                    <?php foreach ($notes as $phrase): ?>
                        <option value="<?= htmlspecialchars($phrase) ?>">
                            <?= htmlspecialchars($phrase) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button type="submit">
                    Add Event
                </button>
            </form>
        <?php endif; ?>
        <?php require './page_elements/footer.php'; ?>
    </div>
</body>

</html>