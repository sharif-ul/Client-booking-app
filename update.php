<?php
// DB Connection Info
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookingform";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// Code for EDIT button
if (isset($_POST['edit'])) {
$ID = $_POST['ID'];
}
// Code for UPDATE button
if (isset($_POST['update'])) {
$ID = $_POST['ID'];
$name = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$sql = "UPDATE bookingform SET username = '$name', email = '$email', phone = '$phone'  WHERE ID = '$ID';";
$conn->query($sql);
}
// SQL Query
$sql = "SELECT * FROM bookingform WHERE ID = '$ID';";
$result = $conn->query($sql);
//Loop through and echo all the records
while ($row = $result->fetch_assoc()){
echo "<form method='post' action='update.php'>";
echo "<input type='hidden' name='ID' value='" . $row['ID'] . "'>";
echo "Last Name: <input type='text' name='username' value='" . $row['username'] . "'> <br>";
echo "First Name: <input type='text' name='email' value='" . $row['email'] . "'> <br>";
echo "Email: <input type='text' name='phone' value='" . $row['phone'] . "'> <br> ";
echo "<input type='submit' name='update' value='update'>";
echo "</form>";
}
$conn->close();
?>