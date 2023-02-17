
<?php
include "db_connection .php";
session_start();
if (!isset($_SESSION["username"])){
  header('Location:index.php');
};
$std_id =$_GET["id"];
$std_subjects = "SELECT talba.name ,subject.name as subject,subject.id,talba.id as t_id FROM talba,subject WHERE talba.marhala = subject.marhala AND talba.id =$std_id;";
$final = $conn->query($std_subjects);
$row2 = $final->fetch_assoc();

?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h3>Grades Of <?= $row2["name"]?></h3>
<table class="table table-sm" style="width:300px; margin:10px 50px 10px 40px;" >
    <tr>
        <th  style="padding-left:20px;" class="border border-info">Subject</th>
        <th  style="padding-left:20px;"class="border border-info">Grade</th>
    </tr>
  
<?php
while($row = $final->fetch_assoc()){
    ?>
    <tr>
        <td style="paddig-left:20px;"><?= $row["subject"]?></td>
        <td style="paddig-left:20px;"><?= $row["id"]?></td>
    </tr>
    <?php
    
}

?>
</table>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
