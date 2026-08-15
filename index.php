<?php include 'db.php'; ?>

<?php
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
$query = "SELECT * FROM contacts 
          WHERE name LIKE '%$search%' 
          ORDER BY name ASC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Manager</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="card shadow p-4">
        <h2 class="text-center mb-4">📇 Contact Manager</h2>

        <!-- Search Bar -->
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" placeholder="Search by name..." value="<?= $search ?>">
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100">Search</button>
            </div>
            <div class="col-md-4 text-end">
                <a href="add.php" class="btn btn-success">➕ Add Contact</a>
            </div>
        </form>

        <!-- Table -->
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Tag</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td>
                        <span class="badge bg-info text-dark"><?= $row['tag'] ?></span>
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">✏ Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" 
                           onclick="return confirm('Delete Contact?')"
                           class="btn btn-sm btn-danger">🗑 Delete</a>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</div>

</body>
</html>
