<?php  include './Internal/Connection.php' ?>
<?php

// $txrf = 'SELX200';
$txrf = $_POST['Txrf'];

// SELECT `PT_ID`,`Product_Amount`,`Product_Sum_Value` FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number`='SELX200'

  		 $statement_Product_Amount_DB = $Connect->prepare('

  		 	SELECT `PT_ID`,`Product_Amount`,`Product_Sum_Value`,`Product_ID` FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number`="'.$txrf.'"
  		 	');   
         $statement_Product_Amount_DB->execute();
         $result_From_DB_ALL = $statement_Product_Amount_DB->fetchAll( PDO::FETCH_ASSOC );

         foreach ($result_From_DB_ALL as $Row) {
         	
         $Product_Amount    =	$Row['Product_Amount'];
         $Product_Sum_Value =	$Row['Product_Sum_Value'];
         $PT_ID             =	$Row['PT_ID'];
         $Product_ID        =	$Row['Product_ID'];



            $statement_Product_Amount_DB_X = $Connect->prepare('
  		 	SELECT `Amount` FROM `Product_Data` WHERE `Product_Data`.`Product_ID` = '.$Product_ID
  		 );   
         $statement_Product_Amount_DB_X->execute();
         $result_From_DB = $statement_Product_Amount_DB_X->fetch( PDO::FETCH_ASSOC );
  
         $Updated_Value  =$Product_Amount + $result_From_DB['Amount'];

         $statement_Product_Amount_Voucher_Update = $Connect->prepare('
           UPDATE `Product_Data` SET `Amount` ='.$Updated_Value.' WHERE `Product_ID` ='.$Product_ID.' 
         	');   
         $statement_Product_Amount_Voucher_Update->execute();


         
         }
  		 


    $statement_Product_Delete = $Connect->prepare('

  DELETE FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number`="'.$txrf.'"
   

    ');
 $statement_Product_Delete->execute();
  		 
  		// fwrite($myfile,'  ID:  '.$value[0]);
  		// fwrite($myfile,'  Name_EN:  '.$value[1]);
  		// fwrite($myfile,'  Name_AR:   '.$value[2]);
  		// fwrite($myfile,'  Unit_Price:  '.$value[3]);
  		// fwrite($myfile,'  Category:  '.$value[4]);
  		// fwrite($myfile,'  Amount:  '.$value[5]);
  		// fwrite($myfile,'  sum_value:  '.$value[6]);
  		// fwrite($myfile, "\n");
  		// fwrite($myfile, "\n");
    //     fwrite($myfile, "\n");

// SELECT `Product_Amount` FROM `Purchasing_Trans` WHERE `Purchasing_Trans`.`PT_ID` = 12;
// UPDATE `Purchasing_Trans` SET `Product_Amount` = '5' WHERE `Purchasing_Trans`.`PT_ID` = 12;
 
  		 // $statement_Product_Amount_DB = $Connect->prepare('
  		 // 	SELECT `Product_Amount` FROM `Purchasing_Trans` WHERE `Purchasing_Trans`.`PT_ID` = '.$value[0].''
  		 // );   
     //     $statement_Product_Amount_DB->execute();
     //     $result_From_DB = $statement_Product_Amount_DB->fetchAll( PDO::FETCH_ASSOC );
     //     $value_From_DB  = $result_From_DB['Product_Amount'];
     //     $Updated_Value  =$value_From_DB + $value[5];

     //     $statement_Product_Amount_Voucher_Update = $Connect->prepare('
     //       UPDATE `Purchasing_Trans` SET `Product_Amount` = '.$Updated_Value.' WHERE `Purchasing_Trans`.`PT_ID` = '.$value[0].'
     //     	');   
     //     $statement_Product_Amount_Voucher_Update->execute();


 