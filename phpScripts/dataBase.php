<?php 
function RunQuerry($querry){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fluitendefietser";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = $querry;
    $result = $conn->query($querry);
    return $result;
}
?>