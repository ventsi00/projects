<?php 
		include "db-vars.inc";
		session_start();
		$id = $_SESSION["id"];
		$avatar = $_SESSION["avatar"];
		$mysql = new mysqli(dbHost,dbUser,dbPassword,dbName);
		$mysql -> set_charset("utf8");

		$txtQuery ="delete from users where id= $id";

		$result = $mysql->query($txtQuery);
		if ($result) 
		{
			unlink('images/'.$avatar);
			session_destroy();
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