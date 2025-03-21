<?php
$servername = "localhost";
$username = "root";
$password = "sanchit07"; // Default for XAMPP
$database = "your_database"; // Use your actual database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$query = "SELECT * FROM your_table";
$result = $conn->query($query);

echo "<h2>Student Records</h2>";
echo "<table border='1' cellpadding='10'>
<tr>
    <th>Roll No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile No.</th>
    <th>Address</th>
</tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['roll_no']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['mobile_no']}</td>
            <td>{$row['address']}</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No Record Found";
}

$conn->close();
?>
