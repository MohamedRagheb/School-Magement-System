
<?php
   session_start();
   include 'db_connection .php';
   if (isset($_SESSION["username"])) {
    header('Location:mainPage.php');
    }
    $_SESSION['username'] = null;

   if(isset($_POST['btn'])){
     $username =$_POST['name'];
     $password =$_POST['password'];
     $sql = "SELECT * FROM `teachers` WHERE name = '$username' and password = '$password' and 5>pr>0";
     $result = $conn-> query($sql);
     $row = $result->fetch_assoc();
     $num_rows = $result->num_rows;
     if($num_rows>0){
       header('Location: mainPage.php');
       $_SESSION['success'] = "You are logged in";
       $_SESSION['username'] = $username; 
       $_SESSION['marhala'] = $row['marhala'];
       $_SESSION['pr'] = $row['pr'];
       $_SESSION['teacherid'] = $row['id'];
      }else{
        // header('location:index.php');
        unset($_SESSION["username"]);

      }
     global $row; 
    };

?>
<head>
    <style>
        form{
            width:30%;
            position:relative;
            top:30%;
            left:35%;
        }

    </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form method="POST" action="<?=$_SERVER['PHP_SELF']?>" >
    <center><h2 style="color:blue;">Sign In</h2 ></center>
  <!-- Email input -->
  <div class="form-outline mb-4">
      <label class="form-label" for="form2Example1">User Name</label>
    <input type="name" id="form2Example1" class="form-control" name="name"/>
  </div>
  <!-- Password input -->
  <div class="form-outline mb-4">
      <label class="form-label" for="form2Example2">Password</label>
    <input type="password" id="form2Example2" class="form-control" name="password"/>
  </div>
  <!-- Submit button -->
  <center>
    <?php
     global $num_rows;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($num_rows == 0 ){
          echo '<div class="alert alert-danger" role="alert">
          This User Not Found
        </div>';

        }
        
        }
            
    ?>
  <button type="submit" class="btn btn-primary btn-block mb-4 " name="btn">Sign in</button></center>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>