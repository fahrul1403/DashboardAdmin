<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sakai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validation
    // Add your own validation code here, for example:
    // if (empty($email) || empty($password)) { ... }

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM user WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);  // assuming password is stored as plain text, for hashed passwords use password_hash

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Retrieve user ID and set session variables
        $row = $result->fetch_assoc();
        $id = $row['id'];
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $id;

        header('Location: ../index.php');
        exit();
    } else {
        echo "<script>
            alert('Email atau Password salah');
            window.location.href = '../login.php';
            </script>";
    }

    $stmt->close();
}

// If session variable is not set, redirect to login page
// if (!isset($_SESSION['email'])) {
//     header('Location: login.php');
//     exit();
// }

$conn->close();
?>