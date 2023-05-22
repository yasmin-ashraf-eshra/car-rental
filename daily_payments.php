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


    <h1 class="title">Daily Payments Report</h1>
    <nav>
      <ul>
        <li><a href="search-admin.php" target="_top">Search</a></li>
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

    <form class="gsearch" action="daily_payments.php" method="post">
      <div class="container"style="height:85px">
        <label class="textlabel">Start Date</label>
        <input class="inputext" style="width:50%" type="date" name="start">
        <br><br>
        <label class="textlabel">End Date</label>
        <input class="inputext" style="width:50%" type="date" name="end">
        <input class="show" type="submit" value="Show Payments" name="submit">
        <br><br>

      </div>
      <div class="block">
        <table class="t">
          <thead>
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Payment</th>



            </tr>
          </thead>
          <?php
          include 'DB connection.php';
          if (isset($_POST['submit'])) {
            $start = $_POST['start'];
            $end = $_POST['end'];

            $query = "SELECT payment_date , SUM(total_cost) as payment
FROM reservation
WHERE reservation.payment_date>='$start' and reservation.payment_date<= '$end'
GROUP BY payment_date";

            $result = mysqli_query($conn, $query);
            $index = 0;
            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                echo "<tbody><tr><td scope='row'>" . $row['payment_date'] . "</td><td>" . $row['payment'] . "</td></tr>";
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