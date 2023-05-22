<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Admin Search</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&family=Rubik:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="sview">
    <h1 class="title">Search</h1>
    <nav>
      <ul>
        <li><a class="except" href="search-admin.php" target="_top">Search</a></li>
        <li>Reports
          <ul>
            <li><a href="reservation_within_period.php" target="_top">Reservations within period</a></li>
            <li><a href="car_reservation_report.php" target="_top">Car Reservations</a></li>
            <li><a href="car_status_report.php" target="_top">Car status report</a></li>
            <li><a href="customer_reserve_report.php" target="_top">Customer Reservations</a></li>
            <li><a href="daily_payments.php" target="_top">Daily Payments</a></li>
          </ul>
        </li>
        <li><a class="except" href="register.php" target="_top">Register new car</a></li>
        <li><a class="except" href="update.php" target="_top">Update Status</a></li>
        <li><a href="index.php" class="except" target="_top">Logout</a></li>
      </ul>
    </nav>
    <div class="straight"></div>

    <form class="gsearch" name="user_search" action="output-search.php" method="post" onsubmit="return validate()">
      <div class="part11">
        <div class="container">
          <br>
          <label class="textlabel">Color </label>
          <input class=" inputext" type="text" name="color" value="" style="left:14%">
          <br><br>

          <label class="textlabel">Year </label>
          <input class=" inputext" type="text" name="year" value="" style="left:17%">
          <br><br>

          <label class="textlabel">Company</label>
          <input class=" inputext" type="text" name="company" value="" style="left:4%">
          <br><br>
          <label class="textlabel">Model </label>
          <input class=" inputext" type="text" name="model" value="" style="left:14%">
          <br><br>

          <label class="textlabel">Type </label>
          <input class=" inputext" type="text" name="type" value="" style="left:17%">
          <br><br>
          <label class="textlabel">License No.</label>
          <input class="inputext" type="text" name="license_no" value="">
          <br><br>
          <label class="textlabel">Insurance</label>
          <input class="inputext" type="text" name="insurance" value="" style="left: 4%;">
          </ul>


        </div>
      </div>



      <div class="part33">
        <div class="container">
          <br>
          <label class="color">Price</label>
          <input class="price" type="text" name="price" value="" style="left:7%">
          <br><br>
          <label class="color">Mileage</label>
          <input class="price" type="text" name="mileage" value="">
          <br><br>
          <label class="textlabel">Email</label>
          <input class="inputext" type="text" name="email" value="" style="left:7%">
          <br><br>
          <label class="textlabel">Fname</label>
          <input class="inputext" type="text" name="fname" value="" style="left:4%">
          <br><br>
          <label class="textlabel">Lname</label>
          <input class="inputext" type="text" name="lname" value="" style="left:4%">
          <br><br>
          <label class="textlabel">Phone</label>
          <input class="inputext" type="text" name="phone" value="" style="left:5%">
          <br><br>
          <label class="textlabel">SSN</label>
          <input class="inputext" type="text" name="ssn" value="" style="left:12%">
          <br><br>
          <label class="textlabel">Reservation Date</label>
          <input class="inputext" type="date" name="reserve_date" value="">


        </div>
      </div>
      <button type="submit" class="signb" style="top:400px;left:700px" name="update"><a class="indexa">Search</a></button>

    </form>


  </div>

</body>

</html>