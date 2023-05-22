<html>

<head>
  <meta charset="utf-8">
  <title>car status report</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&family=Rubik:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">

</head>


<body>
  <div class="sview">
    <h1 class="title">Car Status Report</h1>
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

    <form class="gsearch" action="car_status_report.php" method="post">


      <div class="container" style="height:18px">
        <label class="textlabel"> Status date </label>
        <input class="inputext" type="date" name="start">
        <input class="show" type="submit" value="Show Status" name="submit">
        <br><br>
      </div>
      <div class="block">
        <table class="t">
          <thead>
            <tr>
              <th scope="col">Plate_id</th>
              <th scope="col">Status</th>



            </tr>
          </thead>
          <?php
          include 'DB connection.php';
          if (isset($_POST['submit'])) {
            $start = $_POST['start'];
            $a = array("hi");
            $query = "SELECT plate_id
            FROM reservation
            WHERE reservation.pickup_date<='$start' and reservation.return_date>= '$start'";

            $result = mysqli_query($conn, $query);
            $index = 0;
            if ($result->num_rows > 0) {
              // output data of each row

              while ($row = $result->fetch_assoc()) {
                echo "<tbody><tr><td scope='row'>" . $row['plate_id'] . "</td><td>Rented</td></tr>";
                array_push($a, $row['plate_id']);
              }
            }
            $query = "SELECT distinct plate_id
            FROM reservation
             WHERE reservation.return_date< '$start' or  reservation.pickup_date>='$start'";

            $result = mysqli_query($conn, $query);
            $index = 0;
            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                if (in_array($row['plate_id'], $a) == false)
                  echo "<tbody><tr><td scope='row'>" . $row['plate_id'] . "</td><td>Active</td></tr>";
              }
            }


            $query = "SELECT c.plate_id , c.status FROM car as c WHERE status!= 'Rented' ";
            $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                echo "<tbody><tr><td scope='row'>" . $row['plate_id'] . "</td><td>" . $row['status'] . "</td></tr>";
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