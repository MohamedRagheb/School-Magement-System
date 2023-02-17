<?php
    session_start();
    if (!isset($_SESSION["username"])){
      header('Location:index.php');
    };
    include 'db_connection .php';
    $id = $_SESSION['teacherid'];
    $sql = "SELECT * FROM `teachers`  WHERE id = $id";
    $result = $conn->query($sql);
    $row_all = $result->fetch_assoc();
    // print_r($row);
?>
<head>
    <style>
        form{
            width:50%;
            margin-left:25%;
            margin-top:10%;
        }
        form h2{
            margin-left:25.5%;
        }
    </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form action="do_teacher_inser.php" method="POST">
    <h2>Edit Your Info <?=$_SESSION['username']?></h2>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" value="<?=$row_all['name']?>" name="username">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" value="<?=$row_all['password']?>" name="userpassword">
    </div>
  </div>
  <div class="row mb-3">
  <label for="selectgender" class="col-sm-2 col-form-label">Gender</label>
  <div class="col-sm-10">
  <select name="user_gender" id="selectgender" class="form-select" aria-label="Default select example">
                    <option value="none" selected  disabled>SELECT GENDER</option>
                    <?php 
                    $sql = "SELECT * FROM Gender ";
                    $resu = $conn-> query($sql);
                    while($row_gender = $resu-> fetch_assoc()){
                        if($row_gender['id']== $row_all['gender']){?>
                            <option value="<?= $row_gender['id']?>" selected><?= $row_gender['name']?></option>
                            <?php
                        }
                        ?>
                        <option value="<?= $row_gender['id']?>"><?= $row_gender['name']?></option>
                        <?php
                    }
                    ?>
               </select>
    </div>
    </div>
 
    <div class="row mb-3">
  <label for="selectmarhala" class="col-sm-2 col-form-label">Marhala</label>
  <div class="col-sm-10">
  <select name="user_marhala" id="selectgender" class="form-select" aria-label="Default select example">
                    <option value="none" selected  disabled>SELECT MARHALA</option>
                    <?php 
                    $sql = "SELECT * FROM marhala ";
                    $resu = $conn-> query($sql);
                    while($row_marhala = $resu-> fetch_assoc()){
                        if($row_marhala['id']== $row_all['marhala']){?>
                            <option value="<?= $row_marhala['id']?>" selected><?= $row_marhala['name']?></option>
                            <?php
                        }
                        ?>
                        <option value="<?= $row_marhala['id']?>"><?= $row_marhala['name']?></option>
                        <?php
                    }
                    ?>
               </select>
    </div>
    </div>
    <div class="row mb-3">
  <label for="selectsubject" class="col-sm-2 col-form-label">Subject</label>
  <div class="col-sm-10">
  <select name="user_subject" id="selectgender" class="form-select" aria-label="Default select example">
                    <option value="none" selected  disabled>SELECT SUBJECT</option>
                    <?php 
                    $sql = "SELECT * FROM subject ";
                    $resu = $conn-> query($sql);
                    while($row_subject = $resu-> fetch_assoc()){
                        if($row_subject['id']== $row_all['subject_id']){?>
                            <option value="<?= $row_subject['id']?>" selected><?= $row_subject['name']?></option>
                            <?php
                        }
                        ?>
                        <option value="<?= $row_subject['id']?>"><?= $row_subject['name']?></option>
                        <?php
                    }
                    ?>
               </select>
    </div>
    </div>
  </div>
 <center> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Edit <?=$row_all['name']?> Info
</button></center>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $row_all['name']?> Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <B>Do You Want To Edit <?= $row_all['name']?> information</B>
        <br>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Edit</button>

      </div>
    </div>
  </div>
</div>

</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>