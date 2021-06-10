<?php 
	session_start();
	$name = isset($_SESSION["name"])?htmlspecialchars(stripslashes($_SESSION["name"])):"Гост";
	$avatar = isset($_SESSION["avatar"])?$_SESSION["avatar"]:"avatar.png";
	if ($avatar == "") $avatar = "avatar.png";
 ?>
<div id="Header-wrap">

	
	<img id="Logo" src="images/logo.png">

	<div id="Profile" style="margin-top: 3em">
		<div style=" padding-left: 1.5em;">
			<button style="
    		background-color: transparent;
    		border: none;">
			<img id="Avatar" onclick="options()" src=<?php echo "images/".$avatar; ?>>
		</button>
		<label id="Username"><?php echo $name ?></label>
		</div>
		<?php 

		if ($name=="Гост") {
			
			echo "
			<a href='login-form.php'>
			<button
			class='btn btn-primary'
				style='size: 10; width: fit-content; height: 2em; margin:1em;'
			    id='Log-in-out'>
			    Вписване
    		</button></a>";
		}
		else{
			echo "
			<a href='logout.php'>
			<button
			class='btn btn-primary'
				style='size: 10; width: fit-content; height: 2em; margin:1em;'
			    id='Log-in-out'>
			    Отписване
    		</button></a>";
		}

		 ?>		
		
	</div>

</div>

<script type="text/javascript">
	function options()
	{
		window.location.href = "options.php";
	}
</script>