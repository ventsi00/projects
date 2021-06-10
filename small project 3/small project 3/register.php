<?php 
	include "db-vars.inc";
	session_start();
	$name = addslashes($_POST["name"]);
	$password = addslashes($_POST["password"]);
	$id;

	//////////////////////////////////

	$mysql = new mysqli(dbHost,dbUser,dbPassword,dbName);
	$mysql -> set_charset("utf8");

	$checkQuery ="select * from users";
	$resultNameCheck=$mysql->query($checkQuery);
	while ($row=$resultNameCheck->fetch_assoc()) {
		if ($row["name"]==$name) {
			echo "Името вече е заето!";
			echo backButton;
			exit();
		}
	}

	if (strlen($name)<5||strlen($name)>15) {
		echo "Името трябва да е между 5 и 15 символа!";
		echo backButton;
		exit();
	}

	if (strlen($password)<5||strlen($password)>30) {
		echo "Паролата трябва да е между 5 и 30 символа!";
		echo backButton;
		exit();
	}

	$txtQuery ="insert into users (name,avatar,password,role)
	 values ('".$name."','avatar','".$password."',1)";

	 $result=$mysql->query($txtQuery);
		if ($result) {
			$id = mysqli_insert_id($mysql);
			$_SESSION["name"] = $name;
			$_SESSION["role"] = 1;
			$_SESSION["id"] = $id;
			$_SESSION["password"] = $password;		

////////////////////////////////////////////////////////
			include 'file-upload.inc';
//////////////////////////////////////////////////////////
		}
		else {
			echo "Грешка при създаването на профила";
			echo backButton;
		}


		$mysql->close();

 ?>