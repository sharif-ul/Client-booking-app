<?php

$user = 'root';
$pass = '';
$db = 'test';

$db = new mysqli('localhost', $user, $pass, $db) or die("unable to connect");

echo "Great work";

?>