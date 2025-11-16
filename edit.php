<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM contacts WHERE id=$id"));

if(isset($_POST['update'])){
    $name  = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $tag   = $_POST['tag'];

    $query = "UPDATE contacts 
              SET name='$name', phone='$phone', email='$email', tag='$tag'
              WHERE id=$id";

    mysqli_query($conn, $query);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Contact</h2>

<form method="POST">
    <input type="text" name="name" value="<?= $data['name'] ?>" required>
    <input type="text" name="phone" value="<?= $data['phone'] ?>" required>
    <input type="email" name="email" value="<?= $data['email'] ?>" required>

    <select name="tag">
        <option <?= $data['tag']=="Family"?"selected":"" ?>>Family</option>
        <option <?= $data['tag']=="Friends"?"selected":"" ?>>Friends</option>
        <option <?= $data['tag']=="Work"?"selected":"" ?>>Work</option>
        <option <?= $data['tag']=="Other"?"selected":"" ?>>Other</option>
    </select>

    <button name="update">Update Contact</button>
</form>

</body>
</html>
