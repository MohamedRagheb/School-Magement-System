<?php
session_start();

if (!isset($_SESSION["username"])){
  header('Location:index.php');
};
include 'db_connection .php';
$id = $_SESSION['teacherid'];
$username = $_POST['username'];
$userpassword = $_POST['userpassword'];
$usermarhala = $_POST['user_marhala'];
$usergender = $_POST['user_gender'];
$usersubject = $_POST['user_subject'];

$sql = "UPDATE `teachers` SET `name`='$username',`password`='$userpassword',`gender`='$usergender',`marhala`='$usermarhala',`subject_id`='$usersubject' WHERE id = $id";
$conn->query($sql);
header("Location:mainPage.php");
?>