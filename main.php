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
        mysqli_close($conn);
        return $tires;
    }
    mysqli_close($conn);
    return null;
}

function getTiresByBrand($brand) {
    $conn = connect();
    $sql = "SELECT * FROM tires WHERE brand = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $brand);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $tires = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $tires;
    }
    mysqli_close($conn);
    return null;
}

function getTiresByType($type) {
    $conn = connect();
    $sql = "SELECT * FROM tires WHERE type = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $type);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $tires = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $tires;
    }
    mysqli_close($conn);
    return null;
}

function getTiresByPrice($min_price, $max_price) {
    $conn = connect();
    $sql = "SELECT * FROM tires WHERE price >= ? AND price <= ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "dd", $min_price, $max_price);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $tires = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $tires;
    }
    mysqli_close($conn);
    return null;

}

$size = $_POST['size'];
$brand = $_POST['brand'];
$type = $_POST['type'];
$min_price = $_POST['min_price'];
$max_price = $_POST['max_price'];

//Call the function with a specific size
$tiresBySize = getTiresBySize($size);
$TiresByBrand = getTiresByBrand($brand);
$TiresByType = getTiresByType($type);
$TiresByPrice = getTiresByPrice($min_price, $max_price);
// Print out the results
echo '<pre>';
print_r($tiresBySize);
print_r($TiresByBrand);
print_r($TiresByType);
print_r($TiresByPrice);
echo '</pre>';

?>