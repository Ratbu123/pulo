<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "brg-pulo";
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// DELETE FUNCTION
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM `b-official` WHERE id=$id");
    echo "<script>alert('Official deleted successfully!'); window.location.href='admin.php';</script>";
    exit();
}

// UPDATE FUNCTION
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $number = $_POST['number'];
    $barangay = $_POST['barangay'];
    $position = $_POST['position'];
    $age = $_POST['age'];
    $dob = $_POST['dateofbirth'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $picture = $_POST['old_picture'];
    if ($_FILES['picture']['name']) {
        $targetDir = "uploads/";
        $picture = basename($_FILES["picture"]["name"]);
        move_uploaded_file($_FILES["picture"]["tmp_name"], $targetDir . $picture);
    }

    $sql = "UPDATE `b-official` SET 
                fname='$fname', 
                mname='$mname', 
                lname='$lname', 
                number='$number',
                barangay='$barangay', 
                position='$position', 
                age='$age', 
                dateofbirth='$dob',
                address='$address', 
                picture='$picture', 
                email='$email', 
                password='$password' 
            WHERE id=$id";

    if ($conn->query($sql)) {
        echo "<script>alert('Official updated successfully!'); window.location.href='admin.php';</script>";
        exit();
    } else {
        echo "<script>alert('Update failed!'); window.location.href='admin.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Barangay Officials</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Barangay Officials</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>Picture</th>
            <th>Full Name</th>
            <th>Position</th>
            <th>Barangay</th>
            <th>Contact</th>
            <th>Age</th>
            <th>Date of Birth</th>
            <th>Address</th>
            <th>Email</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM `b-official`");
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><img src="<?= $row['picture'] ?: 'images/sub/usericon.png' ?>" width="50" height="50" style="border-radius: 50%;"></td>
            <td><?= $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] ?></td>
            <td><?= $row['position'] ?></td>
            <td><?= $row['barangay'] ?></td>
            <td><?= $row['number'] ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= $row['dateofbirth'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['password'] ?></td>
            <td>
                <a href="?edit=<?= $row['id'] ?>">Edit</a> |
                <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this official?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

<?php
// SHOW EDIT FORM
if (isset($_GET['edit'])):
    $id = intval($_GET['edit']);
    $editData = $conn->query("SELECT * FROM `b-official` WHERE id=$id")->fetch_assoc();
?>
    <h3>Edit Official</h3>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $editData['id'] ?>">
        <input type="hidden" name="old_picture" value="<?= $editData['picture'] ?>">

        First Name: <input type="text" name="fname" value="<?= $editData['fname'] ?>"><br>
        Middle Name: <input type="text" name="mname" value="<?= $editData['mname'] ?>"><br>
        Last Name: <input type="text" name="lname" value="<?= $editData['lname'] ?>"><br>
        Contact Number: <input type="text" name="number" value="<?= $editData['number'] ?>"><br>
        Barangay: <input type="text" name="barangay" value="<?= $editData['barangay'] ?>"><br>
        Position: <input type="text" name="position" value="<?= $editData['position'] ?>"><br>
        Age: <input type="number" name="age" value="<?= $editData['age'] ?>"><br>
        Date of Birth: <input type="date" name="dateofbirth" value="<?= $editData['dateofbirth'] ?>"><br>
        Address: <input type="text" name="address" value="<?= $editData['address'] ?>"><br>
        Email: <input type="email" name="email" value="<?= $editData['email'] ?>"><br>
        Password: <input type="text" name="password" value="<?= $editData['password'] ?>"><br>
        Picture: <input type="file" name="picture"><br>
        <img src="uploads/<?= $editData['picture'] ?>" width="50"><br><br>
        <input type="submit" name="update" value="Update">
    </form>
<?php endif; ?>

</body>
</html>
