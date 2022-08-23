<?php

	$host = "localhost";
	$dbName = "GadgetSolutions";
	$username = "root";
	$password = "4Vl6WDSVD4xr";
	$dsn = "mysql:host=$host;dbname=$dbName";

    $devices = "";
    try {
        $connection = new PDO($dsn, $username, $password);
        $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connection successful";
        $sql = 'SELECT * FROM newdevices';
        $devices = $connection -> query($sql);
    } catch (PDOException $error) {
        echo $error -> getMessage();
    }
