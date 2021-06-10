<?php 
	include "top.inc";
  include "db-vars.inc";
 ?>
 <form style="text-align: center;" method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
        <?php
        $mysql=new mysqli(dbHost,dbUser,dbPassword,dbName);
        $mysql->set_charset("utf8");
        $result=$mysql->query("select * from restaurants");
        $isSelected="";
        $selec = "selected";
        echo"<select class='form-select' aria-label='Default select example' name='cities'>";
        while ($row=$result->fetch_assoc())
        {
            if ($_POST["cities"]==$row["city"]) {
                $isSelected="selected";
                $selec = "";
            }
            echo "<option value='".htmlspecialchars(stripcslashes($row["city"]))."'".$isSelected.">".htmlspecialchars(stripcslashes($row["city"]))."</option>";
            $isSelected="";
        }
        $mysql->close();
        echo "<option ".$selec." value=''>Всички градове</opption>";
        echo "</select>";
    ?>
        <input type="submit" class='btn btn-primary' value="търсене">
    </form>
    <br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Име</th>
      <th scope="col">Град</th>
      <th scope="col">Вегетарианско</th>
      <th scope="col">Веган</th>
      <th scope="col">Телефон</th>
      <th scope="col">Капацитет</th>
      <?php 
        if ($role = isset($_SESSION["role"])) {
          echo " <th scope='col' colspan='2' style='text-align: center;''>Действия</th>";
        }
       ?>
     
    </tr>
  </thead>
  <tbody>
  	<?php 
  		include "list-data.php";
  	 ?>
  </tbody>
</table>

 <?php 
 	include "bottom.inc";
  ?>