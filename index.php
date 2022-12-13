<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
    .form-login {
      max-width: 500px;
      margin: 150px auto;
    }
  </style>
</head>

<body>
  <form class="form-login" method="POST" action="index.php">
    <h3 style="color: BLUE;">LOGIN</h3>
    <!-- Email input -->
    <div class="form-outline mb-4">
      <input type="text" id="form2Example1" name="username" class="form-control username" required />
      <label class="form-label" for="form2Example1">Username</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
      <input type="password" id="form2Example2" name="pass" class="form-control pass" required />
      <label class="form-label" for="form2Example2">Password</label>
    </div>

    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4">
      <div class="col d-flex justify-content-center">
        <!-- Checkbox -->
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
          <label class="form-check-label" for="form2Example31"> Remember me </label>
        </div>
      </div>

      <div class="col">
        <!-- Simple link -->
        <a href="#!">Forgot password?</a>
      </div>
    </div>

    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4 submit">Sign in</button>

    <!-- Register buttons -->
    <div class="text-center">
      <p>Not a member? <a href="#!">Register</a></p>
      <p>or sign up with:</p>
      <button type="button" class="btn btn-link btn-floating mx-1">
        <i class="fab fa-facebook-f"></i>
      </button>

      <button type="button" class="btn btn-link btn-floating mx-1">
        <i class="fab fa-google"></i>
      </button>

      <button type="button" class="btn btn-link btn-floating mx-1">
        <i class="fab fa-twitter"></i>
      </button>

      <button type="button" class="btn btn-link btn-floating mx-1">
        <i class="fab fa-github"></i>
      </button>
    </div>
  </form>


  <?php
  var_dump($_POST['submit']);
  include "./db/dbhelper.php";
  if (isset($_POST['submit'])) {
    $mail = $_POST['username'];
    $pass = $_POST['pass'];
    $sql = "select * from users where ma='$mail' and password='$pass'";
    //execute($sql);
    $row = executeSingleResult($sql);
    //$row = mysqli_num_rows($result);

    // header('Location: index.php');
    // die();
    if ($row != 0 && $row['role_id'] == 1) {
      $_SESSION['login'] = $mail;
      header('Location: admin/product/index.php');
      die();
    } else if ($row != 0 && $row['role_id'] == 0) {
      header('Location: home.php');
      die();
    } else {
      //$mess = "Tai khoan hoac mat khau khong dung";
  ?>
      <script type="text/javascript">
        alert("Tai khoan hoac mat khau khong dung");
      </script>
  <?php
    }
  }
  ?>



</body>

</html>