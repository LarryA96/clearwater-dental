<?php

/*
 * ============================================================
 * CONNECT TO THE DATABASE
 * ============================================================
 *
 * db.php contains the PDO connection to clearwater_dental.
 */

require_once "db.php";


/*
 * ============================================================
 * INITIALIZE VARIABLES
 * ============================================================
 *
 * $patients will eventually contain the search results.
 *
 * $search stores whatever the user typed into the search box.
 */

$patients = [];
$search = "";


/*
 * ============================================================
 * PROCESS THE SEARCH FORM
 * ============================================================
 *
 * $_SERVER["REQUEST_METHOD"] tells us how the page was
 * accessed.
 *
 * If it is POST, the user submitted the search form.
 */

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    /*
     * Get the value entered into the search box.
     *
     * trim() removes unnecessary spaces from the beginning
     * and end of the search.
     */

    $search = trim($_POST["search"]);


    /*
     * Only perform the database search if the user entered
     * something.
     */

    if ($search !== "") {


        /*
         * ====================================================
         * SEARCH DATABASE
         * ====================================================
         *
         * Search for the entered value in:
         *
         * 1. Patient name
         * 2. Email
         * 3. Patient ID
         *
         * LIKE allows partial name/email searches.
         *
         * Example:
         *
         * Searching "John"
         *
         * could find:
         * John Smith
         * Johnny Smith
         * John Doe
         */

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


        /*
         * Prepare the SQL query.
         *
         * Prepared statements protect against SQL injection
         * and allow user input to safely be used in the query.
         */

        $stmt = $pdo->prepare($sql);


        /*
         * Execute the query and provide the search values.
         *
         * The % characters allow partial matches for name
         * and email.
         */

        $stmt->execute([

            ":name" => "%" . $search . "%",

            ":email" => "%" . $search . "%",

            ":patient_id" => $search

        ]);


        /*
         * Retrieve all matching patients from the database.
         */

        $patients = $stmt->fetchAll();
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

    <title>Search Patient - Clearwater Dental</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <!-- ======================================================
         PAGE HEADER
         ====================================================== -->

    <header>

        <h1>Search Patient</h1>

        <!-- Navigation links -->

        <nav>

            <a href="index.php">
                Home
            </a>

            <a href="add_patient.php">
                Add Patient
            </a>

            <a href="add_event.php">
                Add Event
            </a>

        </nav>

    </header>


    <!-- ======================================================
         SEARCH FORM
         ====================================================== -->

    <section class="search-box">

        <form method="POST">

            <label for="search">
                Patient ID, Name, or Email
            </label>


            <div class="search-row">

                <!--
                    The value attribute keeps the user's search
                    visible after the form has been submitted.
                -->

                <input
                    type="text"
                    id="search"
                    name="search"
                    value="<?= htmlspecialchars($search) ?>"
                    placeholder="Enter patient ID, name, or email"
                    required
                >


                <button type="submit">
                    Search
                </button>

            </div>

        </form>

    </section>


    <!--
        ========================================================
        DISPLAY SEARCH RESULTS
        ========================================================

        Only display this section after the user has submitted
        the search form.
    -->

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>

        <section>

            <h2>Search Results</h2>


            <!--
                If the database returned zero records, tell the
                user that no patients were found.
            -->

            <?php if (count($patients) === 0): ?>

                <div class="message">

                    No patients were found.

                </div>


            <?php else: ?>


                <!--
                    Display the matching patients in a table.
                -->

                <table>

                    <thead>

                        <tr>

                            <th>
                                Patient ID
                            </th>

                            <th>
                                Name
                            </th>

                            <th>
                                Date of Birth
                            </th>

                            <th>
                                Phone
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php foreach ($patients as $patient): ?>

                        <tr>

                            <!-- Display patient ID -->

                            <td>
                                <?= htmlspecialchars(
                                    $patient["Patient_ID"]
                                ) ?>
                            </td>


                            <!-- Display patient's name -->

                            <td>
                                <?= htmlspecialchars(
                                    $patient["Name"]
                                ) ?>
                            </td>


                            <!-- Display date of birth -->

                            <td>
                                <?= htmlspecialchars(
                                    $patient["D.O.B"]
                                ) ?>
                            </td>


                            <!-- Display phone number -->

                            <td>
                                <?= htmlspecialchars(
                                    $patient["Phone"]
                                ) ?>
                            </td>


                            <!--
                                Provide links to the two different
                                types of patient information.
                            -->

                            <td class="actions">

                                <!--
                                    Pass the patient's ID to
                                    demographics.php using GET.
                                -->

                                <a
                                    href="demographics.php?id=<?= urlencode($patient["Patient_ID"]) ?>"
                                >
                                    Demographics
                                </a>


                                <!--
                                    Pass the patient's ID to
                                    history.php.
                                -->

                                <a
                                    href="history.php?id=<?= urlencode($patient["Patient_ID"]) ?>"
                                >
                                    History
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            <?php endif; ?>

        </section>

    <?php endif; ?>

</div>

</body>

</html>