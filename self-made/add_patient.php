<?php
require_once "db.php";

//Variable for insurance providers
$providers = ["Guardian", "Ameritas", "Cigna", "Delta Dental", "Humana"];

//Variable for error messages
$error = "";

//On form submission, run SQL query
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //Get submitted values
    $name = trim($_POST["name"]);
    $age = trim($_POST["age"]);
    $email = trim($_POST["email"]);
    $dob = trim($_POST["dob"]);
    $phone = trim($_POST["phone"]);
    $insurance = trim($_POST["insurance"]);
    $address = trim($_POST["address"]);
    $cityState = trim($_POST["cityState"]);

    //Check that no values are empty
    if (
        $name === "" ||
        $age === "" ||
        $email === "" ||
        $dob === "" ||
        $phone === "" ||
        $insurance === "" ||
        $address === ""
    ) {
        $error = "Please complete all fields.";
    } else {
        //Create patient ID by finding the max and using the next available number
        $sql = "
        SELECT COALESCE(MAX(`Patient_ID`), 0) + 1
        FROM patientlist_1
        ";

        $stmt = $pdo->query($sql);
        $patientID = $stmt->fetchColumn();

        //Create formatted date
        $dob = date("F j,  Y", strtotime($_POST["dob"]));

        //Insert patient into patientlist_1
        $sql = "
        INSERT INTO patientlist_1
        (
                `Name`,
                `Age`,
                `Email`,
                `D.O.B`,
                `Phone`,
                `Insurance`,
                `Address`,
                `Patient_ID`
        )
        VALUES(?, ?, ?, ?, ?, ?, ?, ?)
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $name,
            intval($age) . " years old",
            $email,
            $dob,
            $phone,
            $insurance,
            "$address $cityState",
            $patientID
        ]);

        //Redirect to details.php with new patient info
        header("Location: history.php?patientRedirect=true&search=" . urlencode($patientID));
        exit;
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

                <a href="add_patient.php" class="main">Add New Patient</a>

                <a href="add_event.php">Add Patient Event</a>
            </nav>
        </header>

        <!-- Notify user if fields not filled properly -->
        <?php if ($error !== ""): ?>
            <div class="error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="form" action="add_patient.php">

            <label for="name">
                Full Name
            </label>

            <input type="text" id="name" name="name" placeholder="James Cameron" value="<?= htmlspecialchars(
                $_POST["name"] ?? ""
            ) ?>" required>

            <label for="age">
                Age
            </label>

            <input type="text" id="age" name="age" placeholder="35" value="<?= htmlspecialchars(
                $_POST["age"] ?? ""
            ) ?>" required>

            <label for="email">
                Email
            </label>

            <input type="email" id="email" name="email" placeholder="jcameron@gmail.com" value="<?= htmlspecialchars(
                $_POST["email"] ?? ""
            ) ?>" required>

            <label for="dob">
                Date of Birth
            </label>

            <input type="date" id="dob" name="dob" value="<?= htmlspecialchars(
                $_POST["dob"] ?? ""
            ) ?>" required>

            <label for="phone">
                Phone
            </label>

            <input type="text" id="phone" name="phone" placeholder="(555) 555-5555" value="<?= htmlspecialchars(
                $_POST["phone"] ?? ""
            ) ?>" required>


            <label for="insurance">
                Insurance
            </label>

            <select id="insurance" name="insurance" required>
                <option value="">-- Select Insurance Provider --</option>
                <?php foreach ($providers as $provider): ?>
                    <option value="<?= htmlspecialchars($provider) ?>">
                        <?= htmlspecialchars($provider) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="address">
                Address
            </label>

            <input type="text" id="address" name="address" placeholder="123 Sesame St." value="<?= htmlspecialchars(
                $_POST["address"] ?? ""
            ) ?>" required>

            <label for="cityState">
                City and State
            </label>
            <input type="text" id="cityState" name="cityState" placeholder="Philadelphia, PA" value="<?= htmlspecialchars(
                $_POST["cityState"] ?? ""
            ) ?>" required>

            <button type=" submit">
                Add Patient
            </button>
        </form>

        <?php require './page_elements/footer.php'; ?>
</body>