<?php 
var_dump($_POST);

    $message = "naam: $_POST[FirstName] $_POST[LastName]\n";
    $message .= "e-mail: $_POST[Email]\n\n";
    $message .= "vraag:\n$_POST[Question]";

    $time =  date("Y-m-d H-i-s");
    $name = "vragen/vraag $time.txt";

    file_put_contents($name, $message);
    
    header("Location: http://fluitendefietsen/"); 
?>