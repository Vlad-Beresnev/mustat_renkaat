

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

function getTiresBySearch($searchTerm) {
    $conn = connect();
    $searchTerm = $conn->real_escape_string($searchTerm);
    $searchTerm = '%' . $searchTerm . '%';
    $sql = "SELECT * FROM tires WHERE brand LIKE ? OR size LIKE ? OR type LIKE ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss", $searchTerm, $searchTerm, $searchTerm);
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


$size = isset($_POST['size']) ? $_POST['size'] : null;
$brand = isset($_POST['brand']) ? $_POST['brand'] : null;
$type = isset($_POST['type']) ? $_POST['type'] : null;
$min_price = isset($_POST['min_price']) ? $_POST['min_price'] : null;
$max_price = isset($_POST['max_price']) ? $_POST['max_price'] : null;
$image = isset($POST['image']) ? $POST['image'] : null;
$searchTerm = isset($_POST['search']) ? $_POST['search'] : null;

//Call the function with a specific size
if (empty($size) && empty($brand) && empty($type) && empty($min_price) && empty($max_price)) {
    $tires = getTires();
    ob_start();
    foreach ($tires as $tire) {
        echo '<div class="card">';
        echo '<div class="card-info">';
        echo '<h2>' . htmlspecialchars($tire['brand']) . '</h2>';
        echo '<p>Size: ' . htmlspecialchars($tire['size']) . '</p>';
        echo '<p>Type: ' . htmlspecialchars($tire['type']) . '</p>';
        echo '<p>Price: ' . htmlspecialchars($tire['price']) . '</p>';
        echo '</div>';
        echo '<div class="card-image">';
        echo '<img src="' . htmlspecialchars($tire['image']) . '" alt="Tire Image">';
        echo '</div>';
        echo '</div>';
    }
    $tireCards = ob_get_clean();
}


if (!empty($size)) {
    $tires = getTiresBySize($size);
    ob_start();
    foreach ($tires as $tire) {
        echo '<div class="card">';
        echo '<div class="card-info">';
        echo '<h2>' . htmlspecialchars($tire['brand']) . '</h2>';
        echo '<p>Size: ' . htmlspecialchars($tire['size']) . '</p>';
        echo '<p>Type: ' . htmlspecialchars($tire['type']) . '</p>';
        echo '<p>Price: ' . htmlspecialchars($tire['price']) . '</p>';
        echo '</div>';
        echo '<div class="card-image">';
        echo '<img src="' . htmlspecialchars($tire['image']) . '" alt="Tire Image">';
        echo '</div>';
        echo '</div>';
    }
    $tireCards = ob_get_clean();
}

if (!empty($brand)) {
    $tires = getTiresByBrand($brand);
    ob_start();
    foreach ($tires as $tire) {
        echo '<div class="card">';
        echo '<div class="card-info">';
        echo '<h2>' . htmlspecialchars($tire['brand']) . '</h2>';
        echo '<p>Size: ' . htmlspecialchars($tire['size']) . '</p>';
        echo '<p>Type: ' . htmlspecialchars($tire['type']) . '</p>';
        echo '<p>Price: ' . htmlspecialchars($tire['price']) . '</p>';
        echo '</div>';
        echo '<div class="card-image">';
        echo '<img src="' . htmlspecialchars($tire['image']) . '" alt="Tire Image">';
        echo '</div>';
        echo '</div>';
    }
    $tireCards = ob_get_clean();
}

if (!empty($type)) {
    $tires = getTiresByType($type);
    ob_start();
    foreach ($tires as $tire) {
        echo '<div class="card">';
        echo '<div class="card-info">';
        echo '<h2>' . htmlspecialchars($tire['brand']) . '</h2>';
        echo '<p>Size: ' . htmlspecialchars($tire['size']) . '</p>';
        echo '<p>Type: ' . htmlspecialchars($tire['type']) . '</p>';
        echo '<p>Price: ' . htmlspecialchars($tire['price']) . '</p>';
        echo '</div>';
        echo '<div class="card-image">';
        echo '<img src="' . htmlspecialchars($tire['image']) . '" alt="Tire Image">';
        echo '</div>';
        echo '</div>';
    }
    $tireCards = ob_get_clean();
}

if (!empty($min_price)) {
    $tires = getTiresByPrice($min_price, $max_price);
    ob_start();
    foreach ($tires as $tire) {
        echo '<div class="card">';
        echo '<div class="card-info">';
        echo '<h2>' . htmlspecialchars($tire['brand']) . '</h2>';
        echo '<p>Size: ' . htmlspecialchars($tire['size']) . '</p>';
        echo '<p>Type: ' . htmlspecialchars($tire['type']) . '</p>';
        echo '<p>Price: ' . htmlspecialchars($tire['price']) . '</p>';
        echo '</div>';
        echo '<div class="card-image">';
        echo '<img src="' . htmlspecialchars($tire['image']) . '" alt="Tire Image">';
        echo '</div>';
        echo '</div>';
    }
    $tireCards = ob_get_clean();
}

if (!empty($max_price)) {
    $tires = getTiresByPrice($min_price, $max_price);
    ob_start();
    foreach ($tires as $tire) {
        echo '<div class="card">';
        echo '<div class="card-info">';
        echo '<h2>' . htmlspecialchars($tire['brand']) . '</h2>';
        echo '<p>Size: ' . htmlspecialchars($tire['size']) . '</p>';
        echo '<p>Type: ' . htmlspecialchars($tire['type']) . '</p>';
        echo '<p>Price: ' . htmlspecialchars($tire['price']) . '</p>';
        echo '</div>';
        echo '<div class="card-image">';
        echo '<img src="' . htmlspecialchars($tire['image']) . '" alt="Tire Image">';
        echo '</div>';
        echo '</div>';
    }
    $tireCards = ob_get_clean();
}

if (!empty($searchTerm)) {
    $tires = getTiresBySearch($searchTerm);
    ob_start();
    foreach ($tires as $tire) {
        echo '<div class="card">';
        echo '<div class="card-info">';
        echo '<h2>' . htmlspecialchars($tire['brand']) . '</h2>';
        echo '<p>Size: ' . htmlspecialchars($tire['size']) . '</p>';
        echo '<p>Type: ' . htmlspecialchars($tire['type']) . '</p>';
        echo '<p>Price: ' . htmlspecialchars($tire['price']) . '</p>';
        echo '</div>';
        echo '<div class="card-image">';
        echo '<img src="' . htmlspecialchars($tire['image']) . '" alt="Tire Image">';
        echo '</div>';
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
        <form class="search-form" action="./main.php" method="post">
            <input type="text" id="search" name="search" placeholder="Search.."/>
            <input  id="submit-search" class="submit-search" type="submit" value="Search">
        </form>
        <button id="filter-button" type="button">Filter</button>
        <div id="filter-container">
            <form class="filter-form" action="./main.php" method="post">
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
                <input id="submit-filter" class="submit-search" type="submit" value="Search">
            </form>
        </div>
    </div>
    <div class="tires-container">
       <?php echo $tireCards; ?>
    </div>
    <footer class="footer">
        <div class="footer-info">
            <h3>
                LOGO
            </h3>
            <div class="info-links">    
                <p>Osoite</p>
                <p>Puhelinnumero</p>
                <p>Sähköposti</p>
            </div>
        </div>
        <div class="footer-contact">
            <h3>Ota yhteyttä</h3>
            <form class="contact-form">
                <input type="text" placeholder="etu ja sukunimi">
                <input type="tel" placeholder="puhelinnumero">
                <input type="email" placeholder="sähköposti">
                <textarea placeholder="viesti"></textarea>
                <button type="submit">Lähetä</button>
            </form>
        </div>
    </footer>
    <div class="footer-bottom">
        <p>Taitaja © 2022</p>
    </div>
    <script src="./main.js"></script>
</body>
</html>