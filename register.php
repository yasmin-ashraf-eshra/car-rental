<?php include('finaldatabase.php') ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register New Car</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&family=Rubik:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script>
            function validate(){
                let x1 = document.forms["carregistrationform"]["model"].value;
                let x2 = document.forms["carregistrationform"]["year"].value;
                let x3 = document.forms["carregistrationform"]["plate"].value;
                let x4 = document.forms["carregistrationform"]["color"].value;
                let x5 = document.forms["carregistrationform"]["insurance"].value;
                let x6 = document.forms["carregistrationform"]["type"].value;
                let x7 = document.forms["carregistrationform"]["status"].value;
                let x8 = document.forms["carregistrationform"]["pday"].value;
                let x9 = document.forms["carregistrationform"]["company"].value;
                let x10 = document.forms["carregistrationform"]["office"].value;
                let x11 = document.forms["carregistrationform"]["img-link"].value;
                let y = document.forms["carregistrationform"]["mileage"].value;
                if(x1==""){
                        alert("please enter the model");
                        return false;
                    }

                    else if(x2==""){
                        alert("please enter the year");
                        return false;
                    }
                    else if(x3==""){
                        alert("please enter the plate number");
                        return false;
                    }
                    else if(x4==""){
                        alert("please enter the color");
                        return false;
                    }
                    else if(x5==""){
                        alert("please enter the insurance");
                        return false;
                    }
                    else if(x6==""){
                        alert("please enter the type");
                        return false;
                    }
                    else if(x7==""){
                        alert("please enter the status");
                        return false;
                    }else if(x8==""){
                        alert("please fill the payment day");
                        return false;
                    }else if(x9==""){
                        alert("please enter the company");
                        return false;
                    }else if(x10==""){
                        alert("please enter the office ID");
                        return false;
                    }else if(x11==""){
                        alert("please enter the image link");
                        return false;
                    }
                else if(y==""){
                        alert("please enter the mileage");
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
      <h1>Register a new car</h1>
      <form class="" name="carregistrationform" action="#"  onsubmit="return validate()" method="POST">
        <div class="part1" style="top:120px">
          <input type="hidden" name="start" value="3">
          <label>Model</label>
          <br>
           <input class="inputsign" type="text"  name="model"><br><br>
           <label>Year</label>
           <br>
           <input class="inputsign" type="text" name="year"><br><br>
           <label>Plate ID</label>
           <br>
           <input class="inputsign" type="text" name="plate"><br><br>
           <label>Color</label>
           <br>
           <input class="inputsign" type="text"  name="color"><br><br>
           <label>Insurance</label>
           <br>
           <input class="inputsign" type="text"  name="insurance"><br><br>
           <label>Office ID</label>
           <br>
           <input class="inputsign" type="text"  name="office"><br><br>
        </div>
<div class="part2" style="top:120px">
  <label>Type</label>
  <input class="inputsign" type="text"  name="type"><br><br>
  <label>Status</label>
  <input class="inputsign" type="text"  name="status"><br><br>
  <label>Price per Day</label>
  <input class="inputsign" type="text"  name="pday"><br><br>
  <label>Company</label>
  <input class="inputsign" type="text"  name="company"><br><br>
  <label>Mileage</label>
  <input class="inputsign" type="text"  name="mileage"><br><br>
  <label>Image Link</label>
  <br>
  <input class="inputsign" type="text"  name="img-link"><br><br>
</div>

<button class="signb" type="submit" name="update3"><a class="indexa">Submit</a></button>
<button class="signb" type="button" name="update"><a class="indexa" href="systemview.php">Back</a></button>
 </form>
<div class="vl"></div>

    </div>

  </body>
</html>
