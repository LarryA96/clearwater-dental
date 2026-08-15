<?php

/*
 * ============================================================
 * DATABASE CONNECTION
 * ============================================================
 */

require_once "db.php";


/*
 * $error stores an error message if the form isn't completed
 * correctly.
 */

$error = "";


/*
 * ============================================================
 * PROCESS FORM SUBMISSION
 * ============================================================
 *
 * This section only runs after the user clicks "Add Patient".
 */

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    /*
     * Retrieve all values submitted by the form.
     *
     * trim() removes unnecessary spaces.
     */

    $name = trim($_POST["name"]);

    $age = trim($_POST["age"]);

    $email = trim($_POST["email"]);

    $dob = trim($_POST["dob"]);

    $phone = trim($_POST["phone"]);

    $insurance = trim($_POST["insurance"]);

    $address = trim($_POST["address"]);


    /*
     * ========================================================
     * VALIDATE FORM
     * ========================================================
     *
     * Make sure none of the required fields are empty.
     */

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


        /*
         * ====================================================
         * GENERATE NEW PATIENT ID
         * ====================================================
         *
         * Since Patient_ID is not AUTO_INCREMENT, find the
         * highest existing ID and add 1.
         */

        $stmt = $pdo->query("
            SELECT
                COALESCE(MAX(`Patient_ID`), 0) + 1
            FROM patientlist_1
        ");


        /*
         * Store the calculated ID.
         */

        $patient_id = $stmt->fetchColumn();


        /*
         * ====================================================
         * INSERT NEW PATIENT
         * ====================================================
         *
         * Insert the new patient's demographic information
         * into the existing patientlist_1 table.
         */

        $stmt = $pdo->prepare("
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

            VALUES
            (
                ?, ?, ?, ?, ?, ?, ?, ?
            )
        ");


        /*
         * Execute the INSERT statement.
         */

        $stmt->execute([

            $name,

            $age,

            $email,

            $dob,

            $phone,

            $insurance,

            $address,

            $patient_id

        ]);


        /*
         * ====================================================
         * REDIRECT TO NEW PATIENT
         * ====================================================
         *
         * After successfully adding the patient, send the
         * user to the new patient's demographics page.
         */

        header(
            "Location: demographics.php?id=" .
            urlencode($patient_id)
        );

        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Add Patient - Clearwater Dental
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
                Add New Patient
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
         ERROR MESSAGE
         ====================================================== -->

        <?php if ($error !== ""): ?>

            <div class="error">

                <?= htmlspecialchars($error) ?>

            </div>

        <?php endif; ?>


        <!-- ======================================================
         NEW PATIENT FORM
         ====================================================== -->

        <form method="POST" class="form">


            <!-- Patient name -->

            <label for="name">
                Full Name
            </label>

            <input type="text" id="name" name="name" value="<?= htmlspecialchars(
                $_POST["name"] ?? ""
            ) ?>" required>


            <!-- Patient age -->

            <label for="age">
                Age
            </label>

            <input type="text" id="age" name="age" placeholder="Example: 35 years old" value="<?= htmlspecialchars(
                $_POST["age"] ?? ""
            ) ?>" required>


            <!-- Email -->

            <label for="email">
                Email
            </label>

            <input type="email" id="email" name="email" value="<?= htmlspecialchars(
                $_POST["email"] ?? ""
            ) ?>" required>


            <!-- Date of birth -->

            <label for="dob">
                Date of Birth
            </label>

            <input type="text" id="dob" name="dob" placeholder="Example: March 4, 2005" value="<?= htmlspecialchars(
                $_POST["dob"] ?? ""
            ) ?>" required>


            <!-- Phone number -->

            <label for="phone">
                Phone
            </label>

            <input type="text" id="phone" name="phone" placeholder="Example: (555) 555-5555" value="<?= htmlspecialchars(
                $_POST["phone"] ?? ""
            ) ?>" required>


            <!-- Insurance company -->

            <label for="insurance">
                Insurance
            </label>

            <input type="text" id="insurance" name="insurance" value="<?= htmlspecialchars(
                $_POST["insurance"] ?? ""
            ) ?>" required>


            <!-- Patient address -->

            <label for="address">
                Address
            </label>

            <input type="text" id="address" name="address" value="<?= htmlspecialchars(
                $_POST["address"] ?? ""
            ) ?>" required>


            <!-- Submit the new patient -->

            <button type="submit">
                Add Patient
            </button>

        </form>

    </div>

</body>

</html>