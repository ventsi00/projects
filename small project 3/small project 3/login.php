<?php 
	include "db-vars.inc";
	session_start();
	$name = addslashes($_POST["name"]);
	$password = addslashes($_POST["password"]);

	//////////////////////////////////

	$mysql = new mysqli(dbHost,dbUser,dbPassword,dbName);
	$mysql -> set_charset("utf8");

	if ($name!="") {

		$result=$mysql->query("select * from users where name = '".$name."'");

		$row = mysqli_fetch_assoc($result);

		if ($row["password"]==$password) {


		$avatar = $row["avatar"];
		$role = $row["role"];
		$id = $row["id"];


	 	$mysql->close();
		////////////////////////////////////

		$_SESSION["avatar"] = $avatar;
		$_SESSION["role"] = $role;
		$_SESSION["id"] = $id;
		$_SESSION["name"] = $name;
		$_SESSION["password"] =$password;

		header("Location: index.php");
				die();

		}
		else{
			echo "Грешна парола!(Проверете дали не въвеждате грешно име.)";
			echo backButton;
		}
	}
	else{
			echo "Въведете данни";
			echo backButton;

		}
 ?>