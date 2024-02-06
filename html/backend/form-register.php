<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sakai";

$conn = new mysqli($servername, $username, $password, $dbname);


if (isset($_POST['register'])) {
    $username = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validation
    // Add your own validation code here, for example:
    // if (empty($email) || empty($username) || empty($password)) { ... }

    // Check if the user already exists in the database
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // User already exists, show error message
        echo "<script>alert('Email sudah terdaftar. Silahkan gunakan email yang lain.');window.location.href = '../register.php';</script>";
    } else {
        // Store data in the database
        $sql = "INSERT INTO user (nama, email, password) VALUES ('$username','$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            // User registration successful, show success message and redirect to index.html
            echo "<script>
                  alert('Selamat, Pendaftaran berhasil!');
                  window.location.href = '../index.php';
                  </script>";
            exit();
        } else {
            // Show error message and redirect to register.php
            echo "<script>
                  alert('Upps! Pendaftaran gagal. Silahkan coba kembali');
                  window.location.href = '../register.php';
                  </script>";
        }
    }
}
?>