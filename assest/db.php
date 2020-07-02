<?php

    // Declare DB Variables
    $servername  = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog";

    // Create connection
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $GLOBALS['conn'] = $conn;

    } catch(PDOException $e) {
        $GLOBALS['e'] = $e;
        echo "Connection failed: " . $e->getMessage();
    }
