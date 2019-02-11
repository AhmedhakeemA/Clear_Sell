
<?php  include './Internal/Connection.php' ?>
<?php

$Cat_Name        = strip_tags($_POST['Cat_Name']);
$Cat_Describtion = strip_tags($_POST['Cat_Describtion']);
$Add_Date = date("Y-m-d h:i:s");


            $statement = $Connect->prepare("INSERT INTO `Category_Data` (`Cat_ID`, `Cat_Name`, `Cat_Describtion`, `Add_Date`) VALUES (NULL, '".$Cat_Name."', '".$Cat_Describtion."', '".$Add_Date."')");
            $statement->execute();
    

            header('Location: ./Categories.php');