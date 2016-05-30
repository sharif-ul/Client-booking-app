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

//Echoing the field column names in a table
echo "<table>";
echo "<tr>";
echo "<th style='width:200px; border:1px solid;'>Booking ID</th>";
echo "<th style='width:200px; border:1px solid;'>Name</th>";
echo "<th style='width:200px; border:1px solid;'>Email</th>";
echo "<th style='width:250px; border:1px solid;'>Phone</th>";
echo "</tr>";

// SQL Query
$sql = "SELECT * FROM bookingform;";
$result = $conn->query($sql);

//Loop through and echo all the records
while ($row = $result->fetch_assoc()){
echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "<td>
<form method='post' action='update.php'>
<input type='submit' name='edit' value='edit'>
<input type='hidden' name='ID' value='" . $row['ID'] . "'>
</form></td>";
echo "</tr>";
}
//Closing the table
echo "</table>";
//Closing the database connection
$conn->close();
?>