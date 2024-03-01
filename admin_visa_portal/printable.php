<?php
require_once('../pdf1/fpdf.php');
session_start();
require_once '../configarations/db_connection.php';
if (!isset($_SESSION['user_logged_in'])) {
    header('location: ../index.php');
    die();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $tasks = mysqli_fetch_assoc($result);
    // print_r($tasks);

} else {
    header('location: tasks.php');
    die();
}

$surname = $tasks['surname'];
$givenname = $tasks['givenname'];
$passportnumber = $tasks['passportnumber'];
$typeofvisa = $tasks['typeofvisa'];
$duration = $tasks['duration'];
$dateofissue = $tasks['dateofissue'];
$dateofexpiry = $tasks['dateofexpiry'];
$placeofissue = $tasks['placeofissue'];
$purposeofvisit = $tasks['purposeofvisit'];
$sex = $tasks['sex'];
$organisation = $tasks['organisation'];
$nationality = $tasks['nationality'];
$passportphoto = $tasks['passportphoto'];


// $im = readfile("passport_photos/$passportphoto");

// // $photo = readfile("../passport_photos/$passportphoto");

// // echo $photo;

$pdf = new FPDF('p', 'cm', 'a6');
$pdf->AddPage('', '', 0);
$pdf->SetFont('arial', '', 5);
 $pdf->SetLeftMargin(0);
$pdf->SetAutoPageBreak(0);
$pdf->SetTopMargin(0.8);

$pdf->cell(2.5, 0.1, '', 0, 0);
$pdf->cell(4, 0.05, '', 0, 0);
$pdf->cell(2, 0.05, '', 0, 1);

$pdf->SetFont('arial', 'b', 5);
$pdf->cell(2.5, 0.1, '', 0, 0);
$pdf->cell(4, 0.8, strtoupper($surname), 0, 0, '');
$pdf->cell(2, 0.8, strtoupper($givenname), 0, 1);

$pdf->SetFont('arial', '', 5);
// $pdf->cell(2.5, 3, 'hhhhjhj', 0, 0);
$pdf->image("passport_photos/$passportphoto",0.5,3,1.5,0);
$pdf->cell(2, 0.1, '.', 0, 0);
$pdf->cell(2, 0.1, '', 0, 0);
$pdf->cell(2, 0.1, '', 0, 1);

$pdf->SetFont('arial', 'b', 5);
$pdf->cell(2.5, 0.1, '', 0, 0);
$pdf->cell(2, 0.8, strtoupper($passportnumber), 0, 0);
$pdf->cell(2, 0.8, strtoupper($typeofvisa), 0, 0);
$pdf->cell(2, 0.8, strtoupper($duration), 0, 1);

$pdf->SetFont('arial', '', 5);
$pdf->cell(2.5, 0.1, '', 0, 0);
$pdf->cell(2, 0.1, '', 0, 0);
$pdf->cell(2, 0.1, '', 0, 0);
$pdf->cell(2, 0.1, '', 0, 1);

$pdf->SetFont('arial', 'b', 5);
$pdf->cell(2.5, 0.1, '', 0, 0);
$pdf->cell(2, 0.8, $dateofissue, 0, 0);
$pdf->cell(2, 0.8, $dateofexpiry, 0, 0);
$pdf->cell(2, 0.8, strtoupper($placeofissue), 0, 1);

$pdf->SetFont('arial', '', 5);
$pdf->cell(2.5, 0.1, '', 0, 0);
$pdf->cell(4, 0.1, '', 0, 0);
$pdf->cell(2, 0.1, '', 0, 1);

$pdf->SetFont('arial', 'b', 5);
$pdf->cell(2.5, 0.8, '', 0, 0);
$pdf->cell(4, 0.8, strtoupper($purposeofvisit), 0, 0);
$pdf->cell(4, 0.8, strtoupper($sex), 0, 1);

$pdf->SetFont('arial', '', 5);
$pdf->cell(2.5, 0.1, '', 0, 0);
$pdf->cell(4, 0.1, '', 0, 0);
$pdf->cell(2, 0.1, '', 0, 1);

$pdf->SetFont('arial', 'b', 5);
$pdf->cell(2.5, 0.8, '', 0, 0);
$pdf->cell(4, 0.8, strtoupper($organisation), 0, 0);
$pdf->cell(4, 0.8, strtoupper($nationality), 0, 1);

$pdf->Output();
