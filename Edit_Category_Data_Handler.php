


<?php  include './Internal/Connection.php' ?>
<?php


$Cat_ID = strip_tags($_POST['Cat_IDD']);
$Cat_Date = strip_tags($_POST['Cat_Date']);
$Cat_Name = strip_tags($_POST['Cat_Name']);
$Cat_Describtion = strip_tags($_POST['Cat_Describtion']);




 $statement = $Connect->prepare("UPDATE `Category_Data` SET `Cat_Name` = '".$Cat_Name."', `Cat_Describtion` = '".$Cat_Describtion."' WHERE `Category_Data`.`Cat_ID` = ".$Cat_ID."");

            $statement->execute();
    

            header('Location: ./Categories.php');



echo "UPDATE `Category_Data` SET `Cat_Name` = '".$Cat_Name."', `Cat_Describtion` = '".$Cat_Describtion."' WHERE `Category_Data`.`Cat_ID` = ".$Cat_ID."";

          ;