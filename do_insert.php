<?php
        session_start();
        if (!isset($_SESSION["username"])){
          header('Location:index.php');
        };

include 'db_connection .php';
// declartion-section
$name = $_POST['user_name'];
$age = $_POST['user_age'];
$marhala = $_POST['marhala'];
$enwan = $_POST['Enwan'];
$gender = $_POST['gender'];
$add_more = $_POST['addmore'];
echo $add_more ;
// sql_code
$sql = "INSERT INTO `talba`( `name`, `marhala`, `enwan`, `age`, `gender`) VALUES ('$name','$marhala','$enwan','$age','$gender')";
$conn->query($sql);
if($add_more == "addmore"){
    header("Location:insert-taleb.php");
}else{
    header("Location:mainPanel.php");

}
?>