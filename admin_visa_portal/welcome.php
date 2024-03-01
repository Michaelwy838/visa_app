<?php
    session_start();
    if (!isset($_SESSION['user_logged_in'])) {
        header('location: ../index.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/main.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Welcome | Visa Portal</title>
</head>

<body>
    <div class="index">
        <nav class="head container py-3 bg-light">
            <div class="row align-content-center px-5">
                <div class="col-9 ">
                    <a class="navbar-brand h1" href="#">Hello <?php echo $_SESSION['user_logged_in'] ;?></a>
                </div>
                <div class="col-3 text-end ">
                    <a class="navbar-brand lead text-danger h1" href="../configarations/logout.php">Log Out</a>
                </div>
            </div>
        </nav>
        <div class="container bg-light">
            <div class="row index justify-content-around align-items-center">
                <div class="col-10 col-md-5 mx-5">
                <a style="text-decoration: none; color: black" href="welcome.php"><h2 class="text-center"><span>VISA</span>Portal</h2></a>
                    <div class="display-6 text-center">Welcome To VisaPortal Application !!</div>
                    <div class="row justify-content-center align-items-center">
                        <div class="col text-center">
                            <a class="btn btn-success my-3" href="add_visa.php">Add Visa Task</a>
                            <a class="btn btn-primary" href="tasks.php">Visa Tasks</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>