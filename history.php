<?php
//Connect database
require_once "db.php";

//Variables for search term and result
$eventRedirect = false;
$patientRedirect = false;
$search = "";
$patient = [];
$history = [];

//On form submission, run SQL query
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $search = trim($_POST["search"]);
} elseif (isset($_GET["search"])) {
    $search = trim($_GET["search"]);
}

//Check if coming from add event page or add patient page
if (isset($_GET["eventRedirect"])) {
    $eventRedirect = trim($_GET["eventRedirect"]);
}

if (isset($_GET["patientRedirect"])) {
    $patientRedirect = trim($_GET["patientRedirect"]);
}

//Verify that something has been entered into the search field
if ($search !== "") {

    //Query used for patient name
    $sql = "
        SELECT `Patient_ID`, `Name`
        FROM patientlist_1
        WHERE CAST(`Patient_ID` AS CHAR) = :patient_id
        ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([":patient_id" => $search]);

    //Place result in $patient
    $patient = $stmt->fetch();

    //Query used to get patient history using a join on patienthistory and procedures
    $sql = "
        SELECT
            ph.`Date`,
            ph.`Procedure_ID`,
            p.`ProcedureName`,
            p.`Category`,
            ph.`Amount Billed`,
            ph.`Amount Owed`,
            ph.`Notes`
        FROM patienthistory ph
        LEFT JOIN procedures p ON ph.`Procedure_ID` = p.`ProcedureCode`
        WHERE CAST(ph.`Patient_ID` AS CHAR) = :patient_id
        ORDER BY ph.`Date` DESC
        ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([":patient_id" => $search]);

    //Place results in $history
    $history = $stmt->fetchAll();
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

                <a href="history.php" class="main">Search Patient History</a>

                <a href="add_patient.php">Add New Patient</a>

                <a href="add_event.php">Add Patient Event</a>
            </nav>
        </header>

        <form method="POST" action="history.php">
            <label for="search">
                &nbspPatient ID
            </label>
            <input type="text" id="search" name="search" value="<?php echo htmlspecialchars($search) ?>"
                placeholder="Enter patient ID" required>

            <button type="submit">
                Search
            </button>
        </form>

        <!-- Generate results based on form input -->
        <?php if ($_SERVER["REQUEST_METHOD"] === "POST" || $search !== ""): ?>
            <br>
            <br>

            <!-- If no patient exists -->
            <?php if (!$patient): ?>
                <div class="patient-header">
                    <h2>
                        <strong>No Patient Found</strong>
                    </h2>

                    <p>
                        Patient ID:
                        <strong>
                            <?= htmlspecialchars($search) ?>
                        </strong>
                    </p>
                </div>

                <div class="message">
                    No patient was found with this Patient ID.
                </div>

            <?php endif; ?>
            <?php if ($patient): ?>

                <!-- Patient was found -->
                <div class="patient-header">
                    <h2>
                        <?= htmlspecialchars($patient["Name"]) ?>
                    </h2>
                    <p>
                        Patient ID: <strong><?= htmlspecialchars($patient["Patient_ID"]) ?></strong>
                    </p>
                </div>

                <?php if ($eventRedirect === "true"): ?>
                    <br>
                    <div class="message" style="border-color: #00c04b; background: #ecfbe1; width: fit-content;">
                        Patient event added successfully.
                    </div>
                <?php endif; ?>

                <?php if ($patientRedirect === "true"): ?>
                    <br>
                    <div class="message" style="border-color: #00c04b; background: #ecfbe1; width: fit-content;">
                        Patient added successfully.
                    </div>
                    <br>
                <?php endif; ?>

                <!-- If patient has no history -->
                <?php if (count($history) === 0): ?>
                    <div class="message">
                        No history found.
                    </div>
                <?php else: ?>

                    <!-- Fill table if patient history exists -->
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Procedure ID</th>
                                <th>Category</th>
                                <th>Amount Billed</th>
                                <th>Amount Owed</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($history as $event): ?>
                                <tr>
                                    <td>
                                        <?= htmlspecialchars(
                                            $event["Date"]
                                        ) ?>
                                    </td>
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
                                    <td>
                                        <?= htmlspecialchars(
                                            $event["Category"]
                                        ) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars(
                                            $event["Amount Billed"]
                                        ) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars(
                                            $event["Amount Owed"]
                                        ) ?>
                                    </td>
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
            <?php endif; ?>
        <?php endif; ?>


        <?php require './page_elements/footer.php'; ?>
    </div>

</body>

</html>