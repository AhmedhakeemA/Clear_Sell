<?php



// UPDATE `Product_Data` SET `NameEN` = 'mi_mix-3f', `NameAR` = 'mi_mix-3f', `Add_Date` = '2018-11-06', `Add_Time` = '16:15:00', `Unit_Price` = '7001.5', `Amount` = '21', `Manifacuring_Date` = '2018-11-06', `Expiration_Date` = '2018-11-20', `Image_Url_B` = './Assets/Images/Xiaomi1_mi_mix.jpeg', `Image_Url_S` = './Assets/Images/Xiaomi1_mi_mix.jpeg', `Product_Describtion` = '20 pxl camera 4GB1 Ram', `Product_Note` = 'Added by hakeem for1 testting ' WHERE `Product_Data`.`Product_ID` = 5;



 include './Internal/Connection.php' ?>

<?php



$Error_array = array();



echo "<br>";

echo  $Product_ID    =strip_tags($_POST['Product_ID']);echo "<br>";
echo  $Expiration_date    =strip_tags($_POST['Expiration_date']);echo "<br>";
echo  $Manifactring_date  =strip_tags($_POST['Manifactring_date']);echo "<br>";
echo  $Category           =strip_tags($_POST['Category']);echo "<br>";
echo  $Description        =strip_tags($_POST['Description']);echo "<br>";
echo  $Admin_Note         =strip_tags($_POST['Admin_Note']);echo "<br>";
echo  $Amount             =strip_tags($_POST['Amount']);echo "<br>";
echo  $Unit_Price         =strip_tags($_POST['Unit_Price']);echo "<br>";
echo  $Name_AR            =strip_tags($_POST['Name_AR']);echo "<br>";
echo  $Name_EN            =strip_tags($_POST['Name_EN']);echo "<br>";
echo  $Brand              =strip_tags($_POST['Brand']);echo "<br>";
// echo " here ids from POST  :  ". $img_upload              =strip_tags($_POST['img_upload']);echo "<br>";
// echo  $fileToUpload       =strip_tags($_POST['fileToUpload']);echo "<br>";
// echo  $fileToUpload_2       =strip_tags($_FILES["fileToUpload"]["name"]);echo "<br>";
echo  $Add_Date = date("Y-m-d"); echo "<br>";
echo  $Add_Time = date("h:i:s"); echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

echo 'number_Check Amount :  '. $number_Check = is_numeric($Amount);echo "<br>";
echo 'number_Check Unit_price :  '.$number_Check_unit = is_numeric($Unit_Price);echo "<br>";
echo 'validate_Date_Man :  '.$validate_Date_Man =validateDate($Manifactring_date);echo "<br>";
echo 'validate_Date_Expr :  '.$validate_Date_Expr =validateDate($Expiration_date);echo "<br>";




function validateDate( $str ) {
    try {
        $dt = new DateTime( trim($str) );
    }
    catch( Exception $e ) {
        return false;
    }
    $month = $dt->format('m');
    $day = $dt->format('d');
    $year = $dt->format('Y');
    if( checkdate($month, $day, $year) ) {
        return true;
    }
    else {
        return false;
    }
}




if ($number_Check == 0) {
	array_push($Error_array,"Amount not number");
}

if ($number_Check_unit == 0) {
	array_push($Error_array,"Unit price not number");
}

if ($validate_Date_Man == 0) {
	array_push($Error_array,"Manifacture data format Error");
}

if ($validate_Date_Expr == 0) {
	array_push($Error_array,"Expiration data format Error");
}








if (sizeof($Error_array) > 0) {
	

	foreach ($Error_array as  $value) {
	echo $value;
	echo "<br>";
     }


     session_start();
$_SESSION['counter_Errors']=$Error_array;


}




function validate_IMG( $IMK ,$Connect) {

$statement = $Connect->prepare("SELECT * FROM `Product_Data` WHERE `Image_Url_B` = '".$IMK."'");
            $statement->execute();

            $count = $statement->rowCount();
    if($count  > 0 ) {
        return true;
    }
    else {
        // return false;
        return 0;
    }
}







if(sizeof($Error_array) == 0){



$check  =  validate_IMG ($img_upload,$Connect);



if ($check == 0) {

// ---------------------Uploader-------------------------------------------------

	$target_dir = "./Assets/Images/";
  $target_file = $target_dir .  date('d_m_Y_H_i_s') . '_'.  basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
@$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
       // echo "File is not an image.";
        $uploadOk = 0;
        array_push($Error_array,"File is not an image.");
    }
}
// Check if file already exists
if (file_exists(@$target_file)) {
    // echo "Sorry, file already exists.";
    $uploadOk = 0;
    array_push($Error_array,"Sorry, file already exists.");
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    // echo "Sorry, your file is too large.";
    $uploadOk = 0;
    array_push($Error_array,"Sorry, your file is too large.");
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
      array_push($Error_array,"Sorry, only JPG, JPEG, PNG & GIF files are allowed.");

}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
        
    }
}
// ---------------------Uploader-------------------------------------------------






// ---------------------SQL-------------------------------------------------


 $statement_Product_Insert = $Connect->prepare("

UPDATE `Product_Data` SET `NameEN` = '".$Name_EN."', `NameAR` = '".$Name_AR."', `Add_Date` = '".$Add_Date."', `Add_Time` = '".$Add_Time."', `Unit_Price` = '".$Unit_Price."', `Amount` = '".$Amount."', `Manifacuring_Date` = '".$Manifactring_date."', `Expiration_Date` = '".$Expiration_date."', `Image_Url_B` = '".$target_file."', `Image_Url_S` = '".$target_file."', `Product_Describtion` = '".$Description."', `Product_Note` = '".$Admin_Note."' WHERE `Product_Data`.`Product_ID` = ".$Product_ID."

    ");
 $statement_Product_Insert->execute();




 $statement_Cat = $Connect->prepare("UPDATE `Exer_Client` SET `Cat_ID` = '".$Category."', `Product_ID` = '".$Product_ID."' WHERE `Exer_Client`.`Cat_ID` = ".$Category." AND `Exer_Client`.`Product_ID` = ".$Product_ID."");
 $statement_Cat->execute();



// ---------------------SQL-------------------------------------------------
	


}
elseif($check == 1){

//hena law al sora mawgoda ****************************************
//we ahanasra3mel ally hayege men al $_POST['IMg']	


// ---------------------SQL-------------------------------------------------

 $statement_Product_Insert = $Connect->prepare("

UPDATE `Product_Data` SET `NameEN` = '".$Name_EN."', `NameAR` = '".$Name_AR."', `Add_Date` = '".$Add_Date."', `Add_Time` = '".$Add_Time."', `Unit_Price` = '".$Unit_Price."', `Amount` = '".$Amount."', `Manifacuring_Date` = '".$Manifactring_date."', `Expiration_Date` = '".$Expiration_date."', `Image_Url_B` = '".$target_file."', `Image_Url_S` = '".$target_file."', `Product_Describtion` = '".$Description."', `Product_Note` = '".$Admin_Note."' WHERE `Product_Data`.`Product_ID` = ".$Product_ID."

    ");
 $statement_Product_Insert->execute();








 $statement_Cat = $Connect->prepare("UPDATE `Exer_Client` SET `Cat_ID` = '".$Category."', `Product_ID` = '".$Product_ID."' WHERE `Exer_Client`.`Cat_ID` = ".$Category." AND `Exer_Client`.`Product_ID` = ".$Product_ID."");
 $statement_Cat->execute();


// ---------------------SQL-------------------------------------------------



}







	
}

header('Location: ./index.php');

