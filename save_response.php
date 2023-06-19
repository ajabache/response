<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$inputData = $_POST['input_data'];
$textareaData = $_POST['textarea_data'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query
$stmt = $conn->prepare("INSERT INTO responses (input_data, textarea_data) VALUES (?, ?)");
$stmt->bind_param("ss", $inputData, $textareaData);
$stmt->execute();

$stmt->close();
$conn->close();

echo "Response saved successfully!";
?>
