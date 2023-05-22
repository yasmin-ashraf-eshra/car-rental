<?php include('finaldatabase.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&family=Rubik:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <script src="js.js"></script>
  <script>
    function validate() {
      let x = document.forms["loginform"]["cemail"].value;
      let y = document.forms["loginform"]["pass"].value;
      var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      if (x == "") {
        alert("please fill the e-mail field");
        return false;
      }
      if (y == "") {
        alert("please enter a password to your account");
        return false;
      }
      if (emailPattern.test(x)) {
        return true;
      } else {
        alert("You have entered an invalid email address!");
        return false;
      }
      var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      if (!emailPattern.test(x)) {
        alert("You have entered an invalid email address!");
        return false;
      }

    }
  </script>
  <style>
    body {
      background-color: #2D4263;
    }
  </style>
</head>

<body>
  <div class="system">
    <h1>Customer Login</h1>
    <form class="" name="loginform" action="test.php" onsubmit="return validate()" method="post">
      <input type="hidden" name="start" value="1">
      <label>Email</label>
      <input type="email" name="cemail" value="">
      <br><br>
      <label>Password</label>
      <input type="password" name="pass" value="" minlength="8" id="password">
      <span class="eye" onclick="eyefunction1()">
        <i id="hide1" class="bi bi-eye"></i>
        <i id="hide2" class="bi bi-eye-slash"></i>
      </span>
      <br><br>
      <button type="submit" class="systemb" name="update"><a class="indexa">Submit</a></button>
      <button type="button" class="systemb" name="back"><a class="indexa" href="index.php">Back</a></button>
      <br><br>
      <p class="customerp">If you don't have an account <a class="customera" href="signup.php">Sign Up</a> </p>
      <br><br>
    </form>
  </div>

</body>

</html>