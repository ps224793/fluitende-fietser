<?php 
    include_once "./phpFiles/FietserDB.php";
    $db = new FietserDB();

    var_dump($_POST);

    $content = "naam: $_POST[MyName]\n";
    $content .= "e-mail: $_POST[MyEmail]\n";
    $content .= "adres: $_POST[MyAdress]\n";
    $content .= "stad: $_POST[MyCity]\n";
    $content .= "postcode: $_POST[MyZipcode]\n\n";

    foreach($_POST["BikeId"] as $id){
        $rows = $db->selectRentBike($id);
        foreach($rows as $row){
            $content .= "fiets: $row[bikeName]\n";
            $content .= "prijs: €$row[rentPrice] / dag\n\n";
        }
    }
    $date = date("Y-m-d H-i-s");
    $name = "bonnetjes/bonnetje $date .txt";
    file_put_contents($name, $content);

    header("Location: http://fluitendefietsen/"); 
    
?>
