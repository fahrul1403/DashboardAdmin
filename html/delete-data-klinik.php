<?php
session_start();
include("./backend/function.php");

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform deletion operation
    $deleteResult = deleteDataKlinik($id);

    if ($deleteResult) {
        // Set delete success session variable
        $_SESSION['delete_success'] = true;
    } else {
        // Set delete failure session variable if needed
        $_SESSION['delete_success'] = false;
    }

    // Redirect back to the page with the data table
    header('Location: data-klinik.php');
    exit();
} else {
    // Redirect to the data table page if ID is not set
    header('Location: data-klinik.php');
    exit();
}
?>