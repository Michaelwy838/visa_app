<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('location: ../index.php');
    die();
}

$surname = $_SESSION['data']['surname'] ?? '';
$givenname = $_SESSION['data']['givenname'] ?? '';
$passportnumber = $_SESSION['data']['passportnumber'] ?? '';
$typeofvisa = $_SESSION['data']['typeofvisa'] ?? '';
$duration = $_SESSION['data']['duration'] ?? '';
$dateofissue = $_SESSION['data']['dateofissue'] ?? '';
$dateofexpiry = $_SESSION['data']['dateofexpiry'] ?? '';
$placeofissue = $_SESSION['data']['placeofissue'] ?? '';
$purposeofvisit = $_SESSION['data']['purposeofvisit'] ?? '';
$sex = $_SESSION['data']['sex'] ?? '';
$organisation = $_SESSION['data']['organisation'] ?? '';
$nationality = $_SESSION['data']['nationality'] ?? '';

unset($_SESSION['data']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/main.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="../css/bootstrap-icons.min.css">

    <title>Add Visa</title>
</head>

<body class="index">
    <nav class="head container py-3 bg-light">
        <div class="row align-content-center px-5">
            <div class="col-9 ">
                <a class="navbar-brand h1" href="#">Hello <?php echo $_SESSION['user_logged_in']; ?></a>
            </div>
            <div class="col-3 text-end ">
                <a class="navbar-brand lead text-danger h1" href="../configarations/logout.php">Log Out</a>
            </div>
        </div>
    </nav>
    <div class="container bg-light">
        <div class="row justify-content-around align-items-center py-5">
            <div class="col-10 col-md-5 mx-5">
                <a style="text-decoration: none; color: black" href="welcome.php">
                    <h2 class="text-center"><span>VISA</span>Portal</h2>
                </a>
                <div class="lead text-center">Add Details To Process Visa</div>
                <form action="../configarations/addvisalogic.php" class="my-5" method="POST" enctype="multipart/form-data">
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="text-start text-danger h6">
                            <?php echo $_SESSION['error'];
                            unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>
                    <label for="" class="form-label">Surname:</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input value="<?php echo $surname; ?>" type="text" name="surname" class="form-control text-primary" placeholder="ZEROM">
                    </div>
                    <label for="" class="form-label">Given Names:</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" value="<?php echo $givenname; ?>" name="givenname" class="form-control text-primary" placeholder="ASMEROM HAGOS">
                    </div>
                    <label for="" class="form-label">Passport Number:</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" value="<?php echo $passportnumber; ?>" name="passportnumber" class="form-control text-primary" placeholder="K0671165">
                    </div>
                    <label for="" class="form-label">Type of Visa:</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" value="<?php echo $typeofvisa; ?>" name="typeofvisa" class="form-control text-primary" placeholder="MULTIPLE">
                    </div>
                    <label for="" class="form-label">Duration:</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" value="<?php echo $duration; ?>" name="duration" class="form-control text-primary" placeholder="3 MONTHS">
                    </div>
                    <label for="" class="form-label">Date Of Issue:</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" value="<?php echo $dateofissue; ?>" name="dateofissue" class="form-control text-primary" placeholder="10/Nov/23 (Follow Date Format)">
                    </div>
                    <label for="" class="form-label">Date of Expiry:</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" value="<?php echo $dateofexpiry; ?>" name="dateofexpiry" class="form-control text-primary" placeholder="10/Feb/24 (Follow Date Format)">
                    </div>
                    <label for="" class="form-label">Place of Issue:</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" value="<?php echo $placeofissue; ?>" name="placeofissue" class="form-control text-primary" placeholder="BUSINESS UNION">
                    </div>
                    <label for="" class="form-label">Purpose of Visit:</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" value="<?php echo $purposeofvisit; ?>" name="purposeofvisit" class="form-control text-primary" placeholder="WORK">
                    </div>
                    <label for="" class="form-label">Sex:</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <select name="sex" id="" class="form-control text-primary">
                            <option value="male">MALE</option>
                            <option value="female">FEMALE</option>
                        </select>
                    </div>
                    <label for="" class="form-label">Organisation:</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input value="<?php echo $organisation; ?>" type="text" name="organisation" class="form-control text-primary" placeholder="PVT">
                    </div>
                    <label for="" class="form-label">Nationality:</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" value="<?php echo $nationality; ?>" name="nationality" class="form-control text-primary" placeholder="ERITREAN">
                    </div>
                    <label for="">Passport Photo</label><br>
                    <input type="file" name="thumbnail">
                    <input class="button mx-auto my-3" name="submit" type="submit" value="Process Visa">
                </form>
            </div>
        </div>
    </div>

</body>

</html>