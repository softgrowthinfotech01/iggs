<?php

$host = "localhost";
$dbname = "softgrow_iggs";
$username = "softgrow_iggs";
$password = "lXpCk$s}}7V(O!VW";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $username,
        $password
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {

    die("Database Connection Failed: " . $e->getMessage());

}