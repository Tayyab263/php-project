<?php
include "connection.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $del = "DELETE FROM `curd` WHERE id='$id'";
    $run = mysqli_query($conn, $del);
    if ($run) {
        echo 1;
    } else {
       echo  2;
    }
}
?>
