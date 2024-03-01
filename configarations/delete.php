<?php
require_once('db_connection.php');
session_start();

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "DELETE FROM tasks WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = '(1) Task Has Been Deleted';
        header('location: ../admin_visa_portal/tasks.php');
        die();
    } else {
        $_SESSION['error'] = 'Something went wrong, please try again';
        header('location: ../admin_visa_portal/tasks.php');
        die();
    }
} else {
    header('location: ../admin_visa_portal/tasks.php');
    die();
}
