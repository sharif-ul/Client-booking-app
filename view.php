<?php

require_once('config.php');
require_once('functions.php');

/*Open the connection to our database use the info from the config file.*/
$link = f_sqlConnect(DB_USER, DB_PASSWORD, DB_NAME);

//Input For Find Values of all bookings
$sql = "SELECT * FROM bookingform";

$results = mysql_query($sql);

if (!$results) {
    die('Invalid query: ' . mysql_error());
}

echo '<h3>Customer names: </h3>';

while ($row = $result = mysql_fetch_array($results)) {
    echo '<div style="border: 1px solid #e4e4e4; padding: 1px; margin-bottom: 2px;">';
    echo '<p>ID: ' . $row['ID'] . '</p>';
    echo '<p>Name: ' . $row['username'] . '</p>';
    echo '<p>E-mail: ' . $row['email'] . '</p>';
    echo '<p>Phone: ' . $row['phone'] . '</p>';
    echo '</div>';
}
/* var_dump($result); // to check the full path and content */
?>


