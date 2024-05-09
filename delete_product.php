<?php
session_start();
require_once 'config.php';

if(!isset($_SESSION['email'])){
  header("Location: login.php");
  exit;
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM product WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus.";
        header("Location: product.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("Location: product.php");
    }
} else {
    echo "ID tidak diberikan.";
    header("Location: product.php");
}
?>