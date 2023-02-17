<?php
    include "db_connection .php";
    if(!isset($_SESSION["username"])){
      header("location:mainpage.php"); 
} 
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
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body>
    
    
    <form action="do_insert.php" method="post"> 
    <h2>Insert New Person Info</h2>
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example1" class="form-control"  name="user_name">
        <label class="form-label" for="form6Example1"> Name</label>
      </div>
    </div>
    <br>
    
  </div>
<!--age input-->
<div class="form-outline mb-4">
        <input type="number" id="form6Example2" class="form-control"  name="user_age"/>
        <label class="form-label" for="form6Example2">Age</label>
      </div>
  <!-- marhala input -->

  <select class="form-select form-control form-outline" aria-label="Default select example" name="marhala">
  <option selected disabled> Select Your marhala</option>
  <?php
    $sql =" SELECT * FROM marhala";
    $resulat_marhalla = $conn -> query($sql);
    while($marhala_row =$resulat_marhalla ->fetch_assoc()){
        ?>
        <option value="<?= $marhala_row['id']?>"><?= $marhala_row['name']?></option>
        <?php
    };
  ?>
  
</select>
<br>


  <!-- Enwan input -->
  
  <select class="form-select form-control form-outline" aria-label="Default select example" name="Enwan">
  <option selected disabled> Select Your Enwan</option>
  <?php
    $sql =" SELECT * FROM enwan";
    $resulat_enwan = $conn -> query($sql);
    while($enwan_row =$resulat_enwan ->fetch_assoc()){
        ?>
        <option value="<?= $enwan_row['id']?>"><?= $enwan_row['name']?></option>
        <?php
    };
  ?>
  
</select>
<br>
  

  <!-- Gender input -->
  <select class="form-select form-control form-outline" aria-label="Default select example" name="gender">
  <option selected disabled> Select Your gender</option>
  <?php
  
    $sql =" SELECT * FROM gender";
    $resulat_gender = $conn -> query($sql);
    while($gender_row =$resulat_gender->fetch_assoc()){
        ?>
        <option value="<?= $gender_row['id']?>"><?= $gender_row['name']?></option>
        <?php
    };
  ?>
  
</select>
<br>
  <!-- Check box  -->

  <input class="form-check-input" type="checkbox" value="addmore" id="flexCheckIndeterminate" name="addmore">
  <label class="form-check-label" for="flexCheckIndeterminate">
    Do you Want To Add More 
  </label>
<br>
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Insert New Person</button>
</form>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
></script> 
</body>