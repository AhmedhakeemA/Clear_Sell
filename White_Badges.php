<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<?php  include './Internal/Connection.php' ?>

<?php



// INSERT INTO `Purchasing_Trans` (`PT_ID`, `Product_ID`, `CS_ID`, `Product_Amount`, `Product_Sum_Value`, `Bill_Txrf_Number`, `Add_Date`, `Add_Time`) VALUES (NULL, '3', '1', '1', '2000', 'HJK1651651', '2018-12-03', '23:13:14');



$customer_id        = 2;
$Bill_Txrf_Number   = 'SELX2265561651';
$date               = '2018-06-05';
$Note               = 'SELX2265561651';
$Add_Time           = date("h:i:s");


  $statement_Product_Insert = $Connect->prepare("

   INSERT INTO `Purchasing_Trans` (`PT_ID`, `Product_ID`, `CS_ID`, `Product_Amount`, `Product_Sum_Value`, `Bill_Txrf_Number`, `Add_Date`, `Add_Time`) VALUES (NULL, '20', '".$customer_id."', '11', '20000', '".$Bill_Txrf_Number."', '".$date."', '".$Add_Time."')
   

    ");
 $statement_Product_Insert->execute();



// INSERT INTO `Purchasing_Trans` (`PT_ID`, `Product_ID`, `CS_ID`, `Product_Amount`, `Product_Sum_Value`, `Bill_Txrf_Number`, `Add_Date`, `Add_Time`) VALUES (NULL, '11', '2', '2', '12000', 'SELX2265561651', '2018-12-03', '16:16:25');

?>

</body>
</html>