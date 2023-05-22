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
  <div class="sview" style="top:20%">
    <form class="gsearch" name="customerr_search" action="output-customer.php" method="post" onsubmit="return validate()">
      <div class="part11">
        <div class="container">
          <br>
          <label class="textlabel">Color </label>
          <input class=" inputext" type="text" name="color" value="">
          <br><br><br>

          <label class="textlabel">Year </label>
          <input class=" inputext" type="text" name="year" value="">
          <br><br><br>

          <label class="textlabel">Company</label>
          <input class=" inputext" type="text" name="company" value="">
          <br><br><br>

          <label class="textlabel">Insurence </label>
          <input class=" inputext" type="text" name="insurance" value="">
          <br><br><br>



        

        </div>
      </div>


      <div class="part2">
        <div class="container">
          <br>
          <label class="textlabel">Price</label>
          <input class="inputext" type="text" name="price" value="">
          <br><br><br>
          <label class="textlabel">Mileage</label>
          <input class="inputext" type="text" name="mileage" value="">
          <br><br><br>
          <label class="textlabel">Model </label>
          <input class=" inputext" type="text" name="model" value="">
          <br><br><br>

          <label class="textlabel">Type </label>
          <input class=" inputext" type="text" name="type" value="">
          <br><br>

        </div>
      </div>
      <button type="submit" class="signb" style="top:400px;left:400px" name="update"><a class="indexa">Search</a></button>

     



    </form>
  </div>
</body>

</html>