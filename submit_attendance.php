<?php
// Connection info
$host = "localhost";
$user = "root";
$pass = ""; // default XAMPP password is empty
$db = "hris_demo";

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get data from POST
$name = $_POST['employeeName'];
$date = $_POST['attendanceDate'];

// Prepare SQL insert
$stmt = $conn->prepare("INSERT INTO attendance (employee_name, attendance_date) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $date);

// Execute and respond
if ($stmt->execute()) {
  echo "✅ Attendance recorded for $name on $date";
} else {
  echo "❌ Error saving attendance.";
}

// Cleanup
$stmt->close();
$conn->close();
?>
