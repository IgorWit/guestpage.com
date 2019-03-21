<?php
//The code below demonstrates a PDO connection to a database and a try catch block that will display errors about the connection if an exception is thrown. You will need to add your own database name, user and password for this PDO to work on your own project.


    $dsn = 'mysql:host=localhost;dbname=samsbd';
    $username = 'root';
    $password = '';
    $options  = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $db = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>