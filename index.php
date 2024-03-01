<?php
session_start();

if (isset($_SESSION['user_logged_in'])) {
    header('location: admin_visa_portal/welcome.php');
    die();
}

$username = $_SESSION['data']['username'] ?? '';
$password = $_SESSION['data']['password'] ?? '';

unset($_SESSION['data']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <title>Log In</title>
</head>
<body>
    <div class="index container bg-light">
        <div class="index row justify-content-around align-items-center">
            <div class="col-10 col-md-5 mx-5">
                <h2 class="text-center"><span>VISA</span>Portal</h2>
                <div class="lead text-center">Log In To Get Access</div>
                <form action="configarations/login_logic.php" class="my-5" method="POST">
                <?php if(isset($_SESSION['error'])) :?>
                    <div class="text-start text-danger h6">
                        <?php echo $_SESSION['error'];
                        unset($_SESSION['error']);?>
                    </div>
                <?php endif; ?>
                <label for="" class="form-label">UserName:</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" name="username" class="form-control text-primary" placeholder="visa" value="<?php echo $username; ?>">
                    </div>
                    <label for="" class="form-label">Password:</label>
                    <div class="input-group">
                        <span class="input-group-text ">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input type="password" name="password" placeholder="Password" class="form-control text-primary">
                    </div>
                    <input class="button mx-auto my-3" type="submit" name="submit" value="Log In">
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>