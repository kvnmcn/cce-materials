<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];

    $_SESSION['contacts'][] = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'contact_number' => $contact_number,
        'email' => $email,
    ];

    header('Location: ../index.php');
    exit();
}
$page_title = "New Contact";
require('../head.php');
?>

<header></header>
<main>
    <div class="container vh-100">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col col-5">
                <div class="row mb-5">
                    <h1 class="p-0">New Contact</h1>
                    <small class="text-secondary p-0">Please fill out the form to add new contact.</small>
                </div>
                <form action="new_contact.php" method="POST">
                    <div class="row">
                        <div class="col p-0 mb-3">
                            <label for="fname" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fname" name="first_name" required />
                        </div>
                        <div class="col">
                            <label for="lname" class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lname" name="last_name" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col p-0">
                            <label for="contact_number" class="form-label">Contact Number <span
                                    class="text-danger">*</span></label>
                            <input type="tel" class="form-control" name="contact_number" required />
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Save</button>
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