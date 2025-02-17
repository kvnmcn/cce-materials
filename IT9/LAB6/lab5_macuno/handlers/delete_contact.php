<?php
include('../db_connect.php');


try {
    $id = $_POST['id'];

    $sql = "DELETE FROM contact WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header("location: ../index.php");
} catch (\Exception $e) {

    $conn->close();
    die($e);
}
