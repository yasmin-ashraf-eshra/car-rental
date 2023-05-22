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
    <h1 class="title">Customer Reservation Reports</h1>
    <nav>
      <ul>
        <li><a href="search-admin.php" target="_top">Search</a></li>
        </li>
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

    <form class="gsearch" action="customer_reserve_report.php" method="post">
      <div class="container" style="height:35px">
        <label class="textlabel"> Enter customer email </label>
        <input class="inputext" id="cemail" type="email" style="width:50%" name="email" required>
        <input class="show" type="submit" name="submit" value="Show Reservations">
        <br><br>
      </div>


      <div class="block">
        <table class="t">
          <thead>
            <tr>
              <th scope="col">customer_id</th>
              <th scope="col">SSN</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">phone</th>
              <th scope="col">email</th>
              <th scope="col">join_date</th>
              <th scope="col">Age</th>
              <th scope="col">Sex</th>
              <th scope="col">License Number</th>
            </tr>
          </thead>
          <?php
          include 'DB connection.php';
          if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $query = "SELECT * FROM customer WHERE email='$email' ";
            $result = mysqli_query($conn, $query);

            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {

                echo "<tbody>" .
                  "<tr><td scope='row'>" . $row['customer_id'] . "</td><td>" . $row['ssn'] . "</td><td>" . $row["fname"] . "</td><td>" . $row["Lname"]
                  . "</td><td>" . $row["phone"] . "</td><td>" . $row["email"] . "</td><td>" . $row["join_date"]
                  . "</td><td>" . $row["age"] . "</td><td>" . $row["sex"] . "</td><td>" . $row["license_number"] . "</td></tr>";
              }
            }
          }
          ?>
          </tbody>
        </table>
      </div>

      <br></br>

      <div class="block">
        <table class="t">
          <thead>
            <tr>
              <th scope="col">Reservation ID</th>
              <th scope="col">Plate ID</th>
              <th scope="col">Company</th>
              <th scope="col">Model</th>
              <th scope="col">Year</th>
              <th scope="col">Office</th>
              <th scope="col">Reserved from</th>
              <th scope="col">Reserved To</th>

            </tr>
          </thead>
          <?php
          include 'DB connection.php';
          if (isset($_POST['submit'])) {
            $email = $_POST['email'];

            $query = "SELECT * FROM customer
join reservation USING(customer_id)
join car USING(plate_id)
join office on office.office_id=reservation.office_id
WHERE email='$email' ";

            $result = mysqli_query($conn, $query);
            $index = 0;
            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                echo "<tbody><tr><td scope='row'>" . $row['reservation_id'] . "</td><td>" . $row['plate_id'] . "</td><td>" . $row["company"] . "</td><td>" . $row["model"]
                  . "</td><td>" . $row["year"] . "</td><td>" . $row["city"] . " " . $row["address"] . "</td><td>" . $row["pickup_date"] . "</td><td>" . $row["return_date"] . "</td></tr>";
              }
            }
          } ?>

          </tbody>
        </table>
      </div>

    </form>
  </div>
</body>

</html>