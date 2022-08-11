<?php
session_start();
// set cookie
if(isset($_COOKIE["login"])) {
	if($_COOKIE ["login"] == 'true' ) {
		$_SESSION['login'] = true;
	}
}

if(isset($_SESSION["login"])) {
	exit(header("Location: index.php"));
}
require 'config.php';
 if(isset($_POST['bsubmit'])) {
	 $username=$_POST["username"];
	 $password=$_POST["password"];
	 $result=mysqli_query ($db, " SELECT * FROM `pengguna` WHERE username = '$username'");
 
 //cek username
if (mysqli_num_rows($result) === 1 ) {
	//cek password 
	$row=mysqli_fetch_assoc($result);
	if(password_verify($password, $row["password"])) {
		//SET SESSION 
		$_SESSION["login"] = true;
		exit(header("Location: " .$url));
	}
  }
  $error=true;
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login 10</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="add/css/style.css" />
  </head>
  <body class="img js-fullheight" style="background-image: url(add/images/bg.jpg)">
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Login</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="login-wrap p-0">
              <h3 class="mb-4 text-center">Have an account?</h3>
              <form action="#" class="signin-form" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off"required />
                </div>
                <div class="form-group">
                  <input id="password-field" type="password" class="form-control" placeholder="Password" name="password"required />
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                  <button type="submit" name="bsubmit"class="form-control btn btn-primary submit px-3">Sign In</button>
                </div>
                <div class="form-group d-md-flex">
                  <div class="forgot">
                    <a href="register.php" style="color: #fff; margin-left: 7.4rem;">Register Now !</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="add/js/jquery.min.js"></script>
    <script src="add/js/popper.js"></script>
    <script src="add/s/bootstrap.min.js"></script>
    <script src="add/js/main.js"></script>
  </body>
</html>
