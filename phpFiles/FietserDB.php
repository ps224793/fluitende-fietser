<?php
    class FietserDB 
    {
        const DSN = "mysql:host=localhost;dbname=fluitendefietser";
        const USER = "root";
        const PASSWD = "";
           


        //Return normale full querry
        function selectQuerry($querry){
            $pdo = new PDO(self::DSN, self::USER, self::PASSWD);

            $statement = $pdo->prepare($querry);

            $statement->execute();

            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $rows;
        }
    
        
        //haal fietser met het gekozen id op
        function selectBike($bikeId){		
            $pdo = new PDO(self::DSN, self::USER, self::PASSWD);

            $statement = $pdo->prepare("SELECT * FROM `bikes` LEFT JOIN `brand` ON `bikes`.`bikeBrandid` = `brand`.`id` LEFT JOIN `bikecolor` ON `bikes`.`ColorId` = `bikecolor`.`id` WHERE `bikes`.`id` = :bike_id;");  
            
            $statement->bindValue(":bike_id", $bikeId, PDO::PARAM_INT);

            $statement->execute(); 
            
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $rows;
        }

        //haal afbeelding van fiets met het gekozen id op
        function selectBikeImage($bikeId){		
            $pdo = new PDO(self::DSN, self::USER, self::PASSWD);

            $statement = $pdo->prepare("SELECT `imgString` FROM `bikes` WHERE `id` = `bikecolor`.`id` WHERE `bikes`.`id` = :bike_id;");  
            
            $statement->bindValue(":bike_id", $bikeId, PDO::PARAM_INT);

            $statement->execute(); 
            
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $rows;
        }

        //haal de informatie op van de huurfiets van het megegeven id
        function selectRentBike($bikeId){		
            $pdo = new PDO(self::DSN, self::USER, self::PASSWD);

            $statement = $pdo->prepare("SELECT `bikeName`,`rentPrice` FROM `rentbikes` WHERE `id` = :bike_id;");  
            
            $statement->bindValue(":bike_id", $bikeId, PDO::PARAM_INT);

            $statement->execute(); 
            
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $rows;
        }


    }

?>
