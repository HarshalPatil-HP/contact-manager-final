<?php include 'db.php'; ?>
<?php
if(isset($_POST['save'])){
    $name  = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $tag   = $_POST['tag'];

    $query = "INSERT INTO contacts(name, phone, email, tag)
              VALUES('$name', '$phone', '$email', '$tag')";
    mysqli_query($conn, $query);
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add New Contact</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="text" name="phone" placeholder="Phone Number" required>
    <input type="email" name="email" placeholder="Email" required>

    <select name="tag">
        <option>Family</option>
        <option>Friends</option>
        <option>Work</option>
        <option>Other</option>
    </select>

    <button name="save">Save Contact</button>
</form>

</body>
</html>
