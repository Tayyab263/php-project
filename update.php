<?php
include 'connection.php';

   $id= $_GET['id'];
   $sql = "SELECT * FROM `curd` WHERE `id`=$id";
    $run = mysqli_query($conn, $sql);
    $fet = mysqli_fetch_assoc($run);
  echo json_encode($fet,true);

?>
