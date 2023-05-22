<?php
$conn = mysqli_connect("127.0.0.1","root","","car_rental_company");
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
?>