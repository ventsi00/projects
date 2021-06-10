<?php 
		include "db-vars.inc";
		session_start();
		$name = $_POST["name"];
		$capacity = $_POST["capacity"];
		$city = $_POST["city"];
		$number = $_POST["number"];
		$creator = $_SESSION["id"];
		$vegetarian = isset($_POST["vegetarian"])?1:0;
		$vegan = isset($_POST["vegan"])?1:0;
		$mysql = new mysqli(dbHost,dbUser,dbPassword,dbName);
		$mysql -> set_charset("utf8");

		$txtQuery ="insert into restaurants(name,city,number,vegetarian,vegan,capacity,creator) values('$name','$city','$number','$vegetarian','$vegan','$capacity','$creator')";

		if ($_POST["edit"]==1) {
			$id = $_POST["id"];
			$txtQuery ="update restaurants set name='$name',city='$city',number='$number',vegetarian='$vegetarian',vegan='$vegan', capacity='$capacity' where id= $id";
		}

		$result = $mysql->query($txtQuery);
		if ($result) 
		{
			header("Location: index.php");
			die();
		}
		else
		{
			echo "Грешка";
			echo backButton;
		}

		$mysql -> close();

 ?>