<?php
$servername = "localhost";
$username = "root";
$password = "sanchit07"; // Default for XAMPP
$database = "your_database"; // Use your actual database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['roll_no'])) {
        $roll_no = $_POST['roll_no'];

        // Delete query
        $sql = "DELETE FROM your_table WHERE roll_no='$roll_no'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Record Deleted Successfully'); window.location.href='delete.php';</script>";
        } else {
            echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Please enter a Roll No');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
</head>
<body>
    <h2>Delete Student Record</h2>
    <form method="POST" action="">
        <label>Enter Roll No to Delete:</label>
        <input type="text" name="roll_no" required>
        <button type="submit">Delete</button>
    </form>
    <br>
    <a href="display.php">Go Back to Records</a>
</body>
</html>
