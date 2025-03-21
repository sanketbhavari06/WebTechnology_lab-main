<?php
$servername = "localhost";
$username = "root";
$password = "sanchit07"; // Default for XAMPP
$database = "your_database"; // Use your actual database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$roll_no = "";
$name = "";
$email = "";
$mobile_no = "";
$address = "";

// If roll_no is submitted, fetch the data
if (isset($_GET['roll_no'])) {
    $roll_no = $_GET['roll_no'];
    $sql = "SELECT * FROM your_table WHERE roll_no='$roll_no'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $mobile_no = $row['mobile_no'];
        $address = $row['address'];
    } else {
        echo "<script>alert('Record not found!'); window.location.href='update.php';</script>";
    }
}

// If form is submitted, update the record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_no = $_POST['roll_no'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    $address = $_POST['address'];

    $sql = "UPDATE your_table SET name='$name', email='$email', mobile_no='$mobile_no', address='$address' WHERE roll_no='$roll_no'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record Updated Successfully'); window.location.href='update.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
</head>
<body>
    <h2>Update Student Record</h2>

    <form method="GET" action="">
        <label>Enter Roll No to Modify:</label>
        <input type="text" name="roll_no" required>
        <button type="submit">Fetch Record</button>
    </form>

    <?php if (!empty($name)) { ?>
        <form method="POST" action="">
            <input type="hidden" name="roll_no" value="<?php echo $roll_no; ?>">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>" required><br>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>" required><br>
            <label>Mobile No:</label>
            <input type="text" name="mobile_no" value="<?php echo $mobile_no; ?>" required><br>
            <label>Address:</label>
            <input type="text" name="address" value="<?php echo $address; ?>" required><br>
            <button type="submit">Update</button>
        </form>
    <?php } ?>

    <br>
    <a href="display.php">Go Back to Records</a>
</body>
</html>
