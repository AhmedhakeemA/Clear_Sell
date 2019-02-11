


<?php  include './Internal/Connection.php' ?>
<?php

$Cat_ID = strip_tags($_POST['iDD']);



            $statement = $Connect->prepare("DELETE FROM `Category_Data` WHERE `Category_Data`.`Cat_ID` = ".$Cat_ID ."");
            $statement->execute();
    

            header('Location: ./Categories.php');


           