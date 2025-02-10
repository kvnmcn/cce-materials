<?php
session_start();

if (!isset($_GET['id']) || !isset($_SESSION['contacts'][$_GET['id']])) {
    header('Location: ../index.php');
    exit();
}

$c_index = $_GET['id'];
$contact = &$_SESSION['contacts'][$c_index];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];

    $contact['first_name'] = $first_name;
    $contact['last_name'] = $last_name;
    $contact['contact_number'] = $contact_number;
    $contact['email'] = $email;

    header('Location: ../index.php');
    exit();
}

$page_title = "Update Contact";
require('../head.php');
?>

<header></header>
<main>
    <div class="container vh-100">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col col-5">
                <div class="row mb-5">
                    <h1 class="p-0">Update Contact</h1>
                    <small class="text-secondary p-0">Please fill out the form to update contact.</small>
                </div>
                <form action="edit_contact.php?id=<?= $c_index ?>" method="POST">
                    <input type="hidden" name="index" value="<?= $c_index ?>">
                    <div class="row">
                        <div class="col p-0 mb-3">
                            <label for="fname" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fname" name="first_name"
                                value="<?= $contact['first_name'] ?>" required />
                        </div>
                        <div class="col">
                            <label for="lname" class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lname" name="last_name"
                                value="<?= $contact['last_name'] ?>" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col p-0">
                            <label for="contact_number" class="form-label">Contact Number <span
                                    class="text-danger">*</span></label>
                            <input type="tel" class="form-control" name="contact_number"
                                value="<?= $contact['contact_number'] ?>" required />
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" value="<?= $contact['email'] ?>"
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Save Changes</button>
                    </div>
                    <div class="row mb-3">
                        <a href="../index.php" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i>
                            Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<footer></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>