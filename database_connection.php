<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'taitaja2021');
define('DB_PASSWORD', "rF@HBQY@E7Dpyy[");
define('DB_NAME', 'mustat_renkaat_db');

function connect() {
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    return $conn;
}
?>