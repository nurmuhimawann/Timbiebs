<?php

// $db_host = "localhost";
// $db_user = "root";
// $db_pass = "";
// $db_name = "timbiebs";

const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASS = "";
const DB_NAME = "timbiebs";

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
    die("Connection Error: " . mysqli_connect_error());
}
