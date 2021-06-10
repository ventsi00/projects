<?php 
	include "top.inc";
    $register = isset($_POST["register"])?$_POST["register"]:0;
 ?>

    <?php 
        if ($register==0) {
            echo "
            <form method='POST' action='login.php'>

                <div class='form-group'>
                    <label for='name'>Име</label>
                    <input minlength='5' maxlength='15' type='name' class='form-control' id='name' name='name' aria-describedby='name' placeholder='Въведи потребителско име'>
                </div>

                <div class='form-group'>
                    <label for='password'>Парола</label>
                    <input minlength='5' maxlength='30' type='password' class='form-control' id='password' name='password' aria-describedby='password' placeholder='Въведи парола'>
                </div>

                <br>

                <button style='margin-left: 45%;' type='submit' class='btn btn-primary'>Вписване</button>
            </form>

            <br>

            <form method='POST' action='login-form.php'>
                <input type='hidden' name='register' value='1'>
                <button style='margin-left: 42%;' type='submit' class='btn btn-primary'>Към регистрация</button>
            </form>";
        }
        else{
            
            echo "<form method='POST' action='register.php' enctype='multipart/form-data'>";
            include 'reg-form.inc';
            echo "<button style='margin-left: 45%;' type='submit' class='btn btn-primary'>Регистрация</button>
            </form>";
        }
     ?>
 	



 <?php 
 	include "bottom.inc";
  ?>