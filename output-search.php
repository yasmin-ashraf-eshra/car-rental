<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
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
                        <li><a href="car_status_report.php" target="_top">car_status_report</a></li>
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
        <div class="block gsearch" style="padding-top:20px">
            <table class="t">

                <tr>
                    <th>c_id</th>
                    <th>email</th>
                    <th>fname</th>
                    <th>Lname</th>
                    <th>phone</th>
                    <th>age</th>
                    <th>sex</th>
                    <th>ssn</th>
                    <th>license-num</th>
                    <th>join-date</th>
                    <th>car-plate-id</th>
                    <th>color</th>
                    <th>model</th>
                    <th>year</th>
                    <th>mileage</th>
                    <th>price/day</th>
                    <th>company</th>
                    <th>type</th>
                    <th>insurance</th>
                    <th>office-id</th>
                    <th>r-id</th>
                    <th>pickup-date</th>
                    <th>return-date</th>
                    <th>payment-date</th>
                    <th>total-cost</th>
                </tr>


                <?php
                include 'DB connection.php';

                if (isset($_POST['update'])) {
                    $color = $_POST['color'];
                    $year =  $_POST['year'];
                    $model =  $_POST['model'];
                    $type =  $_POST['type'];
                    $price =  $_POST['price'];
                    $mileage =  $_POST['mileage'];
                    $company =  $_POST['company'];
                    $insurance =  $_POST['insurance'];
                    $email =  $_POST['email'];
                    $fname =  $_POST['fname'];
                    $Lname =  $_POST['lname'];
                    $phone =  $_POST['phone'];
                    $ssn =  $_POST['ssn'];
                    $reserve_date =  $_POST['reserve_date'];
                    $license_number =  $_POST['license_no'];


                    $query = "SELECT *
                    FROM customer as cu
                    left join reservation as r  on cu.customer_id = r.customer_id
                    left join car as c on r.plate_id = c.plate_id
                    WHERE c.plate_id>0 ";

                    if ($color != "")  $query .= "and c.color ='$color' ";
                    if ($year != "")  $query .= "and c.year ='$year' ";
                    if ($model != "")  $query .= "and c.model ='$model' ";
                    if ($type != "")  $query .= "and c.type ='$type' ";
                    if ($price != "")  $query .= "and c.price_per_day ='$price' ";
                    if ($mileage != "")  $query .= "and c.mileage ='$mileage' ";
                    if ($company != "")  $query .= "and c.company ='$company' ";
                    if ($insurance != "")  $query .= "and c.insurance ='$insurance' ";
                    if ($fname != "")  $query .= "and cu.fname ='$fname' ";
                    if ($Lname != "")  $query .= "and cu.Lname ='$Lname' ";
                    if ($phone != "")  $query .= "and cu.phone ='$phone' ";
                    if ($ssn != "")  $query .= "and cu.ssn ='$ssn' ";
                    if ($license_number != "")  $query .= "and cu.license_number ='$license_number' ";
                    if ($reserve_date != "")  $query .= "and r.reserve_date ='$reserve_date' ";


                    $result = mysqli_query($conn, $query);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row['customer_id'] . "</td><td>" . $row["email"] . "</td><td>" . $row["fname"]
                                . "</td><td>" . $row["Lname"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["age"] . "</td><td>" . $row["sex"] . "</td><td>" . $row["ssn"] . "</td><td>" . $row["license_number"]
                                . "</td><td>" . $row['join_date'] . "</td><td>" . $row["plate_id"] . "</td><td>" . $row["color"] . "</td><td>" . $row["model"] . "</td><td>" . $row["year"]
                                . "</td><td>" . $row["mileage"] . "</td><td>" . $row["price_per_day"] . "</td><td>" . $row['company'] . "</td><td>" . $row['type'] . "</td><td>" . $row['insurance'] . "</td><td>" . $row['office_id']
                                . "</td><td>" . $row['reservation_id'] . "</td><td>" . $row['pickup_date'] . "</td><td>" . $row['return_date'] . "</td><td>" . $row['payment_date'] . "</td><td>" . $row['total_cost'] . "</td></tr>";
                        }
                    }
                }
                ?>
            </table>
        </div>

    </div>
</body>

</html>