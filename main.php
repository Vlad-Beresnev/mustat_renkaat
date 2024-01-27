

<?php
include './database_connection.php';

function getTires() {
    $conn = connect();
    $sql = "SELECT * FROM tires";
    if($stmt = mysqli_prepare($conn, $sql)) {
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
if (empty($size) && empty($brand) && empty($type) && empty($min_price) && empty($max_price)) {
    $tires = getTires();
    ob_start();
    foreach ($tires as $tire) {
        echo '<div class="card">';
        echo '<h2>' . htmlspecialchars($tire['brand']) . '</h2>';
        echo '<p>Size: ' . htmlspecialchars($tire['size']) . '</p>';
        echo '<p>Type: ' . htmlspecialchars($tire['type']) . '</p>';
        echo '<p>Price: ' . htmlspecialchars($tire['price']) . '</p>';
        echo '</div>';
    }
    $tireCards = ob_get_clean();
}


if (!empty($size)) {
    $tires = getTiresBySize($size);
    ob_start();
    foreach ($tires as $tire) {
        echo '<div class="card">';
        echo '<h2>' . htmlspecialchars($tire['brand']) . '</h2>';
        echo '<p>Size: ' . htmlspecialchars($tire['size']) . '</p>';
        echo '<p>Type: ' . htmlspecialchars($tire['type']) . '</p>';
        echo '<p>Price: ' . htmlspecialchars($tire['price']) . '</p>';
        echo '</div>';
    }
    $tireCards = ob_get_clean();
}

if (!empty($brand)) {
    $tires = getTiresByBrand($brand);
    ob_start();
    foreach ($tires as $tire) {
        echo '<div class="card">';
        echo '<h2>' . htmlspecialchars($tire['brand']) . '</h2>';
        echo '<p>Size: ' . htmlspecialchars($tire['size']) . '</p>';
        echo '<p>Type: ' . htmlspecialchars($tire['type']) . '</p>';
        echo '<p>Price: ' . htmlspecialchars($tire['price']) . '</p>';
        echo '</div>';
    }
    $tireCards = ob_get_clean();
}

if (!empty($type)) {
    $tires = getTiresByType($type);
    ob_start();
    foreach ($tires as $tire) {
        echo '<div class="card">';
        echo '<h2>' . htmlspecialchars($tire['brand']) . '</h2>';
        echo '<p>Size: ' . htmlspecialchars($tire['size']) . '</p>';
        echo '<p>Type: ' . htmlspecialchars($tire['type']) . '</p>';
        echo '<p>Price: ' . htmlspecialchars($tire['price']) . '</p>';
        echo '</div>';
    }
    $tireCards = ob_get_clean();
}

if (!empty($min_price)) {
    $tires = getTiresByPrice($min_price, $max_price);
    ob_start();
    foreach ($tires as $tire) {
        echo '<div class="card">';
        echo '<h2>' . htmlspecialchars($tire['brand']) . '</h2>';
        echo '<p>Size: ' . htmlspecialchars($tire['size']) . '</p>';
        echo '<p>Type: ' . htmlspecialchars($tire['type']) . '</p>';
        echo '<p>Price: ' . htmlspecialchars($tire['price']) . '</p>';
        echo '</div>';
    }
    $tireCards = ob_get_clean();
}

if (!empty($max_price)) {
    $tires = getTiresByPrice($min_price, $max_price);
    ob_start();
    foreach ($tires as $tire) {
        echo '<div class="card">';
        echo '<h2>' . htmlspecialchars($tire['brand']) . '</h2>';
        echo '<p>Size: ' . htmlspecialchars($tire['size']) . '</p>';
        echo '<p>Type: ' . htmlspecialchars($tire['type']) . '</p>';
        echo '<p>Price: ' . htmlspecialchars($tire['price']) . '</p>';
        echo '</div>';
    }
    $tireCards = ob_get_clean();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tire Search</title>
    <link rel="stylesheet" href="./main.css"/>
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="images/logo_dark.png" alt="logo dark"/>
        </div>
        <div class="links-container">
            <ul>
                <li><a href="#">Meista</a></li>
                <li><a href="#">Yhteistiedot</a></li>
            </ul>
        </div>
    </header>
    <div class="search-container">
        <h3>Tire Search</h3>
        <input type="text" id="search" name="search" placeholder="Search.."/>
        <button id="filter-button" type="button">Filter</button>
        <div id="filter-container">
            <form action="./main.php" method="post">
                <div class="filter">
                    <input type="text" id="size" name="size" placeholder="Size"><br>
                </div>
                <div class="filter">
                    <input type="text" id="brand" name="brand" placeholder="Brand"><br>
                </div>
                <div class="filter">
                    <input type="text" id="type" name="type" placeholder="Type"><br>
                </div>
                <div class="filter">
                    <input type="number" id="min_price" name="min_price" min="0" placeholder="Min Price"><br>
                </div>
                <div class="filter">
                    <input type="number" id="max_price" name="max_price" min="0" placeholder="Max Price"><br>
                </div>  
                <input class="filter" id="submit-search" type="submit" value="Search">
            </form>
        </div>
    </div>
    <div class="tires-container">
       <?php echo $tireCards; ?>
    </div>
    <script src="./main.js"></script>
</body>
</html>