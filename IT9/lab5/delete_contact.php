<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $contact_id = $_POST['id'];

    if (isset($_SESSION['contacts'][$contact_id])) {
        unset($_SESSION['contacts'][$contact_id]);
    }

    header('Location: ../index.php');
    exit();
} else {

    header('Location: index.php');
    exit();
}
