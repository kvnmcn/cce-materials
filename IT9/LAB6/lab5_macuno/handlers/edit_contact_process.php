<?php
include '../db_connect.php';

$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$contact_number = $_POST['contact_number'];
$email = $_POST['email'];

$id = (int) $id;

$sql = "UPDATE contact SET firstName = ?, lastName = ?, contactNumber = ?, email = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssisi", $first_name, $last_name, $contact_number, $email, $id);

if ($stmt->execute()) {

    header("Location: ../index.php");
} else {

    echo "Error updating record: " . $stmt->error;
}

$stmt->close();
$conn->close();
