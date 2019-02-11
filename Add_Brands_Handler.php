
<?php  include './Internal/Connection.php' ?>

<?php 


// Brans_Describtion
// fileToUpload

echo  $Brand_Name          =strip_tags($_POST['Brand_Name']);echo "<br>";
echo  $Brans_Describtion  =strip_tags($_POST['Brans_Describtion']);echo "<br>";

$Brans_Describtion = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $Brans_Describtion);

$Error_array = array();

$target_dir = "./Assets/Brands/";
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


// ---------------------SQL-------------------------------------------------

// INSERT INTO `Brand_Data` (`Brand_ID`, `Brand_Name`, `Brand_Describtion`, `Brand_Image_Url`) VALUES (NULL, 'ss', 'acascsac', './asc/sc/sac');

if (empty($Error_array)) {
    

    $statement_Product_Insert = $Connect->prepare("

   INSERT INTO `Brand_Data` (`Brand_ID`, `Brand_Name`, `Brand_Describtion`, `Brand_Image_Url`) VALUES (NULL, '".$Brand_Name."', '".$Brans_Describtion."', '".$target_file."')

    ");
 $statement_Product_Insert->execute();


 header('Location: ./Brands.php');
}

 