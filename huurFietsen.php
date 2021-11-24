<?php
    include_once "./phpFiles/FietserDB.php";
    $db = new FietserDB();
    if(Count($_POST) < 1){
        header("Location: http://fluitendefietsen/verhuur.php"); 
    }
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
      <a class="nav-item nav-link" href="fietsen.php"> Fietsverkoop </a>
      <a class="nav-item nav-link active" href="verhuur.php">Fietsverhuur</a>
      <a class="nav-item nav-link" href="overOns.html">Over ons</a>
    </div>
  </nav>


    <div class="container">
        <div class="row">
            <div class="col-6 wrapper">
                <form method="POST" action="PostRent.php">
                    <div class="form-group">
                        <label>Naam:</label>
                        <input type="text" name="MyName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>E-mail:</label>
                        <input type="email" name="MyEmail" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Adres:</label>
                        <input type="text" name="MyAdress" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stad:</label>
                        <input type="text" name="MyCity" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Postcode:</label>
                        <input type="text" name="MyZipcode" class="form-control" required>
                    </div>
                    <?php

                    foreach($_POST["id"] as $ID){
                        echo "<input type=hidden name=BikeId[] value=$ID>";
                    }

                    ?>
                    <input type="submit" class="btn btn-primary" value="Huur Fietsen"  style="float: right;">
                </form>
            </div>
            <div class="col-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">fiets</th>
                        <th scope="col">prijs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($_POST["id"] as $ID){
                        $rows = $db->selectRentBike($ID);
                        foreach($rows as $row){
                            echo"
                                <tr>
                                    <td>$row[bikeName]</td>
                                    <td>€$row[rentPrice] / dag</td>
                                </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <ul class="footer">
                        <li><a href="overOns.html" class="footer">Over ons</a></li>
                        <li><a href="contact.html" class="footer">Contact</a></li>
                        <li><a href="/download files/algemene voorwaarden.pdf" download class="footer">Alemene
                                voorwaarden</a></li>
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