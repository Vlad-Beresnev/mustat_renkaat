<!DOCTYPE html>
<html>
<head>
    <title>Tire Search</title>
    <link rel="stylesheet" href="./main.css"/>
</head>
<body>
    <header>
        <div class="logo-container>">
            <img src="images/logo_dark.png" alt="logo dark"/>
        </div>
        <ul>
            <li><a href="#">Meista</a></li>
            <li><a href="#">Yhteystiedot</a></li>
        </ul>
    </header>
    <div class="search-container">
        <h1>Tire Search</h1>
        <button type="button" id="filter-button">Filter</button>
        <input type="text" id="search" name="search" placeholder="Search.."/>
        <form action="./main.php" method="post">
            <div class="form-container">
                <div class="filter">
                    <label for="size">Size:</label><br>
                    <input type="text" id="size" name="size"><br>
                </div>
                <div class="filter">
                    <label for="brand">Brand:</label><br>
                    <input type="text" id="brand" name="brand"><br>
                </div>
                <div class="filter">
                    <label for="type">Type:</label><br>
                    <input type="text" id="type" name="type"><br>
                </div>
                <div class="filter">
                    <label for="min_price">Min Price:</label><br>
                    <input type="number" id="min_price" name="min_price" min="0"><br>
                </div>
                <div class="filter">
                    <label for="max_price">Max Price:</label><br>
                    <input type="number" id="max_price" name="max_price" min="0"><br>
                </div>  
            </div>
        <input id="submit-search" type="submit" value="Search">
        </form>
    </div>
</body>
</html>

<?php
include './database_connection.php';

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
if (!empty($size)) {
    $tiresBySize = getTiresBySize($size);
    echo '<pre>';
    print_r($tiresBySize);
    echo '</pre>';
}

if (!empty($brand)) {
    $tiresByBrand = getTiresByBrand($brand);
    echo '<pre>';
    print_r($tiresByBrand);
    echo '</pre>';
}

if (!empty($type)) {
    $tiresByType = getTiresByType($type);
    echo '<pre>';
    print_r($tiresByType);
    echo '</pre>';
}

if (!empty($min_price)) {
    $tiresByPrice = getTiresByPrice($min_price, $max_price);
    echo '<pre>';
    print_r($tiresByPrice);
    echo '</pre>';
}

if (!empty($max_price)) {
    $tiresByPrice = getTiresByPrice($min_price, $max_price);
    echo '<pre>';
    print_r($tiresByPrice);
    echo '</pre>';
}