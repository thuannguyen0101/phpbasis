<?php
$hostname = 'localhost:3306';
$username = 'root';
$password = '';
$dbname = "demo_php";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
    die('Không thể kết nối: ' . mysqli_error($conn));
    exit();
}

//$sql = "CREATE TABLE products (
//    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//    name  VARCHAR(30) NOT NULL,
//    price VARCHAR(30) NOT NULL,
//    thumbnail VARCHAR(250),
//    created_at TIMESTAMP
//)";
$name = "";
$price = "";
$thumbnail = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["name"])) {
        $name = $_POST['name'];
    }
    if (isset($_POST["price"])) {
        $price = $_POST['price'];
    }
    if (isset($_POST["thumbnail"])) {
        $thumbnail = $_POST['thumbnail'];
    }

    $sql = "INSERT INTO products (name , price, thumbnail)
    VALUES ('$name', '$price', '$thumbnail')";

    if ($conn->query($sql) === TRUE) {
        echo "Thêm dữ liệu thành công";
    } else {
        echo "error" . $conn->error;
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <a type="button" class="btn btn-primary" href="list.php">list product</a>
    <h2>Form test: product</h2>
    <form action="/insert.php" method="post">
        <div class="form-group">
            <label for="usr">Name:</label>
            <input type="text" class="form-control" id="usr" name="name">
        </div>
        <div class="form-group">
            <label for="pwd">Price:</label>
            <input type="number" class="form-control" id="pwd" name="price">
        </div>
        <div class="form-group">
            <label for="pwd">Thumbnail:</label>
            <input type="text" class="form-control" id="pwd" name="thumbnail">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
