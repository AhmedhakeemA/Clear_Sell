<?php  include './Internal/Connection.php' ?>

<?php

// DELETE FROM `Purchasing_Trans` WHERE `Purchasing_Trans`.`PT_ID` = 1
// DELETE FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number`='SELX1651651'

$Bill_Txrf_Number   = strip_tags($_POST['Bill_Txrf_Number']);


   $statement_Product_Delete = $Connect->prepare('

  DELETE FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number`="'.$Bill_Txrf_Number.'"
   

    ');
 $statement_Product_Delete->execute();

 





$customer_id        = strip_tags($_POST['customer']);

$date               = strip_tags($_POST['date']);
$Note               = strip_tags($_POST['Note']);
$Add_Time           = date("h:i:s");






// if(is_array($data) || is_object($data)){



  $test = utf8_encode($_POST['Table_data']); // Don't forget the encoding
  $data = json_decode($test);


  foreach ($data as  $value) {

  	// for ($i=0; $i < count($value); $i++) { 

  		 
  		fwrite($myfile,'  ID:  '.$value[0]);
  		fwrite($myfile,'  Name_EN:  '.$value[1]);
  		fwrite($myfile,'  Name_AR:   '.$value[2]);
  		fwrite($myfile,'  Unit_Price:  '.$value[3]);
  		fwrite($myfile,'  Category:  '.$value[4]);
  		fwrite($myfile,'  Amount:  '.$value[5]);
  		fwrite($myfile,'  sum_value:  '.$value[6]);
  		fwrite($myfile, "\n");
  		fwrite($myfile, "\n");

 

 fwrite($myfile, "\n");

 
  		 $statement_Product_Insert = $Connect->prepare("

   INSERT INTO `Purchasing_Trans` (`PT_ID`, `Product_ID`, `CS_ID`, `Product_Amount`, `Product_Sum_Value`, `Bill_Txrf_Number`, `Add_Date`, `Add_Time`,`Note`) VALUES (NULL, '".$value[0]."', '".$customer_id."', '".$value[5]."', '".$value[6]."', '".$Bill_Txrf_Number."', '".$date."', '".$Add_Time."','".$Note."')
   

    ");
 $statement_Product_Insert->execute();

 


  }
  //}
  















//  $myfile = fopen("Testing.txt", "w") or die("Unable to open file!");

// fwrite($myfile, $_POST['customer']);
// fwrite($myfile, "\n");
// fwrite($myfile, $_POST['Bill_Txrf_Number']);
// fwrite($myfile, "\n");
// fwrite($myfile, $_POST['date']);
// fwrite($myfile, "\n");
// fwrite($myfile, $_POST['Note']);

// // fwrite($myfile, var_dump(json_decode($_POST['Table_data'])));
//   fwrite($myfile, "\n");
//   //fwrite($myfile, $_POST['Table_data']);
//   fwrite($myfile, "\n");

//   fwrite($myfile,  $Add_Time );
//   fwrite($myfile, "\n");
//   fwrite($myfile, "------------------------***----------");
//   fwrite($myfile, "------------------------***----------");
//  fwrite($myfile, "\n");
//  fwrite($myfile, "\n");


//   $test = utf8_encode($_POST['Table_data']); // Don't forget the encoding
//   $data = json_decode($test);


//   foreach ($data as  $value) {

//   	// for ($i=0; $i < count($value); $i++) { 

  		 
//   		fwrite($myfile,'  ID:  '.$value[0]);
//   		fwrite($myfile,'  Name_EN:  '.$value[1]);
//   		fwrite($myfile,'  Name_AR:   '.$value[2]);
//   		fwrite($myfile,'  Unit_Price:  '.$value[3]);
//   		fwrite($myfile,'  Category:  '.$value[4]);
//   		fwrite($myfile,'  Amount:  '.$value[5]);
//   		fwrite($myfile,'  sum_value:  '.$value[6]);
//   		fwrite($myfile, "\n");
//   		fwrite($myfile, "\n");
//   	// }

//   // foreach ($value as  $value_inside) {

 
//   //  fwrite($myfile,'  ,  '.$value_inside );


 
//   // }
//  fwrite($myfile, "\n");

//   }
  




//  fclose($myfile);
//  fwrite($myfile, "\n");
//   fwrite($myfile, "\n");
//  fwrite($myfile, "------------------------***----------");
//   fwrite($myfile, "------------------------***----------");
//   fwrite($myfile, "------------------------***----------");

  header('Location: ./Sales.php');