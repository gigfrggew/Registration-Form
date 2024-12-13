<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Create a connection
$conn = new mysqli("localhost", "root", "", "registration");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$dob = $_POST['dob'];
$email = $_POST['e-mail'];
$year = $_POST['year'];
$branch = $_POST['branch'];
$usn = $_POST['usn1'];
$section = $_POST['section'];

// Insert data into the database
$sql = "INSERT INTO students (name, dob, `e-mail`, year, branch, usn, section) 
        VALUES ('$name', '$dob', '$email', '$year', '$branch', '$usn', '$section')";

if ($conn->query($sql) === TRUE) {
    // Redirect to the viewdetails.html page after successful registration
    header("Location: viewdetails.html");
    exit(); // Ensure no further code is executed after redirection
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
</body>
</html>
