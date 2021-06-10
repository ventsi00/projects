<?php 
		include "db-vars.inc";
		$id = $_POST["id"];
		$mysql = new mysqli(dbHost,dbUser,dbPassword,dbName);
		$mysql -> set_charset("utf8");

		$txtQuery ="delete from restaurants where id= $id";

		$result = $mysql->query($txtQuery);
		if ($result) 
		{
			header("Location: index.php");
			die();
		}
		else
		{
			echo "Грешк!Опитайте отново!";
			echo backButton;
		}

		$mysql -> close();

 ?>