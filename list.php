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
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
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
    <a type="button" class="btn btn-primary" href="insert.php">add product</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">PRICE</th>
            <th scope="col">THUMBNAIL</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $data){?>
        <tr>
            <th scope="row"><?=$data['id']  ?></th>
            <td><?=$data['name']  ?></td>
            <td><?=number_format($data['price']) ?>  đ</td>
            <td><img src="<?=$data['thumbnail']  ?>" width="100px" height="100px" alt=""></td>
        </tr>
        <?php }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
