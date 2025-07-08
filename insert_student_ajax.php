<?php
$conn = new mysqli('localhost', 'root', '', 'mydb');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$targetDir = "uploads/";

if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

$profileImage = $targetDir . basename($_FILES["profile"]["name"]);

if (!move_uploaded_file($_FILES["profile"]["tmp_name"], $profileImage)) {
    die("Error uploading profile image.");
}

$roll = $_POST['roll'];
$name = $_POST['name'];
$department = $_POST['department'];
$year = $_POST['year'];

$sql = "INSERT INTO student (profile_image, roll, name, department, year) VALUES ('$profileImage', '$roll', '$name', '$department', '$year')";

if ($conn->query($sql) === TRUE) {
    echo "Student data added successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
