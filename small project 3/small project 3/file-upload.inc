 <?php 
if (isset($_FILES['file'])&&$_FILES['file']['size']!=0) {
				$file = $_FILES['file'];

				$fileName = $_FILES['file']['name'];
				$fileTmpName = $_FILES['file']['tmp_name'];
				$fileSize = $_FILES['file']['size'];	
				$fileError = $_FILES['file']['error'];
				$fileType = $_FILES['file']['type'];	

				$nameArray = explode('.', $fileName);
				$format = strtolower(end($nameArray));

				$allowed = array('jpg','jpeg','png','jfif','pjpeg','pjp','svg');

				if (in_array($format,$allowed)) {
					if ($fileError===0) {
						if ($fileSize<1000000) {
							$fileNewName = uniqid('',true).".".$format;
							$destination = 'images/'.$fileNewName;
							move_uploaded_file($fileTmpName, $destination);
							$avatarQuery ="update users set avatar ='".$fileNewName."' where id=".$id;
							$resultImg = $mysql->query($avatarQuery);
							if ($resultImg) 
							{
								$_SESSION["avatar"] = $fileNewName;
								header("Location: index.php");
								die();
							}
							else
							{
								
								echo "Грешка при прикачване на снимката!Акаунтът е създаден със снимка по подразбиране";
								echo backButton;
							}
						}
						else{
							echo "Снимката е твърде тежка!Акаунтът е създаден със снимка по подразбиране";
							echo backButton;
						}
					}
					else{
						echo "Грешка при прикачване на снимката!Акаунтът е създаден със снимка по подразбиране";
						echo backButton;
					}
				}
				else{
					echo "Избраният фаил е от неподдържан тип!Акаунтът е създаден със снимка по подразбиране";
					echo backButton;
				}
			}
			else
			{
				echo "Профилът е създаден със снимка по подразбиране!";
				echo backButton;
			}
			?>