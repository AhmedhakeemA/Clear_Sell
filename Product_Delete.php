


<?php  include './Internal/Connection.php' ?>
<?php

$Product_ID = strip_tags($_POST['iDD']);



 // "DELETE FROM `Exer_Client` WHERE `Exer_Client`.`Product_ID` = 10"


           $statement_C = $Connect->prepare("DELETE FROM `Exer_Client` WHERE `Exer_Client`.`Product_ID` = ".$Product_ID ."");
            $statement_C->execute();


           $statement = $Connect->prepare("DELETE FROM `Product_Data` WHERE `Product_Data`.`Product_ID` = ".$Product_ID ."");
            $statement->execute();
    

            header('Location: ./index.php');


           