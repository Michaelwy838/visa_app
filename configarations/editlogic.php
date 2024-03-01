
<?php
require_once('db_connection.php');
session_start();

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $surname = filter_var($_POST['surname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $givenname = filter_var($_POST['givenname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $passportnumber = filter_var($_POST['passportnumber'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $typeofvisa = filter_var($_POST['typeofvisa'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $duration = filter_var($_POST['duration'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $dateofissue = filter_var($_POST['dateofissue'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $dateofexpiry = filter_var($_POST['dateofexpiry'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $placeofissue = filter_var($_POST['placeofissue'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $purposeofvisit = filter_var($_POST['purposeofvisit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sex = filter_var($_POST['sex'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $organisation = filter_var($_POST['organisation'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nationality = filter_var($_POST['nationality'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $passportphoto = $_FILES['thumbnail'];

    if (empty($surname) || empty($givenname) || empty($passportnumber) || empty($typeofvisa) || empty($duration) || empty($dateofissue) || empty($dateofexpiry) || empty($placeofissue) || empty($purposeofvisit) || empty($sex) || empty($organisation) || empty($nationality)) {
        $_SESSION['error'] = "All Fields Are Required";
    } elseif (strlen($surname) < 3) {
        $_SESSION['error'] = "Invalid name";
    } elseif (strlen($givenname) < 3) {
        $_SESSION['error'] = "Invalid username";
    }

    if (isset($_SESSION['error'])) {
        $_SESSION['data'] = $_POST;
        header('location: ../admin_visa_portal/edit.php');
        die();
    } else {
        $time = time();
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../passport_photos/' . $thumbnail_name;

        $allowed_files = ['png', 'jpg', 'jpeg', 'pdf'];
        $extention = explode('.', $thumbnail_name);
        $extention = end($extention);
        if (in_array($extention, $allowed_files)) {
            if ($thumbnail['size'] < 5000000) {
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            } else {
                $_SESSION['error'] = "file is too big";
            }
        } else {
            $_SESSION['error'] = 'file format incorrect';
        }

        $passportphoto = $thumbnail_name;
        $sql = "UPDATE tasks SET surname='$surname', givenname='$givenname', passportnumber='$passportnumber', typeofvisa='$typeofvisa', duration='$duration', dateofissue='$dateofissue', dateofexpiry='$dateofexpiry', placeofissue='$placeofissue', purposeofvisit='$purposeofvisit', sex='$sex', organisation='$organisation', nationality='$nationality' passportphoto='$passportphoto' WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = 'Task Sucessfully Changed';
            header('location: ../admin_visa_portal/tasks.php');
            die();
        } else {
            $_SESSION['error'] = 'something went wrong, please try again';
            header('location: ../admin_visa_portal/edit.php');
            die();
        }
    }
} else {
    header('location: ../admin_visa_portal/add_visa.php');
    die();
}
?>