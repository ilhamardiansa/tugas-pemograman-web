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
<body>

<div class="container"> <!-- Tambahkan kelas "container" di sini -->
  <div class="form-container"> <!-- Perhatikan perubahan kelas "container" ke "form-container" -->
    <div class="content">
      <h3>Hi, <span>admin</span></h3> <!-- Tutup tag h3 -->
      <h1>Welcome <span></span></h1>
      <p>this is an admin page</p>
      <a href="product.php" class="btn">Product</a> 
    </div>
  </div>
</div>

</body>
</html>
