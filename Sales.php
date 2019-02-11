<?php  include './Internal/Connection.php' ?>
<?php 
clearstatcache();
 // $statement = $Connect->prepare("SELECT * FROM `Product_Data`");
 //            $statement->execute();

 //            $count = $statement->rowCount();

 //             $R = $statement->fetchAll( PDO::FETCH_ASSOC );

          



//how many results per page 
$results_per_page = 10;

//get number of results in DB

 $statement = $Connect->prepare("SELECT * FROM `Purchasing_Trans`");
 $statement->execute();
 $number_of_results = $statement->rowCount();

//get number of total pages avilable 

$number_of_pages = ceil( $number_of_results / $results_per_page);

//konw what page number visitor on now 

if (!isset($_GET['page'])) {
$page=1;
}
else{
$page=$_GET['page'];

}

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

// retrieve selected results from database and display them on page
$sql='SELECT * FROM `Purchasing_Trans` LIMIT ' . $this_page_first_result . ',' .  $results_per_page;

$statement_IN = $Connect->prepare($sql);
 $R = $statement_IN->execute();

 $R = $statement_IN->fetchAll( PDO::FETCH_ASSOC );



?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DashBoard</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
      <script src="./Scripts/jquery-3.3.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<link href="css/Padges.css" rel="stylesheet">
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

    <style type="text/css">html{zoom :90%;}</style>
        <style type="text/css">
   th{
background-color: #36304A;
color: white;
padding: 2px;

   }
   .float{
  position:fixed;
  width:80px;
  height:80px;
  bottom:100px;
  right:40px;
  background-color:#36304A;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  box-shadow: 2px 2px 3px #999;
}

.my-float{
  margin-top:33px;

}
    </style>
  
</head>
<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
          
<!-- side bar -->

  <?php  include 'Side_Nav.php';  ?>

        </div>
        <!-- /#sidebar-wrapper -->

        <?php include './uppernav.php';  ?>




        <!-- Page Content -->
        <div id="page-content-wrapper">

       <?php include './Padges_Color.php'; ?>



<!-- Heart Container -->

    <div class="container-fluid"> 

<br>
<br>
<br>
<div class="table-responsive text-wrap" style="">

  <table class="table table-bordered" style="margin-right: -15px;
    margin-left: -1px;">
    <thead>
      <tr>
        <th scope="col">#</th>  
        <th scope="col">Customer</th>
        <th scope="col">Products_Amounts</th>
        <th scope="col">Bill_Sum_Value</th>
        <th scope="col">Txrf_Serial</th>
        <th scope="col">Add_Date</th>
        <th scope="col">Add_Time</th>
        <!-- <th scope="col">OPS</th> -->
      </tr>
    </thead>
    <tbody id="myTable">



<?php  


$Tx_RF = array();

$sql_All='SELECT DISTINCT `Bill_Txrf_Number` FROM `Purchasing_Trans`';

$statement_All = $Connect->prepare($sql);
 $R_All = $statement_All->execute();

 $R_All = $statement_All->fetchAll( PDO::FETCH_ASSOC );
foreach ($R_All as $value_zzz) {
   

   array_push($Tx_RF,$value_zzz['Bill_Txrf_Number']);
}
$array = array_unique($Tx_RF);
foreach ($array as $TxRFX) {

// echo $TxRFX;
// echo "<br>";

$sql_Inside='SELECT SUM(`Product_Amount`) AS Product_Amount,(SELECT `Add_Date` FROM `Purchasing_Trans` LIMIT 1) AS Datex,(SELECT `Add_Time` FROM `Purchasing_Trans` LIMIT 1) AS Timex , SUM(`Product_Sum_Value`) AS bill_value ,`CS_ID` FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number` = "'.$TxRFX.'" GROUP BY `CS_ID`';

$statement_Inside = $Connect->prepare($sql_Inside);
 $R_Inside = $statement_Inside->execute();

 $R_Inside = $statement_Inside->fetchAll( PDO::FETCH_ASSOC );

foreach ($R_Inside as $Data_Ya) {

    // echo $Data_Ya['Product_Amount'];
    // echo "<br>";
    // echo "<br>";

    // echo $Data_Ya['CS_ID'];
    // echo "<br>";

    // echo $Data_Ya['Datex'];
    // echo "<br>";

    // echo $Data_Ya['Timex'];
    // echo "<br>";

    // echo $Data_Ya['bill_value'];
    // echo "<br>";

echo '<tr>
<td scope="row">3</td>
<td>'.$Data_Ya['CS_ID'].'</td>
<td>'.$Data_Ya['Product_Amount'].'</td>
<td>'.$Data_Ya['bill_value'].'</td>
<td>'.$TxRFX.'</td>
<td>'.$Data_Ya['Datex'].'</td>
<td>'.$Data_Ya['Timex'].'</td>
<td>
    <div class="row">
    <div class="col-sm" style="margin-left : -5px;">
   
<button  value="'.$TxRFX.'" onclick="Get_Data_Sale(this.value)"  id="bux" name="action_data"  class="btn btn-info"><i class="fa fa-file-text-o"></i></button>
<input type="hidden" name="thrfx" id="hi" >

    </div>
    <div class="col-sm" style="margin-left : -50px;">
   <form action="./Edit_Selling.php" method="POST"> 
<input type="hidden" name="TxRFX" id="TxRFX" value="'.$TxRFX.'">
<!--  <button type="input"  name="action" value="Update" class="btn btn-warning">D</button> -->
<button type="input" name="action" value="Edit" class="btn btn-danger"><i class="fa fa-edit"></i></button>
</form> 
    </div>
    <div class="col-sm" style="margin-left : -48px;">
<button value="'.$TxRFX.'" onclick="Delete_Sale(this.value)" class="btn btn-dark"><i class="fa fa-close"></i></button>

</div>
</div>
</td>
</tr>';


}
  



}


 


?>

<!-- <tr>
<td scope="row">3</td>
<td>AHmed Hassan yassin</td>
<td>20</td>
<td>10000</td>
<td>SELX2265561651</td>
<td>2018-06-05</td>
<td>12:12:24</td>
<td>
    <div class="row">
    <div class="col-sm" style="margin-left : -5px;">
     <form>
<button type="button" onclick="Child_header_Delete(this.form.hid.value)" id="bux" name="action" value="Profile" class="btn btn-info"><i class="fa fa-file-text-o"></i></button>
<input type="hidden" name="hid" id="hi" value="3">
</form>
    </div>
    <div class="col-sm" style="margin-left : -50px;">
   <form action="./Edit_Product.php" method="POST"> 
<input type="hidden" name="hid" id="hi" value="3">
 <button type="input"  name="action" value="Update" class="btn btn-warning">D</button> 
<button type="input" name="action" value="Edit" class="btn btn-danger"><i class="fa fa-edit"></i></button>
</form> 
    </div>
    <div class="col-sm" style="margin-left : -48px;">
<button value="3" onclick="Deletec(this.value)" class="btn btn-dark"><i class="fa fa-close"></i></button>

</div>
</div>
</td>
</tr>
 -->

      
    </tbody>
  </table>

</div>

<?php 


echo '<nav aria-label="Page navigation example">
  <ul class="pagination">';
echo ' <li class="page-item"><a class="page-link" href="Sales.php?page=1">First</a></li>';

for ($page=1; $page < $number_of_pages; $page++) { 
    echo ' <li class="page-item"><a class="page-link" href="Sales.php?page=' . $page . '">      '.  $page   .'    </a></li>';
}

echo ' <li class="page-item"><a class="page-link" href="Sales.php?page='.$number_of_pages.'">Last</a></li>';


echo ' </ul></nav>';
 ?>




<a href="./Selling.php" class="float" id="ADCX">
<i class="fa fa-plus my-float"></i>
</a>














        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Bootstrap core JavaScript -->
   <!--  <script src="vendor/jquery/jquery.min.js"></script> -->

  <script src="./Scripts/jquery-3.3.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php  

function show_Model_x()
{

     echo "<script>$('#myModal_XZ').modal('show')</script>";
}


?>
<!-- <script>$('#myModal_XZ').modal('show')</script> -->
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });


    </script>
<script type="text/javascript">
    $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</script>


<script>
 function Get_Data_Sale(txrf){ 

console.log(txrf);
 



    $(document).ready(function(){
    // $('#bux').click(function (e) {
        // var id = $('#hi').val();
        $.ajax({
            type : 'post',
            url : './Sales_Data_Model.php',
            data :  {Txrf: txrf}, 
            dataType:"JSON",
            success : function(data){
 

//         ID_Sell 
//         Name_EN_Sell 
//         Name_Ar_Sell 
//         Unit_Price_Sell 
//         Category_Sell 
//         Amount_Sell
//         Sum_Sell 




// Add_Date: "2018-06-05", Add_Time: "12:12:24", Voucher_Val: "20000", Cx_Name: "marawan"
  //data_vou  
// Add_Date: "2018-06-05"
// Add_Time: "12:12:24"
// Bill_Txrf_Number: "SELX2265561651"
// CS_ID: "2"
// PT_ID: "1"
// Product_Amount: "11"
// Product_ID: "20"
// Product_Sum_Value: "20000"

Date_Voucher
CSName_Voucher
Txtrf_Voucher
Value_SUm_Voucher
Note_Voucher 
  var Add_Date = data['Add_Date'];
  var Add_Time = data['Add_Time'];
  var Note = data['Note'];
  var Voucher_Val = data['Voucher_Val'];
  var Cx_Name = data['Cx_Name'];
  var Bill_Txrf_Number = data['Bill_Txrf_Number'];
  var data_vou = data['data_vou'];

$('#Date_Voucher').text(Add_Date+' '+Add_Time);
$('#CSName_Voucher').text(Cx_Name);
$('#Txtrf_Voucher').text(Bill_Txrf_Number);
$('#Value_SUm_Voucher').text(Voucher_Val);
$('#Note_Voucher').text(Note);


// Add_Date: "2018-11-06"
// Add_Time: "12:57:28"
// Bill_Txrf_Number: "SELX1651651"
// Brand: "Sony"
// CS_ID: "2"
// Category: "Electronics"
// PT_ID: "9"
// P_AR_Name: "Xperia-r1"
// P_Unit_Price: "6000.5"
// Product_Amount: "1"
// Product_ID: "4"
// Product_Sum_Value: "26001"


// console.log(data);
  data_vou.forEach(function(item) {
    // Table_sell_ZZ
   console.log(item['PT_ID']);
   console.log(item['CS_ID']);
   console.log(item['Product_Amount']);
   console.log(item['Product_ID']);
   console.log(item['Product_Sum_Value']);
// $('#myTable > tbody:last-child')
$('#Table_sell_ZZ').append(

  '<tr onclick="Calculate(this.id)" id="4" class="hide"><td class="pt-3-half" id="ID_Sell" contenteditable="true">'+item['PT_ID']+'</td><td class="pt-3-half" id="Name_EN_Sell" contenteditable="true">'+item['P_AR_Name']+'</td><td class="pt-3-half" id="Name_Ar_Sell" contenteditable="true">'+item['P_AR_Name']+'</td><td class="pt-3-half" id="Unit_Price_Sell" contenteditable="true">'+item['P_Unit_Price']+'</td><td class="pt-3-half" id="Category_Sell" contenteditable="true">'+item['Category']+'</td><td class="pt-3-half" id="Amount_Sell" contenteditable="true">'+item['Product_Amount']+'</td><td class="pt-3-half" id="Sum_Sell" contenteditable="true">'+item['Product_Sum_Value']+'</td></tr>');
   


});


            }
        });

 $('#myModal_XZ').modal('show');
$('#Date_Voucher').text('');
$('#CSName_Voucher').text('');
$('#Txtrf_Voucher').text('');
$('#Value_SUm_Voucher').text('');
$('#Note_Voucher').text('');
$("#Table_sell_ZZ tr").remove();
});



}
</script>


<script type="text/javascript">

  function  Delete_Sale(txrf)
  {

    //Selling_Delete_Handler.php

    console.log('this is  : ' +txrf);


 $.ajax({
            type : 'post',
            url : './Selling_Delete_Handler.php',
            data :  {Txrf: txrf}, 
            dataType:"JSON",
            success : function(data){

           }



        });
 // window.location.replace("./Sales.php");
  location.reload(true);

  }

</script>



<?php  include './Sales_Model_Face.php';?>


</body>

</html>
