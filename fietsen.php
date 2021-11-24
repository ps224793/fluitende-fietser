<?php
    include_once "./phpFiles/FietserDB.php";
    $db = new FietserDB();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Fluitende fietser</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="icon" type="image/png" href="images/logo.png">

  <link rel="stylesheet" href="stylesheets/main.css">
  <link rel="stylesheet" href="stylesheets/mediaButtons.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-2 col-lg-1">
          <img src="images/logo.png" class="logo">
        </div>
        <!--searchbar-->
        <div class="col-2 align-self-center">
          <div class="input-groep">
            <div class="form outline">
              <input type="search" id="searchbar" class="form-control">
            </div>
          </div>
        </div>
        <div class="col-1 align-self-center">
          <a id="search-button" type="button"> <img src="images/zoek.png" width="50%" style="min-width: 40px;"></a>
        </div>
      </div>
    </div>
  </header>
  <!--Navbar-->
  <nav class="navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Fluitende Fietser</a>
    <div class="navbar-nav">
      <!--Nav Items-->
      <a class="nav-item nav-link" href="index.html">Home</a>
      <a class="nav-item nav-link" href="contact.php">contact</a>
      <a class="nav-item nav-link" href="openingsTijden.html">Openingstijden</a>
      <a class="nav-item nav-link active" href="fietsen.php"> Fietsverkoop </a>
      <a class="nav-item nav-link" href="verhuur.php">Fietsverhuur</a>
      <a class="nav-item nav-link" href="overOns.html">Over ons</a>
    </div>
  </nav>

  <!--content-->
  <div class="container">
    <div class="row">
      <?php
        $rows = $db->selectQuerry("SELECT * FROM bikes");
        foreach($rows as $row){
          echo '<div class="col-12 col-md-6 col-lg-4" style="margin-bottom: 10px;">';
          echo '<a class="stretched-link" href="http://fluitendefietsen/fiets.php?BikeId=' . $row["id"] .  '"></a>';
          echo '<div class="bikes border border-dark">';
          echo '<img class="bikes" src="' . $row["imgString"] . '">';
          echo '<h4 class="bikes">' . $row["bikeName"] . '</h4>';
          echo '</div></div>';
        }
      ?>
    </div>
  </div>

  <!--footer-->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-2">
          <ul class="footer">
            <li><a href="overOns.html" class="footer">Over ons</a></li>
            <li><a href="contact.html" class="footer">Contact</a></li>
            <li><a href="/download files/algemene voorwaarden.pdf" download class="footer">Alemene voorwaarden</a></li>
            <li><a href="https://www.facebook.com/fietsmagazine" class="fa fa-facebook"></a></li>
            <li>KVK: 88599665</li>
            <li>BTW: NL999888492Z09</li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

</body>

</html>