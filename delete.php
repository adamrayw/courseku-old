<?php
include "header.php";
// Fitur Delete
$id = $_GET['course'];

mysqli_query($db, "DELETE FROM allcourse WHERE id='$id'");
header("Location: admin-dashboard.php");


// ----------