<?php include './Internal/Connection.php';  ?>
<?php


//http://localhost/Clear_Sell/Assets/Images/h.svg


/*


INSERT INTO `Product_Data` (`Product_ID`, `NameEN`, `NameAR`, `Add_Date`, `Add_Time`, `Unit_Price`, `Amount`, `Avilable`, `Manifacuring_Date`, `Expiration_Date`, `Image_Url_B`, `Image_Url_S`, `Product_Describtion`, `Product_Note`) VALUES (NULL, 'Product_1', 'منتج1', '2018-11-15', '23:17:18', '10', '200', '1', '2018-11-14', '2018-11-30', './Clear_Sell/Assets/Images/h.svg', './Clear_Sell/Assets/Images/h.svg', 'Good_ product', 'added ny admin ');



*/


// INSERT INTO `Product_Data` (`Product_ID`, `NameEN`, `NameAR`, `Add_Date`, `Add_Time`, `Unit_Price`, `Amount`, `Avilable`, `Manifacuring_Date`, `Expiration_Date`, `Image_Url_B`, `Image_Url_S`, `Product_Describtion`, `Product_Note`) VALUES (NULL, 'Product_2', 'منتج1', '2018-11-15', '23:17:18', '20', '200', '1', '2018-11-14', '2018-11-30', './Assets/Images/product_2.png', './Assets/Images/product_2.png', 'Good_ product', 'added ny admin ');



// INSERT INTO `Product_Data` (`Product_ID`, `NameEN`, `NameAR`, `Add_Date`, `Add_Time`, `Unit_Price`, `Amount`, `Avilable`, `Manifacuring_Date`, `Expiration_Date`, `Image_Url_B`, `Image_Url_S`, `Product_Describtion`, `Product_Note`) VALUES (NULL, 'Product_2', 'منتج1', '2018-11-15', '23:17:18', '30', '200', '1', '2018-11-14', '2018-11-30', './Assets/Images/product_3.jpeg', './Assets/Images/product_3.jpeg', 'Good_ product', 'added ny admin ');



// INSERT INTO `Category_Data` (`Cat_ID`, `Cat_Name`, `Cat_Describtion`) VALUES (NULL, 'Electronics', 'have all electronics devices');


// INSERT INTO `Product_Data` (`Product_ID`, `NameEN`, `NameAR`, `Add_Date`, `Add_Time`, `Unit_Price`, `Amount`, `Avilable`, `Manifacuring_Date`, `Expiration_Date`, `Image_Url_B`, `Image_Url_S`, `Product_Describtion`, `Product_Note`, `Brand_ID`) VALUES (NULL, 'P20 Lite', 'P20 Lite', '2018-11-01', '00:15:00', '200.5', '20', '1', '2018-11-01', '2018-11-15', './Assets/Images/P20Lite.jpeg', './Assets/Images/P20Lite.jpeg', '20 pxl camera', 'Added by hakeem for testting ', '1');


// $input = array("./Assets/Images/product_3.jpeg", "./Assets/Images/product_2.png", "./Assets/Images/h.svg", "./Assets/Images/product_x.png", "./Assets/Images/product_y.jpeg");
// $rand_keys = array_rand($input, 2);
// // echo $input[$rand_keys[1]] . "\n";

// $D1=$input[$rand_keys[1]];

// $input_2 = array("15","52","22","32","22","30","11");

// $rand_keys_2 = array_rand($input_2, 2);

// $D2=$input_2[$rand_keys_2[1]];
// // echo $input_2[$rand_keys_2[1]] . "\n";



//  $statement = $Connect->prepare("INSERT INTO `Product_Data` (`Product_ID`, `NameEN`, `NameAR`, `Add_Date`, `Add_Time`, `Unit_Price`, `Amount`, `Avilable`, `Manifacuring_Date`, `Expiration_Date`, `Image_Url_B`, `Image_Url_S`, `Product_Describtion`, `Product_Note`) VALUES (NULL, 'Product_".$D2."', 'منتج".$D2."', '2018-11-15', '23:17:18', '".$D2."', '200', '1', '2018-11-14', '2018-11-30', '".$D1."', '".$D1."', 'Good_ product', 'added ny admin ')");
//  $statement->execute();


// INSERT INTO `Exer_Client` (`Cat_ID`, `Product_ID`) VALUES ('1', '53');
?>

<?php  include './Internal/Connection.php' ?>
<?php 

//  $statement = $Connect->prepare("SELECT * FROM `Product_Data`");
//             $statement->execute();

//             $count = $statement->rowCount();

// //              $R = $statement->fetchAll( PDO::FETCH_ASSOC );

// //              foreach ($R as $row_inside) {


// // echo  '"'.$row_inside['Product_ID'].'"'.',';
// // echo "<br>";

// //              }



// $input = array("1",
// "2",
// "4",
// "31",
// "32",
// "33",
// "34",
// "35",
// "36",
// "37",
// "38",
// "39",
// "40",
// "41",
// "42",
// "43",
// "44",
// "45",
// "46",
// "47",
// "48",
// "49",
// "50",
// "51",
// "52",
// "53",
// "54",
// "55",
// "56",);
// $rand_keys = array_rand($input, 2);
// // echo $input[$rand_keys[1]] . "\n";

// $D1=$input[$rand_keys[1]];

// $input_2 = array("1","2","3");

// $rand_keys_2 = array_rand($input_2, 2);

// $D2=$input_2[$rand_keys_2[1]];
// // echo $input_2[$rand_keys_2[1]] . "\n";



//  $statement = $Connect->prepare("INSERT INTO `Exer_Client` (`Cat_ID`, `Product_ID`) VALUES ('".$D2."', '".$D1."')");
//  $statement->execute();


// // INSERT INTO `Exer_Client` (`Cat_ID`, `Product_ID`) VALUES ('1', '53');

          







// INSERT INTO `Product_Data` (`Product_ID`, `NameEN`, `NameAR`, `Add_Date`, `Add_Time`, `Unit_Price`, `Amount`, `Avilable`, `Manifacuring_Date`, `Expiration_Date`, `Image_Url_B`, `Image_Url_S`, `Product_Describtion`, `Product_Note`, `Brand_ID`) VALUES (NULL, 'P20 Lite', 'P20 Lite', '2018-11-01', '00:15:00', '200.5', '20', '1', '2018-11-01', '2018-11-15', './Assets/Images/P20Lite.jpeg', './Assets/Images/P20Lite.jpeg', '20 pxl camera', 'Added by hakeem for testting ', '1');




//  INSERT INTO `Product_Data` (`Product_ID`, `NameEN`, `NameAR`, `Add_Date`, `Add_Time`, `Unit_Price`, `Amount`, `Avilable`, `Manifacuring_Date`, `Expiration_Date`, `Image_Url_B`, `Image_Url_S`, `Product_Describtion`, `Product_Note`, `Brand_ID`) VALUES (NULL, 'Samsung_J7_Plus', 'Samsung_J7_Plus', '2018-11-01', '00:15:00', '3000.5', '20', '1', '2018-11-01', '2018-11-15', './Assets/Images/Samsung_J7_Plus.jpeg', './Assets/Images/Samsung_J7_Plus.jpeg', '20 pxl camera 4GB Ram', 'Added by hakeem for testting ', '6'); -->





// INSERT INTO `Product_Data` (`Product_ID`, `NameEN`, `NameAR`, `Add_Date`, `Add_Time`, `Unit_Price`, `Amount`, `Avilable`, `Manifacuring_Date`, `Expiration_Date`, `Image_Url_B`, `Image_Url_S`, `Product_Describtion`, `Product_Note`, `Brand_ID`) VALUES (NULL, 'Xperia-r1', 'Xperia-r1', '2018-11-01', '00:15:00', '6000.5', '20', '1', '2018-11-01', '2018-11-15', './Assets/Images/sony-xperia-r1-r1-plus.jpg', './Assets/Images/sony-xperia-r1-r1-plus.jpg', '20 pxl camera 4GB Ram', 'Added by hakeem for testting ', '2');


// INSERT INTO `Product_Data` (`Product_ID`, `NameEN`, `NameAR`, `Add_Date`, `Add_Time`, `Unit_Price`, `Amount`, `Avilable`, `Manifacuring_Date`, `Expiration_Date`, `Image_Url_B`, `Image_Url_S`, `Product_Describtion`, `Product_Note`, `Brand_ID`) VALUES (NULL, 'mi_mix-3', 'mi_mix-3', '2018-11-01', '00:15:00', '7000.5', '20', '1', '2018-11-01', '2018-11-15', './Assets/Images/Xiaomi_mi_mix.jpeg', './Assets/Images/Xiaomi_mi_mix.jpeg', '20 pxl camera 4GB Ram', 'Added by hakeem for testting ', '5');



 // sony-xperia-r1-r1-plus.jpg


 // Xiaomi_mi_mix.jpeg 

// `Add_Date`, `Add_Time`

 // $statement_Get_ID = $Connect->prepare("SELECT * FROM `Product_Data` WHERE `Add_Date` = '2018-11-01' AND `Add_Time` = '00:15:00' AND `NameEN` = 'P20 Lite'");
 //             $statement_Get_ID->execute();

 //             $count = $statement_Get_ID->rowCount();

 //                           $R_ID = $statement_Get_ID->fetchAll( PDO::FETCH_ASSOC );

 //              foreach ($R_ID as $row_inside_ID) {


 // echo  '"'.$row_inside_ID['Product_ID'].'"'.',';
 // echo "<br>";

 //              }