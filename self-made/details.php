<?php
//Connect database
require_once "db.php";

//Variables for search term and result
$search = "";
$patients = [];

//On form submission, run SQL query
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $search = trim($_POST["search"]);

    //Verify that something has been entered into the search field
    if ($search !== "") {
        $sql = "
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
            WHERE
                `Name` LIKE :name
                OR `Email` LIKE :email
                OR CAST(`Patient_ID` AS CHAR) = :patient_id
            ORDER BY `Name`
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":name" => "%" . $search . "%",
            ":email" => "%" . $search . "%",
            ":patient_id" => $search
        ]);

        //Place results in $patients
        $patients = $stmt->fetchAll();
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
            <?php require 'header.php'; ?>
            <br>
            <nav>
                <a href="details.php" class="main">
                    Search Patient
                </a>

                <a href="history.php">
                    Search Patient History
                </a>

                <a href="add_patient.php">
                    Add New Patient
                </a>

                <a href="add_event.php">
                    Add Patient Event
                </a>
            </nav>
        </header>
        <form method="POST">

            <label for="search">
                &nbspPatient ID, Name, or Email
            </label>
            <input type="text" id="search" name="search" value="<?php echo htmlspecialchars($search) ?>"
                placeholder="Enter patient ID, name, or email" required>

            <button type="submit">
                Search
            </button>
        </form>

        <!-- Generate results based on form input -->
        <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>

            <h2>Search Results</h2>

            <!-- Return message if no patients found -->
            <?php if (count($patients) === 0): ?>
                <div class="message">
                    No patients were found.
                </div>

                <!-- Fill table if patients found -->
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Patient ID</th>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($patients as $patient): ?>
                            <tr>
                                <td>
                                    <?= htmlspecialchars(
                                        $patient["Patient_ID"]
                                    ) ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars(
                                        $patient["Name"]
                                    ) ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars(
                                        $patient["D.O.B"]
                                    ) ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars(
                                        $patient["Email"]
                                    ) ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars(
                                        $patient["Phone"]
                                    ) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        <?php endif; ?>
        <?php require 'footer.php'; ?>
    </div>
</body>

</html>