<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "contacts_db_MACUNO";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $workphone = $_POST['workphone'];
    $homephone = $_POST['homephone'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("CALL EditContacts(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $id, $firstname, $lastname, $birthdate, $workphone, $homephone, $email);
    $stmt->execute();

    header("Location: listcontacts.php");
    exit();
}
?>
