<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Aplikasi Email Terenkripsi (AET)</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/encryption.png" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
</head>

<body>
  <!-- Start your project here-->

  <!-- Pills navs -->
  <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
        aria-controls="pills-login" aria-selected="true">Login</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
        aria-controls="pills-register" aria-selected="false">Register</a>
    </li>
  </ul>
  <!-- Pills navs -->

  <!-- Pills content -->
  <div class="tab-content ">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
      <form method="POST" action="periksa.php">
        <div class="text-center mb-3">
          <img src="img/stmik logo.png" class="rounded" height="250">
          <br>
          <h3>Aplikasi Email Terenkripsi (AET)</h3>
          <span class="text-danger"><?php if (isset($_GET['msg']))
            echo $_GET['msg']; ?></span>
          <br>
          <br>
        </div>
        <div class="container">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" name="username" class="form-control" />
            <label class="form-label" for="username">Username</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" name="Password" class="form-control" />
            <label class="form-label" for="Password">Password</label>
          </div>

          <!-- 2 column grid layout -->
          <div class="row mb-4">
            <div class="col-md-6 d-flex justify-content-center">
            </div>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
        </div>
      </form>
    </div>
    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">

      <!-- register -->
      <form method="POST" action="register.php">
        <div class="text-center mb-3">
          <img src="img/stmik logo.png" class="rounded" height="250">
          <br>
          <h3>Aplikasi Email Enkripsi (AEE)</h3>
          <br>
          <br>
        </div>

        <!-- Username input -->
        <div class="container">
        <div class="form-outline mb-4">
          <input type="text" name="username" class="form-control" />
          <label class="form-label" for="username">Username</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" name="Password" class="form-control" />
          <label class="form-label" for="Password">Password</label>
        </div>

        <!-- Repeat Password input -->
        <div class="form-outline mb-4">
          <input type="password" name="RepeatPassword" class="form-control" />
          <label class="form-label" for="RepeatPassword">Repeat password</label>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
        </div>
      </form>
    </div>
  </div>
  <!-- Pills content -->
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>