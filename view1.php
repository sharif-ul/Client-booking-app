<?php

require_once('config.php');
require_once('functions.php');

/*Open the connection to our database use the info from the config file.*/
$link = f_sqlConnect(DB_USER, DB_PASSWORD, DB_NAME);

//Input For Find Values of all bookings
$sql = "SELECT * FROM bookingform where username LIKE '%$name%'";

$results = mysql_query($sql);

if (!$results) {
    die('Invalid query: ' . mysql_error());
}

echo '<h3>Customer details: </h3>';

while ($result = mysql_fetch_array($results)) {
    echo '<div style="border: 1px solid #e4e4e4; padding: 15px; margin-bottom: 10px;">';
    echo '<p>Name: ' . $result['username'] . '</p>';
    echo '<p>E-mail: ' . $result['email'] . '</p>';
    echo '<p>Phone: ' . $result['phone'] . '</p>';
    echo '</div>';
}

?>