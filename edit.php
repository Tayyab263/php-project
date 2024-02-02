<?php
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $uid = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $stmt = $conn->prepare("UPDATE `curd` SET `name`=?, `email`=?, `mobile`=?, `address`=? WHERE `id`=?");
    $stmt->bind_param("ssssi", $name, $email, $mobile, $address, $uid);

    if ($stmt->execute()) {
        echo 1;
    } else {
        echo 2;
    }

    $stmt->close();
    $conn->close();
}



?>
