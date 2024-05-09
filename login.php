<?php
session_start();
require_once 'config.php';

if(isset($_SESSION['email'])){
    header("Location: admin_page.php");
    exit;
}

// Cek jika form login dikirim
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['email'] = $email;
        header("Location: admin_page.php");
        exit;
    } else {
        $error = "Email atau Password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Login Now</h3>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="Login" class="form-btn">
   </form>

</div>

</body>
</html>