<?php
	include 'top.inc';

	//////////////////////////////////
	echo "<form method='POST' action='update.php' enctype='multipart/form-data'>";
	include 'reg-form.inc';
	echo "<button style='margin-left: 45%;' type='submit' class='btn btn-primary'>Обновяване</button>
            </form>";
    //////////////////////////////////
 ?>
<br>
<br>
<hr>
<br>
<br>
 <form method='POST' action='delete.php'>
 	<button style='margin-left: 41%;' type='submit' class='btn btn-primary'>Изтриване на профила!</button>
<!--  	<input type="submit" name="submit" value="Изтриване на профила!"> -->
 </form>



 <?php 
 	include 'bottom.inc';
  ?>