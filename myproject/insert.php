<?php
$servername = "localhost";
$username = "root";
$password = "sanchit07"; // Default for XAMPP
$database = "your_database"; // Use your actual database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$roll_no = $_POST['roll_no'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile_no = $_POST['mobile_no'];
$address = $_POST['address'];

// Insert query
$sql = "INSERT INTO your_table (roll_no, name, email, mobile_no, address) VALUES ('$roll_no', '$name', '$email', '$mobile_no', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "New record inserted successfully. <a href='display.php'>View Records</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
