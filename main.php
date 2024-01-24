<?php
include 'database_connection.php';

function getTiresBySize($size) {
    $conn = connect();
    $sql = "SELECT * FROM tires WHERE size = ?";
    if($stmt =mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $size);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $tires = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        return $tires;
    }
    mysqli_close($conn);
    return null;
}
?>