
<?php
require_once('db_connection.php');
session_start();
if (isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sql1 = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $sql1);
    $userexists = mysqli_fetch_assoc($result);
    $db_password = $userexists['password'];
    // print_r ($userexists);

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "All Fields Are Required";
    } elseif (!array_filter($userexists)) {
        $_SESSION['error'] = "User not Found, Try Again!";
    } elseif (!password_verify($password , $db_password)) {
        $_SESSION['error'] = "Incorrect Password";
    }

    if (isset($_SESSION['error'])) {
        $_SESSION['data'] = $_POST;
        header('location: ../index.php');
        die();
    } else {
        $_SESSION['user_logged_in'] = $userexists['username'];
        header('location: ../admin_visa_portal/welcome.php');
        die();
    }
} else {
    header('location: ../login.php');
    die();
}
?>