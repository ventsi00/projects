<?php 
	include "db-vars.inc";
	session_start();
	$name = $_SESSION["name"];
	$password = $_SESSION["password"];
	$id = $_SESSION["id"];
	$avatar = $_SESSION["avatar"];

	$newName = addslashes($_POST["name"]);
	$newPassword = addslashes($_POST["password"]);

	$mysql = new mysqli(dbHost,dbUser,dbPassword,dbName);
	$mysql -> set_charset("utf8");

/////////////////////////////////////
	$check="select * from users";
	$result=$mysql->query($check);

	while ($row=$result->fetch_assoc()) {
		if ($row["name"]==$newName) {
			echo "Името вече е заето!";
			exit();
		}
	}
/////////////////////////////////////

	$changeName = "update users set name='$newName' where id='$id'";
	$changePassword = "update users set password='$newPassword' where id='$id'";
	$isChanged = 0;


	if ($newName!=""&&$newName!=$name&&strlen($newName)>4&&strlen($newName)<16) {
		$result=$mysql->query($changeName);
		if ($result) {
			$_SESSION["name"] = $newName;
			$isChanged=1;
		}
		else
		{
			echo "Грешка при обновяването на името";
			echo backButton;
		}
	}

	if ($newPassword!=$password&&strlen($newPassword)>4&&strlen($newPassword)<31) {
		$result=$mysql->query($changePassword);
		if ($result) {
			$_SESSION["password"] = $newPassword;
			$isChanged=1;
		}
		else
		{
			echo "Грешка при обновяването на паролата";
			echo backButton;
		}
	}

	include 'file-reupload.inc';


	if ($isChanged==1) {
		header("Location: index.php");
								die();
	}


	$mysql->close();

 ?>