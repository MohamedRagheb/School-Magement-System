<?php

 session_start();
 if (!isset($_SESSION["username"])){
   header('Location:index.php');
 };

?>

<head>
    <style>
        a:link {text-decoration:none}
        a:visited {text-decoration:none}
        a:hover {text-decoration:none}
        a:active {text-decoration:none}
    </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    

<table class="table table table-hover">
  <thead>
    <tr>
      <th scope="col" style="padding:10px;">Id</th>
      <th scope="col" style="padding:10px;">Name</th>
      <th scope="col" style="padding:10px;">Gender</th>
      <th scope="col" style="padding:10px;">Marhala</th>
      <th scope="col" style="padding:10px;">Age</th>
      <th scope="col" style="padding:10px;">Enwan</th>
      <th scope="col" style="padding:10px;">Control</th>
    </tr>
  </thead>
  <tbody>
    
    <?php

include "db_connection .php"; 
$s_marhala = $_SESSION['marhala'];
// echo $s_marhala;
$sql_cod = "SELECT talba.id as id,talba.name AS name,talba.age AS age,enwan.name as enwan,gender.name AS gender ,marhala.name AS marhala FROM talba,enwan,gender,marhala WHERE talba.enwan=enwan.id AND gender.id = talba.gender and marhala.id =talba.marhala and talba.marhala = $s_marhala;";
$resulat = $conn -> query($sql_cod);
$count = $resulat-> num_rows;
if ($count == 0) {  
  echo '<div class="alert alert-warning" role="alert">
      <strong>Nothing here!</strong>
</div>';
}
while($roww = $resulat->fetch_assoc()){
   ?>
   <tr>
    <!-- <th scope="roww"><?=$roww["id"]?><th> -->
      <td style="padding:30px;"><?=$roww["id"]?></td>
      <td style="padding:30px;"><?=$roww["name"]?></td>
      <td style="padding:30px;"><?=$roww["gender"]?></td>
      <td style="padding:30px;"><?=$roww["marhala"]?></td>
      <td style="padding:30px;"><?=$roww["age"]?></td>
      <td style="padding:30px;"><?=$roww["enwan"]?></td>
      <td style="padding:30px;"><button type="button" class="btn btn-success"><a href="std-grade.php?id=<?=$roww["id"]?>"><font color="white">Show Grades</font></a></button></td>
     
    </tr>
    <?php
    
}
?>
</tbody>
</table>
<tr>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>