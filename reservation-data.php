<?php
session_start();
include('DB connection.php');
if (!empty($_SESSION["email"])) {
  $email = $_SESSION["email"];
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Customer-view</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&family=Rubik:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <script>
    function curday() {
      today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1; //As January is 0.
      var yyyy = today.getFullYear();

      if (dd < 10) dd = '0' + dd;
      if (mm < 10) mm = '0' + mm;
      return (yyyy + '-' + mm + '-' + dd);
    };

    function validate1() {
      let x = document.forms["Reservation"]["pdate"].value;
      let y = document.forms["Reservation"]["rdate"].value;
      let z = document.forms["Reservation"]["redate"].value;
      if (x == "") {
        alert("please fill the pickup date field");
        return false;
      }
      if (y == "") {
        alert("please fill the return date field");
        return false;
      }
      if (z == "") {
        alert("please fill the payment date field");
        return false;
      }
      if (x > y) {
        alert("the return date must be after the pickup date");
        return false;
      }
      let cur = curday();
      if (cur > x) {
        alert("can't pickup car from the past lol");
        return false;

      }
      if (cur > z) {
        alert("can't get money from the past lol");
        return false;

      }
      if (z > x) {
        alert("you have to pay before picking up the car");
        return false;

      }
    }
  </script>
  <style>
    * {
      top: 0;
      margin: 0;
      padding: 0;
      list-style: none;
      text-decoration: none;
    }

    body {
      background-color: #2D4263;
    }
  </style>
</head>

<body>
  <h1><?php


      if (isset($_POST['reservation'])) {
        //////reservation
        $plate_number = $_GET["id"];

        $pickup_date = $_POST['pdate'];
        $return_date = $_POST['rdate'];
        $payment_date = $_POST['redate'];
        $d = strtotime("today");
        $currentdate = date("Y-m-d", $d);

        ////////////////// query for getting customer id
        $sql = mysqli_query($conn, " SELECT customer_id from customer where email='$email'");
        $row = mysqli_fetch_assoc($sql);
        $array = mysqli_fetch_array($sql);
        $customer_id = $row['customer_id'];



        ////////////

        $datetime1 = strtotime($pickup_date);
        $datetime2 = strtotime($return_date);
        $secs = $datetime2 - $datetime1; // == <seconds between the two times>
        $days = $secs / 86400;
        //////////////////////query for getting price
        $sql = mysqli_query($conn, " SELECT price_per_day FROM car  WHERE plate_id='$plate_number'");
        $row = mysqli_fetch_assoc($sql);
        $array = mysqli_fetch_array($sql);
        $price_perday = $row['price_per_day'];

        ////////////////////

        ////////////////////query for office id
        $sql = mysqli_query($conn, "  SELECT office_id FROM car  WHERE plate_id='$plate_number'");
        $row = mysqli_fetch_assoc($sql);
        $array = mysqli_fetch_array($sql);
        $office_id = $row['office_id'];
        ///////////////////////////


        $totalprice = intval($price_perday) * $days;

        $result = mysqli_query($conn, " SELECT plate_id FROM car where plate_id='$plate_number' and status='out of service'
          union
          SELECT c.plate_id FROM car c join Reservation r using(plate_id) WHERE c.plate_id='$plate_number'
          and c.status='Rented' and (('$pickup_date' between r.pickup_date and r.return_date) 
          or ( '$return_date'  between r.pickup_date and r.return_date))
          union
          SELECT c.plate_id FROM car c join Reservation r using(plate_id) WHERE c.plate_id='$plate_number'
          and c.status='Rented'
          and( '$pickup_date' < All (select r.pickup_date from reservation where c.plate_id='$plate_number')
          and '$return_date' >all (select r.return_date from reservation where c.plate_id='$plate_number'))
          ");

        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {

          echo "<script>alert('car is out of service or rented at this interval')</script>";
          // exit();
        } else {
          $sql = "INSERT INTO `Reservation` (`customer_id`,`office_id`, `plate_id`,`total_cost`,`reserve_date` ,`pickup_date`, `return_date`,`payment_date`) VALUES ('$customer_id', '$office_id','$plate_number','$totalprice' ,'$currentdate','$pickup_date', '$return_date','$payment_date')";
          if ($conn->query($sql) === TRUE) {
            $sql1 = "UPDATE car SET status='Rented' WHERE plate_id='$plate_number' ";
            if ($conn->query($sql1) === TRUE) {
              echo '<script language="javascript">';
              echo 'alert("renting of the car is done and total cost is' . $totalprice . '");';
              echo 'window.location.href="customer-view.php";';
              echo '</script>';
            } else {

              echo "<script>alert('failed to update car status')</script>";
            }
          } else {

            echo "<script>alert('the same user is trying to rent the same car at the same pick up date')</script>";
          }
        }
      }



      ?></h1>
  <div class="system">
    <h1>Reservation Data</h1>
    <form class="" name="Reservation" action="#" onsubmit="return validate1()" method="post">
      <label></label>
      <label>Pick up Date</label>
      <input type="date" name="pdate" value="">
      <br><br>
      <label>Return Date</label>
      <input type="date" name="rdate" value="">
      <br><br>
      <label>payment Date</label>
      <input type="date" name="redate" value="">
      <h6 style="color:red; font-size:50%; position: absolute; top:440px">** you have to pay before the pickup date</h6>
      <br><br>
      <button type="submit" class="systemb" name="reservation"><a class="indexa">Submit</a></button>
      <button type="button" class="systemb" name="update"><a class="indexa" href="customer-view.php">Back</a></button>
    </form>
  </div>
  </div>
  </div>
</body>

</html>