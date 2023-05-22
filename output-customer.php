<?php

session_start ();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Search Customer</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&family=Rubik:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <style>
    * {
      top: 0;
      margin: 0;
      padding: 0;
      list-style: none;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="wrapperr">
    <div class="sidebarr">
      <h1 class="title">FILTER</h1>
      <form name="customerr_search" action="output-customer.php" method="post" onsubmit="return validate()">
        <div class="container">
          <div>
            <div><label class="textlabel">Color </label>
              <input class=" inputext" type="text" name="color" value="" style="left:10%">
            </div>
            <br>
            <div>
              <label class="textlabel">Year </label>
              <input class=" inputext" type="text" name="year" value="" style="left:13%">
            </div>
            <br>
            <div>
              <label class="textlabel">Company</label>
              <input   style="width:60%;" class=" inputext" type="text" name="company" value="">
            </div>
            <br>
            <div>
              <label class="textlabel">Insurance </label>
              <input style="width:58%;" class=" inputext" type="text" name="insurance" value="">
            </div>
            <br>
            <div>
              <label class="textlabel">Price</label>
              <input class="inputext" type="text" name="price" value="" style="left:13%">
            </div>
            <br>
            <div>
            
              <label class="textlabel">Mileage</label>
              <input class="inputext" type="text" name="mileage" value="" style="left:6%">
            </div>
            <br>
            <div>
              <label class="textlabel">Model </label>
              <input class=" inputext" type="text" name="model" value="" style="left:10%">
            </div>
            <br>
            <div>
              <label class="textlabel">Type </label>
              <input class=" inputext" type="text" name="type" value="" style="left:13%">
            </div>
            <br>
          </div>
        </div>



        <button type="submit" class="signb" name="update" style="top:50px;left:30px;background-color: #C84B31;margin:10px;padding:10px">
          <a class="indexa">
            Search</a></button>
        <button type="submit" class="signb" name="update" style="top:50px;left:30px;background-color: #C84B31;margin:10px;padding:10px">
          <a class="indexa">
            reset</a></button>
      </form>
    </div>
    <div class="contain">
      <nav>
        <ul>
          <li style="border-color: #2D4263;left:90%;"><a href="index.php" class="except1" target="_top">Logout</a></li>
        </ul>
      </nav>
      <div class="straight"></div>
      <br>
<!-- <form action="test.php" method="post"> -->

  <div class="block">
    <table class="t">
      <tr>
        <th>car-plate-id</th>
        <th>color</th>
        <th>model</th>
        <th>year</th>
        <th>mileage</th>
        <th>price/day</th>
        <th>company</th>
        <th>type</th>
        <th>insurance</th>
        <th>office-Address</th>
        <th>image</th>
        <th></th>
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

        $query = "SELECT * from car
                  join office  using(office_id)
                  where car.plate_id>0 ";

        if ($color != "")  $query .= "and color ='$color' ";
        if ($year != "")  $query .= "and year ='$year' ";
        if ($model != "")  $query .= "and model ='$model' ";
        if ($type != "")  $query .= "and type ='$type' ";
        if ($price != "")  $query .= "and price_per_day ='$price' ";
        if ($mileage != "")  $query .= "and mileage ='$mileage' ";
        if ($company != "")  $query .= "and company ='$company' ";
        if ($insurance != "")  $query .= "and insurance ='$insurance' ";

        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
            $image= $row["image"];
            $plate =  $row["plate_id"];
            //$_SESSION['plate_id'] = $plate;
            echo "<tr>" .
              "<td>" . $row["plate_id"] . "</td>" .
              "<td>" . $row["color"] . "</td>" .
              "<td>" . $row["model"] . "</td>" .
              "<td>" . $row["year"] . "</td>" .
              "<td>" . $row["mileage"] . "</td>" .
              "<td>" . $row["price_per_day"] . "</td>" .
              "<td>" . $row['company'] . "</td>" .
              "<td>" . $row['type'] . "</td>" .
              "<td>" . $row['insurance'] . "</td>" .
              "<td>" . $row['address'] . "</td>" .
              "<td><a target='_blank' href='$image' > show image</a></td>" .
              '<td><button type="submit" name="reserve""><a class="indexa" href="reservation-data.php?id='.$row["plate_id"].'" style="font-size: 20px;">Reserve</a></button></td>' .
              "</tr>";
          }
        }
      }

      ?>
    </table>
  </div>
</div>
</div>
<!-- </form> -->
</body>

</html>