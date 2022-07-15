<?php

			$host = "localhost";
			$dbName = "GadgetSolutions";
			$username = "root";
			$password = "4Vl6WDSVD4xr";
			$dsn = "mysql:host=$host;dbname=$dbName";
			//specify if local or production
			$liveUrl = "http://.....$device[slug]";
			$newUrl = "http://18.168.90.222$device[slug]";
			$localUrl="http://localhost$device[slug]";
			


			

			$devices = "";
			try {
				$connection = new PDO($dsn, $username, $password);
				$connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				echo "connection succesful";
				$sql = "SELECT * FROM newdevices";
				$devices = $connection -> query ($sql);
				
			} catch (PDOException $error){
				echo $error -> getMessage();

			}
			?>