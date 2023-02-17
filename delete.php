<?php
 session_start();
 if (!isset($_SESSION["username"])){
   header('Location:index.php');
 };
    include 'db_connection .php';
    $user_id = $_GET['id'];
    // echo $user_id ;
    $sql = "DELETE FROM talba WHERE talba.id = $user_id ";
    $conn -> query($sql);
    header("Location:mainPanel.php");

?>