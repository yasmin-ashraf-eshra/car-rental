<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "Car_Rental_Company";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update'])) {

    //////////////////////log in-----customer
    $email = $_POST["cemail"];
    $password = $_POST["pass"];
    $result = mysqli_query($conn, " SELECT * FROM customer WHERE  rtrim(ltrim(email)) = '$email'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if (md5($password) == rtrim(ltrim($row['password']))) {
            $array = mysqli_fetch_array($result);

            echo "<script>alert('login successfully')</script>";
            header('location:customerview.php');
        } else echo "<script>alert('Incorrect password')</script>";
    } else { ///////////always print incorrect dont know whyyyyyyyy??????
        echo "<script>alert('Incorrect email or password')</script>";
    }
}


if (isset($_POST['login'])) {

    //////////////////////log in-----admin
    $email = $_POST["adminemail"];
    $password = $_POST["adminpass"];
    if ($email == 'admin@gmail.com') {
        if ($password == '12345678') {

            echo "<script>alert('login successfully')</script>";
            header('location:systemview.php');
        } else echo "<script>alert('Incorrect password')</script>";
    } else { ///////////always print incorrect dont know whyyyyyyyy??????
        echo "<script>alert('Incorrect email or password')</script>";
    }
}

if (isset($_POST['update2'])) {
    //////////////////////registraion of new customer
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $ssn = $_POST['ssn'];
    $license = $_POST['license'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $pass = $_POST['pass'];


    $query = "SELECT email FROM customer WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        //echo"<script>alert('email already exists')</script>";

        header("Refresh: 0; url= signup.php");
        echo "<script>alert('email already exists')</script>";
        //echo 'Successfully redirecting after 5 seconds.';

        // header('location:signup.php');
        exit();
    }
    $sql = "INSERT INTO customer (fname,Lname,password,phone,email,age,sex,license_number,ssn)
               VALUES ('" . $_POST['fname'] . "','" . $_POST['lname'] . "','" . md5($_POST['pass']) . "','" . $_POST['phone'] . "','" . $_POST['email'] . "','" . $_POST['age'] . "','" . $_POST['gender'] . "','" . $_POST['license'] . "','" . $_POST['ssn'] . "')";

    if ($conn->query($sql) === TRUE) {
        header("Refresh: 0; url= customer.php");
        echo "<script>alert('registered successfully')</script>";
        //header('location:index.html');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['update3'])) {
    //////////////registration of new car ---admin
    $model = $_POST['model'];
    $year = $_POST['year'];
    $plate = $_POST['plate'];
    $color = $_POST['color'];
    $insurance = $_POST['insurance'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $pday = $_POST['pday'];
    $company = $_POST['company'];
    $mileage = $_POST['mileage'];
    $image = $_POST['img-link'];
    $office = $_POST['office'];

    $query = "SELECT plate_id FROM CAR WHERE plate_id = '$plate'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        header("Refresh: 0; url= register.php");
        echo "<script>alert('car already registered')</script>";
    }
    $query = "SELECT office_id FROM OFFICE WHERE office_id = '$office'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) === 0) {
        header("Refresh: 0; url= register.php");
        echo "<script>alert('incorrect office id')</script>";
    }


    $sql = "INSERT INTO CAR (plate_id,color,model,`year`,insurance,mileage,price_per_day,company,`type`,
    office_id,`status`,`image`)
            VALUES ('" . $_POST['plate'] . "','" . $_POST['color'] . "','" . $_POST['model'] .
        "','" . $_POST['year'] . "','" . $_POST['insurance'] . "','" . $_POST['mileage'] .
        "','" . $_POST['pday'] . "','" . $_POST['company'] . "','" . $_POST['type'] . "','$office',
             '$status','$image')";

    if ($conn->query($sql) === TRUE) {
        header("Refresh: 0; url= systemview.php");
        echo "<script>alert('Registration of the car is done')</script>";
        // header('location:systemview.html');



    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}




if (isset($_POST['submit'])) {
    //////updating car info
    $plate_number = $_POST['plate'];
    $status = $_POST['cars'];
    $result = mysqli_query($conn, " SELECT * FROM car WHERE plate_id='$plate_number'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $sql = "UPDATE car SET status='$status' WHERE plate_id='$plate_number' ";
        if ($conn->query($sql) === TRUE) {
            header("Refresh: 0; url= systemview.php");
            echo "<script>alert('updating car status is done')</script>";
        }
    } else {
        echo "<script>alert('Incorrect plate id')</script>";
    }
}


$conn->close();
