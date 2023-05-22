<?php include('finaldatabase.php') ?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Customer signup</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&family=Rubik:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <script src="js.js"></script>
  <script>
    function validate1() {
      let x1 = document.forms["registerform"]["fname"].value;
      let x2 = document.forms["registerform"]["lname"].value;
      let x3 = document.forms["registerform"]["email"].value;
      let x4 = document.forms["registerform"]["phone"].value;
      let x5 = document.forms["registerform"]["ssn"].value;
      let x6 = document.forms["registerform"]["license"].value;
      let x7 = document.forms["registerform"]["age"].value;
      let x8 = document.forms["registerform"]["gender"].value;
      let x9 = document.forms["registerform"]["pass"].value;
      let y = document.forms["registerform"]["cpass"].value;
      if (x1 == "") {
        alert("please enter your first name");
        return false;
      } else if (x2 == "") {
        alert("please enter your last name");
        return false;
      } else if (x3 == "") {
        alert("please enter your e-mail");
        return false;
      } else if (x4 == "") {
        alert("please enter your phone number");
        return false;
      } else if (x5 == "") {
        alert("please enter your ssn");
        return false;
      } else if (x6 == "") {
        alert("please enter your license");
        return false;
      } else if (x7 == "") {
        alert("please enter your age");
        return false;
      } else if (x8 == "") {
        alert("please enter your gender");
        return false;
      } else if (x9 == "") {
        alert("please enter your password");
        return false;
      } else if (y != x9) {
        alert("please re-enter your password correctly");
        return false;
      }

      var ssnPattern = /^\d{14}$/;
      if (!ssnPattern.test(x5)) {
        alert("SSN must be 14 digit");
        return false;
      }

      var phonePattern = /^\d{11}$/;
      if (!phonePattern.test(x4)) {
        alert("Phone Number must be 11 digit");
        return false;
      }
      var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      if (!emailPattern.test(x3)) {
        alert("You have entered an invalid email address!");
        return false;
      }

    }
  </script>
<style>
      body{
      background-color: #2D4263;
    }
</style>
</head>

<body>
  <div class="sign">
    <h1>Sign up</h1>
    <form class="" name="registerform" action="#" onsubmit="return validate1()" method="post">
      <div class="part1">
        <input type="hidden" name="start" value="2">
        <label>First Name</label>
        <br>
        <input class="inputsign" type="text" name="fname" value="">
        <br><br>
        <label>Last Name</label>
        <br>
        <input class="inputsign" type="text" name="lname" value="">
        <br><br>
        <label>Email</label>
        <br>
        <input class="inputsign" type="email" name="email" value="">
        <br><br>
        <label>Phone</label>
        <br>
        <input class="inputsign" type="text" name="phone" value="">
        <br><br>
        <label>SSN</label>
        <br>
        <input class="inputsign" type="text" name="ssn" value="">
        <br><br>
      </div>

      <div class="part2">
        <label>License</label>
        <br>
        <input class="inputsign" type="text" name="license" value="">
        <br><br>
        <label>Age</label>
        <br>
        <input class="inputsign" type="text" name="age" value="">
        <br><br>
        <label>Gender</label>
        <br>
        <input class="inputsign" type="text" name="gender" value="">
        <br><br>
        <label>Password</label>
        <br>
        <input class="inputsign" type="password" name="pass" value="" minlength="8" id="password">
        <span class="eye" style="  margin-top: 6px;   margin-left: -30px;" onclick="eyefunction1()">
          <i id="hide1" class="bi bi-eye"></i>
          <i id="hide2" class="bi bi-eye-slash"></i>
        </span>
        <br><br>
        <label>Confirm Password</label>
        <br>
        <input class="inputsign" type="password" name="cpass" value="" minlength="8" id="confirmpassword">
        <span class="eye" style="  margin-top: 6px;   margin-left: -30px;" onclick="eyefunction2()">
          <i id="hide3" class="bi bi-eye"></i>
          <i id="hide4" class="bi bi-eye-slash"></i>
        </span>
        <br><br>
      </div>
      <button class="signb" type="submit" name="update2"><a class="indexa">Submit</a></button>
      <button class="signb" type="button" name="update"><a class="indexa" href="customer.php">Back</a></button>

    </form>
    <div class="vl"></div>

  </div>
</body>

</html>