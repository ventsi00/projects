<div id="Menu-wrap">
	<a href="list.php">Списък</a>
	<a href="index.php">Начало</a>
	 <?php 
        if (isset($_SESSION["role"])) {
          echo "<a href='add.php'>Добавяне</a>";
        }
       ?>
</div>