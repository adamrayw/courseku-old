<?php

$host = "localhost";
$username = "root";
$password = "";
$db_name = "courseku";

$db = mysqli_connect($host, $username, $password, $db_name);

if (!$db) {
    echo "Connect Failed";
}
