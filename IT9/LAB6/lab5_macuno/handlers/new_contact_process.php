<?php
include('../db_connect.php');
require('../head.php');


try {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];

    $sql = "INSERT INTO contact(firstName, lastName, contactNumber, email) VALUES(?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $first_name, $last_name, $contact_number, $email);

    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("location: ../index.php");
    exit;
} catch (\Exception $e) {

    $conn->close();
    die($e);
}
