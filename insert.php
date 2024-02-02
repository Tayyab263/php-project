<?php
include 'connection.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $uuencodedPassword = convert_uuencode($password);
    $stmt = $conn->prepare("INSERT INTO `curd`(`name`, `email`, `mobile`, `address`, `password`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $mobile, $address, $uuencodedPassword);
    if ($stmt->execute()) {
        echo 'Data has been inserted';
    } else {
        echo 'Data has not been inserted';

    }

    $stmt->close();
    $conn->close();
}
?>
