<?php
session_start();
require_once 'config.php';

if(!isset($_SESSION['email'])){
  header("Location: login.php");
  exit;
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM product WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $judul = $row["judul"];
        $deskripsi = $row["deskripsi"];
        $price = $row["price"];
        $url = $row["url"];
    } else {
        echo "Data tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $judul = $_POST["judul"];
    $deskripsi = $_POST["deskripsi"];
    $price = $_POST["price"];
    $url = $_POST["url"];

    $target_dir = "gambar/";
    $target_file = $target_dir . uniqid() . '_' . basename($_FILES["gambar"]["name"]); 
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["gambar"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["gambar"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    if ($uploadOk == 1) {
        $sql = "UPDATE product SET judul='$judul', deskripsi='$deskripsi', price='$price', url='$url', image='$target_file' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil diubah.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
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
<body>

<div class="container"> 
  <div class="form-container">
    <div class="content">
      <h3>EDIT PRODUCT</h3> 
      <form method="post" action="" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div>
            <label for="judul">Nama Product:</label>
            <input type="text" id="judul" name="judul" value="<?php echo $judul; ?>">
        </div>
        <div>
            <label for="deskripsi">Deskripsi:</label>
            <input type="text" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi; ?>">
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?php echo $price; ?>">
        </div>
        <div>
            <label for="url">URL:</label>
            <input type="text" id="url" name="url" value="<?php echo $url; ?>">
        </div>
        <div>
            <label for="gambar">Upload Gambar:</label>
            <input type="file" id="gambar" name="gambar">
        </div>
        <div>
            <input type="submit" value="Edit Data" name="submit">
        </div>
    </form>

    </div>
  </div>
</div>

</body>
</html>
