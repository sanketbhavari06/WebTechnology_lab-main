<!DOCTYPE html>
<html>
<head>
    <title>Insert Data</title>
</head>
<body>
    <h2>Insert Student Data</h2>
    <form action="insert.php" method="POST">
        Roll No: <input type="number" name="roll_no" required><br><br>
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Mobile No: <input type="text" name="mobile_no" required><br><br>
        Address: <input type="text" name="address" required><br><br>
        <input type="submit" value="Insert">
    </form>
    <br>
    <a href="display.php">View Records</a>
</body>
</html>
