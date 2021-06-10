<?php 
    include "top.inc";
 ?>
<?php
        $id = isset($_POST["id"])?$_POST["id"]:"";
        $name = isset($_POST["name"])?$_POST["name"]:"";
        $city = isset($_POST["city"])?$_POST["city"]:"";
        $number = isset($_POST["number"])?$_POST["number"]:"";
        $capacity = isset($_POST["capacity"])?intval($_POST["capacity"]):"";
        $edit = "";
        
        $vegetarian = "";
        $vegan = "";
        if (isset($_POST["vegetarian"]) AND $_POST["vegetarian"]==1) {
            $vegetarian = "checked";
        }
        if (isset($_POST["vegan"]) AND $_POST["vegan"]==1) {
            $vegan = "checked";
        }

        if (isset($_POST["name"])) {
            $edit = "value='1'";
        }

  ?>
        
     <form method="POST" action="add-data.php">

        <div class="form-group">
            <label for="name">Име</label>
            <input <?php echo "value='".$name."'";?> type="name" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Въведете име на ресторанта">
        </div>

        <div class="form-group">
            <label for="city">Град</label>
            <input <?php echo "value='".$city."'";?> type="name" class="form-control" id="city" name="city" aria-describedby="city" placeholder="Въведете име на град">
        </div>

        <div class="form-group">
            <label for="number">Телефон</label>
            <input <?php echo "value='".$number."'";?> type="name" class="form-control" id="number" name="number" aria-describedby="number" placeholder="Въведете телефонен номер">
        </div>

        <div class="form-group">
            <label for="capacity">Капацитет</label>
            <input <?php echo "value='".$capacity."'";?> type="number" class="form-control" id="capacity" name="capacity" aria-describedby="capacity" placeholder="Въведете капацитет">
        </div>

        <div style="float: left; margin-left: 5em;" class="form-check">
            <input <?php echo $vegetarian?> type="checkbox" class="form-check-input" id="vegetarian" name="vegetarian">
            <label class="form-check-label" for="vegetarian">Предлага вегетарианска кухня</label>
        </div>

        <div style="float: right; margin-right: 5em;" class="form-check">
            <input <?php echo $vegan?> type="checkbox" class="form-check-input" id="vegan" name="vegan">
            <label class="form-check-label" for="vegan">Предлага веган кухня</label>
        </div>

        <input type="hidden" name="edit" <?php echo $edit?> >
        <input type="hidden" name="id" <?php echo "value='".$id."'"?> >

        <br>

 <?php 

    if (isset($_POST["id"])) {
        echo "<button style='margin-left: 45%;'' type='submit' class='btn btn-primary'>Редакция</button> </form>";
    }
    else
    {
        echo "  <button style='margin-left: 45%;'' type='submit' class='btn btn-primary'>Добави</button> </form>";
    }

    include "bottom.inc";
  ?>