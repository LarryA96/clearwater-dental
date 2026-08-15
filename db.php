<?php

//Connection credentials
$host = "localhost";
$dbname = "clearwater_dental";
$username = "root";
$password = "";

//Attempt connection with stored credentials
try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    //Set attribute so PDO can catch and throw errors
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    //Set attribute so PDO returns results as named arrays
    $pdo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );
} catch (PDOException $e) {
  
  //Display error if failure occurs
  die(
      "Database connection failed: " .
      $e->getMessage()
  );
}
