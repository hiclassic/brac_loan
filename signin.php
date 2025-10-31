<?php
include_once "classes/Employee.php";
include_once "libs/Session.php";
Session::checkLogin();
$emp = new Employee();

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
  $inserted = $emp->employeeLogin($_POST);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Hares Islam">
    <link rel="icon" href="images/favicon.ico">
    <title>Sign in</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
      body {
        background-color: #f8f9fa;
      }
      .form-signin {
        max-width: 420px;
        padding: 15px;
        margin: auto;
      }
      .card-header {
        font-size: 1.1rem;
      }
    </style>
  </head>

  <body>
    <div class="container py-5">
      <!-- Login Form -->
      <form class="form-signin bg-white p-4 rounded shadow-sm" action="" method="POST">
        <div class="text-center mb-4">
          <img src="images/LoanHub_logo.png" alt="LoanHub" width="220" height="72" class="mb-3">
          <?php if (isset($inserted)) echo $inserted; ?>
        </div>

        <div class="form-floating mb-3">
          <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
          <label for="inputEmail">Email address</label>
        </div>

        <div class="form-floating mb-3">
          <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
          <label for="inputPassword">Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Sign in</button>

        <p class="mt-3 text-center">
          <a href="signup.php" class="fw-bold">Register</a> a new account.
        </p>
      </form>

      <!-- Officer Info Cards -->
      <div class="row text-center mt-5">
        <?php
          $officers = [
            ['title' => 'Branch Officer', 'email' => 'branch@gmail.com', 'pass' => '123'],
            ['title' => 'Head Officer', 'email' => 'head@gmail.com', 'pass' => '123'],
            ['title' => 'Verifier Officer', 'email' => 'verifier@gmail.com', 'pass' => '123']
          ];

          foreach ($officers as $o): ?>
            <div class="col-12 col-md-4 mb-3">
              <div class="card shadow-sm h-100">
                <div class="card-header bg-primary text-white fw-bold">
                  <?= htmlspecialchars($o['title']) ?>
                </div>
                <div class="card-body">
                  <p class="mb-1"><strong>Email:</strong> <?= htmlspecialchars($o['email']) ?></p>
                  <p class="mb-0"><strong>Password:</strong> <?= htmlspecialchars($o['pass']) ?></p>
                </div>
              </div>
            </div>
        <?php endforeach; ?>
      </div>

      <div class="text-center mt-4">
        <p class="text-muted mb-0">
          Developed by &copy; 
          <a href="https://github.com/hiclassic" target="_blank">Hares Islam @ Github</a> - 2025
        </p>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
