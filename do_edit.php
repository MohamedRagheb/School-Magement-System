<?php
 session_start();
 if (!isset($_SESSION["username"])){
   header('Location:index.php');
 };
    include 'db_connection .php';
    $user_name = $_POST['user_name'];
    $user_id = $_POST['user_id'];
    $user_age = $_POST['user_age'];
    $user_gender = $_POST['user_gender'];
    $user_enwan = $_POST['user_enwan'];
    $user_marhala = $_POST['marhala'];
    $sql = "UPDATE `talba` SET `name`='$user_name',`marhala`='$user_marhala',`enwan`='$user_enwan',`age`='$user_age',`gender`='$user_gender' WHERE talba.id = $user_id";
    $conn-> query($sql);
    header("Location:mainPanel.php");
?>