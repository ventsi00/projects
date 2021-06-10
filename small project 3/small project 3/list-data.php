<?php 
    
    $role = isset($_SESSION["role"])?$_SESSION["role"]:"";
    $id = isset($_SESSION["id"])?$_SESSION["id"]:"";
    $mysql=new mysqli(dbHost,dbUser,dbPassword,dbName);
        $mysql->set_charset("utf8");
        $chosen = "";
        if (isset($_POST["cities"]) && $_POST["cities"]!="") {
            $chosen = " where city = '".$_POST["cities"]."'";
        }
        $result=$mysql->query("select * from restaurants".$chosen);


        while ($row=$result->fetch_assoc())
        {



            $lastCol="";
        if (isset($_SESSION["role"])) {
          $lastCol = 
          "<td>
                
                    <form method='POST' action='add.php'>
                        <input type='hidden' name='name' value='".stripcslashes($row["name"])."'>
                        <input type='hidden' name='city' value='".stripcslashes($row["city"])."' >
                        <input type='hidden' name='vegetarian' value='".stripcslashes($row["vegetarian"])."' >
                        <input type='hidden' name='vegan' value='".stripcslashes($row["vegan"])."' >
                        <input type='hidden' name='number' value='".stripcslashes($row["number"])."' >
                        <input type='hidden' name='capacity' value='".stripcslashes($row["capacity"])."' >
                        <input type='hidden' name='id' value='".stripcslashes($row["id"])."' >
                        <button type='submit' class='btn btn-primary'>Редакция</button>
                    </form>

                </td>
                <td>
                    <form method='POST' action='remove.php'>
                        <input type='hidden' name='id' value='".stripcslashes($row["id"])."' >
                        <button type='submit' class='btn btn-primary'>Изтриване</button>
                    </form>
                </td>";
        }







            $newLastCol=$lastCol;
            if ($row["creator"]==$id||$role==0) {
                $newLastCol=$lastCol;
            }
            else{
                $newLastCol="<td>---</td><td>---</td>";
            }

            $vegetarian = $row["vegetarian"]==1?"&#9989":"&#10060";
             $vegan = $row["vegan"]==1?"&#9989":"&#10060";
            echo "<tr>" .
                "<td>".htmlspecialchars(stripcslashes($row["name"]))."</td>" .
                "<td>".htmlspecialchars(stripcslashes($row["city"]))."</td>" .
                "<td>".stripcslashes($vegetarian)."</td>" .
                "<td>".stripcslashes($vegan)."</td>" .
                "<td>".htmlspecialchars(stripcslashes($row["number"]))."</td>" .
                "<td>".htmlspecialchars(stripcslashes($row["capacity"]))."</td>".
                $newLastCol.
                "</tr>";
        }
        $mysql->close();
 ?>