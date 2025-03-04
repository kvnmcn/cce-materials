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

// Retrieve and display contacts using ListAllContacts stored procedure
$result = $conn->query("CALL ListAllContacts()");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center">Contact List</h2>
    <div class="d-flex justify-content-center mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addContactModal">Add New Contact</button>
	</div>

    
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthdate</th>
                <th>Work Phone</th>
                <th>Home Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                    <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                    <td><?php echo htmlspecialchars($row['birthdate']); ?></td>
                    <td><?php echo htmlspecialchars($row['workphone']); ?></td>
                    <td><?php echo htmlspecialchars($row['homephone']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm edit-btn"
                                data-id="<?php echo $row['id']; ?>"
                                data-firstname="<?php echo $row['firstname']; ?>"
                                data-lastname="<?php echo $row['lastname']; ?>"
                                data-birthdate="<?php echo $row['birthdate']; ?>"
                                data-workphone="<?php echo $row['workphone']; ?>"
                                data-homephone="<?php echo $row['homephone']; ?>"
                                data-email="<?php echo $row['email']; ?>"
                                data-bs-toggle="modal" data-bs-target="#editContactModal">Edit</button>
                        <a href="deletecontacts.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="addContactLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addContactLabel">Add New Contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="processcontacts.php" method="POST">
                    <input type="text" name="firstname" class="form-control mb-2" placeholder="First Name" required>
                    <input type="text" name="lastname" class="form-control mb-2" placeholder="Last Name" required>
                    <input type="date" name="birthdate" class="form-control mb-2" required>
                    <input type="text" name="workphone" class="form-control mb-2" placeholder="Work Phone">
                    <input type="text" name="homephone" class="form-control mb-2" placeholder="Home Phone">
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                    <button type="submit" class="btn btn-primary w-100">Add Contact</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editContactModal" tabindex="-1" aria-labelledby="editContactLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editContactLabel">Edit Contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="updatecontacts.php" method="POST">
                    <input type="hidden" name="id" id="edit-id">
                    <input type="text" name="firstname" id="edit-firstname" class="form-control mb-2" required>
                    <input type="text" name="lastname" id="edit-lastname" class="form-control mb-2" required>
                    <input type="date" name="birthdate" id="edit-birthdate" class="form-control mb-2" required>
                    <input type="text" name="workphone" id="edit-workphone" class="form-control mb-2">
                    <input type="text" name="homephone" id="edit-homephone" class="form-control mb-2">
                    <input type="email" name="email" id="edit-email" class="form-control mb-2" required>
                    <button type="submit" class="btn btn-warning w-100">Update Contact</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function () {
            document.getElementById('edit-id').value = this.dataset.id;
            document.getElementById('edit-firstname').value = this.dataset.firstname;
            document.getElementById('edit-lastname').value = this.dataset.lastname;
            document.getElementById('edit-birthdate').value = this.dataset.birthdate;
            document.getElementById('edit-workphone').value = this.dataset.workphone;
            document.getElementById('edit-homephone').value = this.dataset.homephone;
            document.getElementById('edit-email').value = this.dataset.email;
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$conn->close();
?>
