<?php

/*
 * ============================================================
 * DATABASE CONNECTION
 * ============================================================
 *
 * This section contains the information needed to connect
 * PHP to the MySQL database.
 *
 * $host      = location of the MySQL server
 * $dbname    = name of the database we want to use
 * $username  = MySQL username
 * $password  = MySQL password
 *
 * For a standard XAMPP installation, MySQL is usually running
 * on localhost and the root account often has no password.
 */

$host = "localhost";
$dbname = "clearwater_dental";
$username = "root";
$password = "";


/*
 * ============================================================
 * CREATE THE DATABASE CONNECTION
 * ============================================================
 *
 * PDO (PHP Data Objects) is being used to communicate with
 * MySQL.
 *
 * The try/catch prevents the application from continuing if
 * the database connection fails.
 */

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );


    /*
     * Tell PDO to throw an exception whenever a database
     * operation encounters an error.
     *
     * This makes database problems much easier to identify
     * during development.
     */

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );


    /*
     * This tells PDO to return database results as associative
     * arrays.
     *
     * For example:
     *
     * $patient["Name"]
     *
     * instead of:
     *
     * $patient[0]
     */

    $pdo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );


/*
 * If the connection fails, execution stops and an error
 * message is displayed.
 */

} catch (PDOException $e) {

    die(
        "Database connection failed: " .
        $e->getMessage()
    );
}

?>