<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Include the necessary functions file
    include("./backend/function.php");

    // Assuming you have a function to delete data from the database
    $deleteResult = deleteData($id);

    if ($deleteResult) {
        // Set delete success session variable for displaying a message on the index page
        $_SESSION['delete_success'] = true;
    } else {
        // Handle deletion failure
        echo "Error: Data not deleted from the database.";
    }
}

// Redirect back to the index page
header('Location: index.php');
exit();
?>