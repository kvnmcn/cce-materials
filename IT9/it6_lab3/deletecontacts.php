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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("CALL DeleteContacts(?)");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: listcontacts.php");
exit();
?>
