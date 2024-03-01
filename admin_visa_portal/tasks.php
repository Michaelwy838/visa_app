<?php
session_start();
require_once '../configarations/db_connection.php';
if (!isset($_SESSION['user_logged_in'])) {
  header('location: ../index.php');
  die();
}
$sql = "SELECT * FROM tasks";
$result = mysqli_query($conn, $sql);
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

// print_r($tasks);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/main.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css">
  <link href="../css/bootstrap-icons.min.css">
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <title>Available Tasks</title>
</head>

<body>
  <div>
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
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="container sucess text-center bg-success text-white py-3 h6 my-0">
        <?php echo $_SESSION['success'];
        unset($_SESSION['success']); ?>
      </div>
      <?php elseif(isset($_SESSION['error'])): ?>
        <div class="container text-center bg-danger text-white py-3 h6 my-0">
        <?php echo $_SESSION['error'];
        unset($_SESSION['error']); ?>
      </div>
    <?php endif; ?>
    <div class="container bg-light">
      <div class="row justify-content-around align-items-center">
        <div class="col-10 col-md-5 mx-5 mt-5">
          <a style="text-decoration: none; color: black" href="welcome.php">
            <h2 class="text-center"><span>VISA</span>Portal</h2>
          </a>
          <div class="lead text-center">Pending Visa Tasks</div>
          <?php if (count($tasks) == 0) : ?>
            <div class="h6 text-center my-3 text-bold">
              <?php echo 'No Tasks' ?>
            </div>
          <?php else : ?>
            <div class="h6 text-center my-3 text-bold">
              <?php echo count($tasks) . " - Task(s)" ?>
            </div>
          <?php endif; ?>
          <div class="accordion my-5" id="accordionExample">
            <?php for ($i = count($tasks) - 1; $i > -1; $i--) : ?>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                    <?php echo strtoupper($tasks[$i]['surname']) . ' - (' . strtoupper($tasks[$i]['passportnumber']) . ')'; ?>
                  </button>
                </h2>
                <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong class="h4 py-5">Preview for <?php echo $tasks[$i]['surname']; ?></strong>
                    <div class="text-start text-md-lead align-items-center">
                      1. Given Name - <span class="fw-b bg-white text-primary"><?php echo strtoupper($tasks[$i]['givenname']); ?></span></br>
                      2. Passport Number - <span class="text-primary fw-b bg-white"><?php echo strtoupper($tasks[$i]['passportnumber']); ?></span></br>
                      3. Type of Visa - <span class="text-primary fw-b bg-white"><?php echo strtoupper($tasks[$i]['typeofvisa']); ?></span></br>
                      4. Duration - <span class="text-primary fw-b bg-white"><?php echo strtoupper($tasks[$i]['duration']); ?></span></br>
                      5. Date Of Issue - <span class="text-primary fw-b bg-white"><?php echo strtoupper($tasks[$i]['dateofissue']); ?></span></br>
                      6. Date Of Expiry - <span class="text-primary fw-b bg-white"><?php echo strtoupper($tasks[$i]['dateofexpiry']); ?></span></br>
                      7. Place Of Issue - <span class="text-primary fw-b bg-white"><?php echo strtoupper($tasks[$i]['placeofissue']); ?></span></br>
                      8. Purpose of Visit - <span class="text-primary fw-b bg-white"><?php echo strtoupper($tasks[$i]['purposeofvisit']); ?></span></br>
                      9. Sex - <span class="text-primary md-h5 fw-b bg-white"><?php echo strtoupper($tasks[$i]['sex']); ?></span></br>
                      10. Organisation - <span class="text-primary md-h5 fw-b bg-white"><?php echo strtoupper($tasks[$i]['organisation']); ?></span></br>
                      11. Nationality - <span class="text-primary md-h5 fw-b bg-white"><?php echo strtoupper($tasks[$i]['nationality']); ?></span>
                    </div>
                      <form action="../configarations/delete.php" class="mt-3" method="POST">
                        <a class="btn bg-primary text-white" href="printable.php?id=<?php echo $tasks[$i]['id']; ?>">Print</a>
                        <a class="btn bg-secondary text-white" href="edit.php?id=<?php echo $tasks[$i]['id']; ?>">Edit</a>
                        <input type="hidden" name="id" value="<?php echo $tasks[$i]['id']; ?>">
                        <button class="btn bg-danger text-white" name="submit" type="submit" value="submit">Delete</button>
                      </form>
                  </div>
                </div>
              </div>
            <?php endfor; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>