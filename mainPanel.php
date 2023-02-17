<?php
  session_start();
  if (!isset($_SESSION["username"])){
    header('Location:index.php');
  };
  include 'db_connection .php';
$sql = "SELECT talba.id as id,talba.name AS name,talba.age AS age,enwan.name as enwan,gender.name AS gender ,marhala.name AS marhala FROM talba,enwan,gender,marhala WHERE talba.enwan=enwan.id AND gender.id = talba.gender and marhala.id =talba.marhala ORDER BY id ASC";
$resulat = $conn -> query($sql);
?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <style>


a:link {text-decoration:none}
a:visited {text-decoration:none}
a:hover {text-decoration:none}
a:active {text-decoration:none}

   </style>
</head>
<a href="insert-taleb.php" class="btn btn-primary form-control" > Insert new person </a>

<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
      <th scope="col">Marhala</th>
      <th scope="col">Control</th>
    </tr>
  </thead>
  <tbody>
   <?php
   while($row = $resulat->fetch_assoc()){
      ?>
      <tr>
         <td style="padding:10px"><?=$row['id']?></td>
         <td style="padding:10px"><?=$row['name']?></td>
         <td style="padding:10px"><?=$row['age']?></td>
         <td style="padding:10px"><?=$row['gender']?></td>
         <td style="padding:10px"><?=$row['marhala']?></td>
         <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['id']?>">
           Delete
               </button>

         <!-- Modal -->
         <div class="modal fade" id="exampleModal<?= $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
               Do You Want to DELETE <?= $row['name']?>
               </div>
               <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
               <button type="button" class="btn btn-danger"><a href="delete.php?id=<?= $row['id']?>"><font color="white">DELETE</font></a></button>
               </div>
            </div>
         </div>
         </div>
         <button type="button" class="btn btn-primary" >
            <a href="edit.php?id=<?= $row['id']?>" style="underline-color:none"><font color="white">Edit</font></a>
               </button>

         </td>
      </tr>
      <?php
   }
   ?>
   
  </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>