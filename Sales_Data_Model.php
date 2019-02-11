<?php


// SELECT `PT_ID`,(SELECT DISTINCT Product_Data.NameEN FROM `Product_Data` WHERE `Product_ID` = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS p_Name,`Product_ID`,`CS_ID`,`Product_Amount`,`Product_Sum_Value`,`Bill_Txrf_Number`,`Add_Date`,`Add_Time` FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number` = "SELX21231231232"

 include './Internal/Connection.php'; 


 $Txrf = $_POST['Txrf'];

$data = array();


  // SELECT `PT_ID`,`Product_ID`,`CS_ID`,`Product_Amount`,`Product_Sum_Value`,`Bill_Txrf_Number`,`Add_Date`,`Add_Time` FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number` = "'.$Txrf.'"

 $statement = $Connect->prepare('

SELECT `PT_ID`, (SELECT DISTINCT Category_Data.Cat_Name  FROM Product_Data  JOIN Exer_Client ON Product_Data.Product_ID=Exer_Client.Product_ID JOIN Category_Data ON Category_Data.Cat_ID=Exer_Client.Cat_ID WHERE Product_Data.Product_ID = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS Category,(SELECT DISTINCT Brand_Data.Brand_Name FROM Product_Data JOIN Brand_Data ON Brand_Data.Brand_ID=Product_Data.Brand_ID  WHERE Product_Data.Product_ID = `Purchasing_Trans`.`Product_ID`  LIMIT 1) AS Brand,(SELECT DISTINCT Product_Data.NameAR FROM `Product_Data` WHERE `Product_ID` = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS P_AR_Name,(SELECT DISTINCT Product_Data.NameEN FROM `Product_Data` WHERE `Product_ID` = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS P_AR_Name,(SELECT DISTINCT Product_Data.Unit_Price FROM `Product_Data` WHERE `Product_ID` = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS P_Unit_Price,`Product_ID`,`CS_ID`,`Product_Amount`,`Product_Sum_Value`,`Bill_Txrf_Number`,`Add_Date`,`Add_Time` FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number` = "'.$Txrf.'"

  ');
            $statement->execute();

            $count = $statement->rowCount();

             $data['data_vou'] = $statement->fetchAll( PDO::FETCH_ASSOC );

             // foreach ($R as $row_inside) {

             //          $data['PT_ID']= $row_inside['PT_ID'];
             //          $data['Product_ID']= $row_inside['Product_ID'];
             //          $data['CS_ID']= $row_inside['CS_ID'];
             //          $data['Product_Amount']= $row_inside['Product_Amount'];
             //          $data['Product_Sum_Value']= $row_inside['Product_Sum_Value'];
                  
             //     }



$statement_Date = $Connect->prepare('

  SELECT `Add_Date`,`Add_Time`,`Note`,`Bill_Txrf_Number` FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number` = "'.$Txrf.'"

  ');
            $statement_Date->execute();


             $R_Date = $statement_Date->fetch( PDO::FETCH_ASSOC );




$statement_Voucher = $Connect->prepare('

  SELECT SUM(`Product_Sum_Value`) AS Voucher_Val FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number` = "'.$Txrf.'"

  ');
            $statement_Voucher->execute();


             $R_Voucher = $statement_Voucher->fetch( PDO::FETCH_ASSOC );


$data['Add_Date']=$R_Date['Add_Date'];
$data['Add_Time']=$R_Date['Add_Time'];
$data['Note']=$R_Date['Note'];
$data['Bill_Txrf_Number']=$R_Date['Bill_Txrf_Number'];
$data['Voucher_Val']=$R_Voucher['Voucher_Val'];


$statement_CST = $Connect->prepare('SELECT `CS_ID` FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number` = "'.$Txrf.'"');
            $statement_CST->execute();
             $R_CST = $statement_CST->fetch( PDO::FETCH_ASSOC );

$IDXX=$R_CST['CS_ID'];




$statement_Name = $Connect->prepare('SELECT `CS_Name` FROM `Customers_Data` WHERE `CS_ID` ='.$IDXX);
            $statement_Name->execute();
             $R_Namex = $statement_Name->fetch(PDO::FETCH_ASSOC);


  $data['Cx_Name']=$R_Namex['CS_Name'];



                 	echo json_encode($data);



// $R_Date['Add_Date'];
// $R_Date['Add_Time'];





// SELECT `PT_ID`,`Product_ID`,`CS_ID`,`Product_Amount`,`Product_Sum_Value`,`Bill_Txrf_Number`,`Add_Date`,`Add_Time` FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number` = "SELX2265561651"

// SELECT `Add_Date`,`Add_Time` FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number` = "SELX2265561651"


 // SELECT SUM(`Product_Sum_Value`) AS Voucher_Val FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number` = "SELX2265561651"


                  // SELECT `CS_ID` FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number` = "SELX2265561651"



 //                  SELECT Category_Data.Cat_Name , Brand_Data.Brand_Name FROM Product_Data JOIN Brand_Data ON Brand_Data.Brand_ID=Product_Data.Brand_ID JOIN Exer_Client ON Product_Data.Product_ID=Exer_Client.Product_ID JOIN Category_Data ON Category_Data.Cat_ID=Exer_Client.Cat_ID WHERE Product_Data.Product_ID = 3


 //                    //category

 //                  (SELECT DISTINCT Category_Data.Cat_Name  FROM Product_Data  JOIN Exer_Client ON Product_Data.Product_ID=Exer_Client.Product_ID JOIN Category_Data ON Category_Data.Cat_ID=Exer_Client.Cat_ID WHERE Product_Data.Product_ID = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS Category

 //                    //Brand

 //                  (SELECT DISTINCT Brand_Data.Brand_Name FROM Product_Data JOIN Brand_Data ON Brand_Data.Brand_ID=Product_Data.Brand_ID  WHERE Product_Data.Product_ID = `Purchasing_Trans`.`Product_ID`  LIMIT ) AS Brand



 // (SELECT DISTINCT Category_Data.Cat_Name  FROM Product_Data  JOIN Exer_Client ON Product_Data.Product_ID=Exer_Client.Product_ID JOIN Category_Data ON Category_Data.Cat_ID=Exer_Client.Cat_ID WHERE Product_Data.Product_ID = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS Category,(SELECT DISTINCT Brand_Data.Brand_Name FROM Product_Data JOIN Brand_Data ON Brand_Data.Brand_ID=Product_Data.Brand_ID  WHERE Product_Data.Product_ID = `Purchasing_Trans`.`Product_ID`  LIMIT ) AS Brand,                  



                  // SELECT `PT_ID`, (SELECT DISTINCT Category_Data.Cat_Name  FROM Product_Data  JOIN Exer_Client ON Product_Data.Product_ID=Exer_Client.Product_ID JOIN Category_Data ON Category_Data.Cat_ID=Exer_Client.Cat_ID WHERE Product_Data.Product_ID = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS Category,(SELECT DISTINCT Brand_Data.Brand_Name FROM Product_Data JOIN Brand_Data ON Brand_Data.Brand_ID=Product_Data.Brand_ID  WHERE Product_Data.Product_ID = `Purchasing_Trans`.`Product_ID`  LIMIT 1) AS Brand,(SELECT DISTINCT Product_Data.NameAR FROM `Product_Data` WHERE `Product_ID` = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS P_AR_Name,(SELECT DISTINCT Product_Data.NameEN FROM `Product_Data` WHERE `Product_ID` = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS P_AR_Name,(SELECT DISTINCT Product_Data.Unit_Price FROM `Product_Data` WHERE `Product_ID` = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS P_Unit_Price,`Product_ID`,`CS_ID`,`Product_Amount`,`Product_Sum_Value`,`Bill_Txrf_Number`,`Add_Date`,`Add_Time` FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number` = "SELX21231231232"