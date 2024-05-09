<?php
session_start();
require_once 'config.php';

if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EISHA ADMIN</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <style>
        /* Styling untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Styling untuk hover baris */
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
<body>

<div class="container"> 
  <div class="form-container">
    <div class="content">
      <h3>LIST PRODUCT</h3> 
      <p><a href="add_product.php">Tambah Product</a></p>
      <?php
require_once 'config.php';

$sql = "SELECT * FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Gambar</th><th>Nama Product</th><th>Deskripsi</th><th>Price</th><th>URL</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td><img src='".$row["image"]."' style='width:100px;'></td><td>".$row["judul"]."</td><td>".$row["deskripsi"]."</td><td>".$row["price"]."</td><td>".$row["url"]."</td><td><a href='edit_product.php?id=".$row["id"]."'> Edit</a><a href='delete_product.php?id=".$row["id"]."'> Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data.";
}
?>
    </div>
  </div>
</div>

</body>
</html>
