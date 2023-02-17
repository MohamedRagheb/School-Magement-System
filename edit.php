<?php
 session_start();
 if (!isset($_SESSION["username"])){
   header('Location:index.php');
 };
    include 'db_connection .php';
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM talba WHERE id = '$user_id'";
    $resu = $conn-> query($sql);
    while($roww= $resu-> fetch_assoc()){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title></title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>
        <body>
            <h1 style="margin-left:400px"> Edit <?= $roww['name']?> info </h1>
            <form action="do_edit.php" method="post">
                <input type="text" name="user_name" id="user_name" value="<?= $roww["name"]?>" style="form_control">
                <br>
                <input type="number" name="user_age" id="user_age" value="<?= $roww["age"]?>">
                <br> 
               <select name="user_gender">
                    <option value="none" selected  disabled>SELECT GENDER</option>
                    <?php 
                    $sql = "SELECT * FROM Gender ";
                    $resu = $conn-> query($sql);
                    while($row_gender = $resu-> fetch_assoc()){
                        if($row_gender['id']== $roww['gender']){?>
                            <option value="<?= $row_gender['id']?>" selected><?= $row_gender['name']?></option>
                            <?php
                        }
                        ?>
                        <option value="<?= $row_gender['id']?>"><?= $row_gender['name']?></option>
                        <?php

                    }
                    ?>
               </select>
               <br>
               <select name="user_enwan">
                    <option value="none" selected disabled>SELECT ENWAN</option>
                    <?php 
                    $sql = "SELECT * FROM enwan ";
                    $resu = $conn-> query($sql);
                    while($row_enwan = $resu-> fetch_assoc()){
                        if($row_enwan['id']== $roww['enwan']){?>
                            <option value="<?= $row_enwan['id']?>" selected><?= $row_enwan['name']?></option>
                            <?php
                        }
                        ?>
                        
                        <option value="<?= $row_enwan['id']?>"><?= $row_enwan['name']?></option>
                        <?php

                    }
                    ?>
               </select>
               <br>
               <select name="marhala">
                    <option value="none" selected disabled >SELECT Marhala</option>
                    <?php 
                    $sql = "SELECT * FROM marhala ";
                    $resu = $conn-> query($sql);
                    while($row_marhalla = $resu-> fetch_assoc()){
                        if($row_marhalla['id']== $roww['marhala']){?>
                            <option value="<?= $row_marhalla['id']?>" selected><?= $row_marhalla['name']?></option>
                            <?php
                        }
                       
                        ?>
                        <option value="<?= $row_marhalla['id']?>"><?= $row_marhalla['name']?></option>
                        <?php

                    }
                    ?>
               </select>
               <input type="hidden" name="user_id" value="<?= $roww['id']?>">
               <input type="submit" value="Edit">
            </form>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        </body>
        </html>
        <?php
    }    
?>