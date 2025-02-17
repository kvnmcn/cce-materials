<?php

$page_title = "Contacts | Lists";
include('db_connect.php');
require('head.php');
$query = 'SELECT * FROM contact';

$result = $conn->query($query);
if ($result->num_rows > 0) :
    $contact = $result->fetch_all(MYSQLI_ASSOC);
?>
    <!-- github @kvnmcn -->

    <header></header>

    <main>
        <div class="container-fluid vh-100">
            <div class="row vh-100 align-items-center justify-content-center">
                <div class="col col-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h1 class="card-title">Contacts</h1>
                            <p class="card-text small text-secondary">This application is built using native PHP in
                                performing basic CRUD functionality.</p>

                            <a href="handlers\new_contact.php" class="btn btn-primary w-100 text-center">
                                <i class="bi bi-person-lines-fill"></i>
                                New Contact
                            </a>
                        </div>

                        <ul class="list-group border-0">
                            <?php foreach ($contact as $c) : ?>
                                <li class="list-group-item border-0">
                                    <div class="d-flex flex-column gap-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex flex-row gap-2">
                                                <i class="bi bi-person-circle fs-2"></i>
                                                <div class="ms-3">
                                                    <div class="row">
                                                        <?php echo htmlspecialchars($c['firstName'] . ' ' . $c['lastName']); ?>
                                                    </div>
                                                    <div class="row text-secondary"><?= htmlspecialchars($c['email']); ?> |
                                                        <?php echo htmlspecialchars($c['contactNumber']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row gap-2">
                                                <form action="handlers/edit_contact.php" method="GET">
                                                    <input type="hidden" name="id" value="<?= $c['id']; ?>">
                                                    <button class="btn btn-outline-success" aria-label="Update Contact">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                </form>
                                                <form action="handlers/delete_contact.php" method="POST">
                                                    <input type="hidden" name="id" value="<?= $c['id']; ?>">
                                                    <button class="btn btn-outline-danger" aria-label="Delete Contact">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php else : ?>
    <!-- No contacts available message -->
    <main>
        <div class="container-fluid vh-100">
            <div class="row vh-100 align-items-center justify-content-center">
                <div class="col col-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h1 class="card-title">Contacts</h1>
                            <p class="card-text small text-secondary">This application is built using native PHP in
                                performing basic CRUD functionality.</p>

                            <a href="handlers\new_contact.php" class="btn btn-primary w-100 text-center">
                                <i class="bi bi-person-lines-fill"></i>
                                New Contact
                            </a>
                        </div>
                        <p class="text-center text-muted">There are no contacts available.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php endif; ?>

<footer></footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>