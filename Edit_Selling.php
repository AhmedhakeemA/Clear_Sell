<?php  include './Internal/Connection.php' ?>
<?php

 $TxRFX = $_POST['TxRFX'];
// SELECT * FROM `Customers_Data`

 // $statement_Category = $Connect->prepare("SELECT * FROM `Customers_Data`");



 $statement = $Connect->prepare('

SELECT `PT_ID`,`Product_ID`,`Note`,(SELECT DISTINCT Product_Data.Image_Url_B FROM `Product_Data` WHERE `Product_ID` = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS P_Image_Url, (SELECT DISTINCT Category_Data.Cat_Name  FROM Product_Data  JOIN Exer_Client ON Product_Data.Product_ID=Exer_Client.Product_ID JOIN Category_Data ON Category_Data.Cat_ID=Exer_Client.Cat_ID WHERE Product_Data.Product_ID = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS Category,(SELECT DISTINCT Brand_Data.Brand_Name FROM Product_Data JOIN Brand_Data ON Brand_Data.Brand_ID=Product_Data.Brand_ID  WHERE Product_Data.Product_ID = `Purchasing_Trans`.`Product_ID`  LIMIT 1) AS Brand,(SELECT DISTINCT Product_Data.NameAR FROM `Product_Data` WHERE `Product_ID` = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS P_AR_Name,(SELECT DISTINCT Product_Data.NameEN FROM `Product_Data` WHERE `Product_ID` = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS P_EN_Name,(SELECT DISTINCT Product_Data.Unit_Price FROM `Product_Data` WHERE `Product_ID` = `Purchasing_Trans`.`Product_ID` LIMIT 1) AS P_Unit_Price,`Product_ID`,`CS_ID`,`Product_Amount`,`Product_Sum_Value`,`Bill_Txrf_Number`,`Add_Date`,`Add_Time` FROM `Purchasing_Trans` WHERE `Bill_Txrf_Number` = "'.$TxRFX.'"

  ');



 $statement->execute();
 $R_Category = $statement->fetchAll( PDO::FETCH_ASSOC );
// foreach ($R_Category as $row_Category) {

//   echo $row_Category['CS_ID']; echo "<br>";
//   echo   $row_Category['CS_Name'];echo "<br>";
// }

 $statement_Cst = $Connect->prepare("SELECT * FROM `Customers_Data`");
 $statement_Cst->execute();

 $R_Cst = $statement_Cst->fetchAll( PDO::FETCH_ASSOC );


$statement_Note = $Connect->prepare('SELECT `Note` FROM `Purchasing_Trans`WHERE `Bill_Txrf_Number` = "'.$TxRFX.'" LIMIT 1');

 $statement_Note->execute();

 $R_Note = $statement_Note->fetch( PDO::FETCH_ASSOC );



$statement_Date= $Connect->prepare('
  SELECT `Add_Date` FROM `Purchasing_Trans`WHERE `Bill_Txrf_Number` = "'.$TxRFX.'" LIMIT 1
');

 $statement_Date->execute();

 $R_Date = $statement_Date->fetch( PDO::FETCH_ASSOC );



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
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<link href="css/Padges.css" rel="stylesheet">
    <style type="text/css">
    html{zoom :80%;}
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

       <?php// include './Padges_Color.php'; ?>



<!-- Heart Container -->

    <div id="Contx_trigger" class="container-fluid"> 

 <br>            
 <br> 
 <br>

 <div class="container">
 <div class="row">
    <div class="col">


        <div class="input-group">
        <div class="input-group-addon">
        </div>
        <input class="form-control" id="date" name="Expiration_date" placeholder="YYYY-MM-DD > Bill date"  value="<?php echo  $R_Date['Add_Date']; ?>" type="text"/>
       

    </div>
    </div>
    <div class="col">
      <input type="text" class="form-control" id="Bill_Txrf_Number" placeholder="Bill_Txrf_Number" value="<?php echo $TxRFX; ?>">
    </div>
  </div>


 
<br> 
 <br>
   <div class="row"> 
     <div class="col">
  <label for="inputEmail4">Customer</label>
  <div class="form-group">
  <select id="form_need_Customer" name="Category" class="form-control" required="required" data-error="Please specify your need.">

<?php  

foreach ($R_Cst as $row_Cs) {

  // echo $row_Category['CS_ID']; echo "<br>";
  // echo   $row_Category['CS_Name'];echo "<br>";

  echo '<option value="'.$row_Cs['CS_ID'].'">'.$row_Cs['CS_Name'].'</option>';
}




 ?>


 </select>
</div>  
</div>  
<!--  <div class="col">
  <label for="inputEmail4">Category</label>
  <div class="form-group">
  <select id="form_need" name="Category" class="form-control" required="required" data-error="Please specify your need.">
<option value="1">Ahmeed</option>
 </select>
</div>  
    </div>  -->
    </div>  


 <br>
  <br>            
 <br>

    


<input class="form-control" type="text" id="Search" placeholder="Search for products ..." aria-label="Search">

<br>
<br>
<br>

<div class="table-responsive text-wrap" style="">

  <table id="table1" class="table table-bordered" style="margin-right: -20px;
    margin-left: -10px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Thumbnails</th>
        <th scope="col">Name EN</th>
        <th scope="col">Name AR</th>
        <th scope="col">Unit Price</th>
        <th scope="col">Amount Avil</th>
        <th scope="col">Avilable</th>
        <th scope="col">Category</th>
        <!-- <th scope="col">OPS</th> -->
      </tr>
    </thead>
    <tbody id="myTable">






        
       
<!-- <td>


<div class="row" style="margin-left : 5px;">
<button value="1" onclick="Deletec(this.value)" class="btn btn-dark"><i class="fa fa-plus"></i></button>
</div> 
</td> -->
</tr>



<!-- <a  href=""></a>
<button></button> -->
<form></form>

<tr>
<td scope="row" id="ID_Pro">1</td>
<td><img id="Image_Url_B" src="" class="img-thumbnail" id="Zoomx"  width="70" height="70" style="margin-left: 20%;"></td>
<td id="Name_EN"></td>
<td id="Name_AR"></td>
<td id="Unit_Price"></td>
<td id="Avilable"></td>
<td id="Amount"></td>
<td id="Category"></td>

        
       
<!-- <td>


<div class="row" style="margin-left : 5px;">
<button value="1" onclick="Deletec(this.value)" class="btn btn-dark"><i class="fa fa-plus"></i></button>
</div> 
</td> -->
</tr>



      
    </tbody>
  </table>
<br>
<br>




 <br>            
 <br>
<!-- Editable table -->

<form action="./Selling_Edit_Handler.php" method="POST">
  


    <div id="table" name="tablx" class="table-editable">
     
      <table id="Table_sell" class="table table-bordered table-responsive-md table-striped text-center">
        <tr>
           <th scope="col">#</th>
          <th class="text-center">Name EN</th>
          <th class="text-center">Name AR</th>
          <th class="text-center">Unit_Price</th>
          <th class="text-center">Category</th>
          <th class="text-center">Amount</th>
          
          <th class="text-center">Sum</th>
          <th class="text-center">Remove</th>
        </tr>


  <?php 
foreach ($R_Category as $row_Category) {


echo 
'
<tr onclick="Calculate(this.id)" id="4" class="hide">
<td class="pt-3-half" id="ID_Sell" contenteditable="true">'.$row_Category['PT_ID'].'</td>
<td class="pt-3-half" id="Name_EN_Sell" contenteditable="true">'.$row_Category['P_EN_Name'].'</td>
<td class="pt-3-half" id="Name_Ar_Sell" contenteditable="true">'.$row_Category['P_AR_Name'].'</td>
<td class="pt-3-half" id="Unit_Price_Sell" contenteditable="true">'.$row_Category['P_Unit_Price'].'</td>
<td class="pt-3-half" id="Category_Sell" contenteditable="true">'.$row_Category['Category'].'</td>
<td class="pt-3-half" id="Amount_Sell" contenteditable="true">'.$row_Category['Product_Amount'].'</td>
<td class="pt-3-half" id="Sum_Sell" contenteditable="true">'.$row_Category['Product_Sum_Value'].'</td>
<td><span class="table-remove"><button type="button" id="btnDelete" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span></td></tr>
';



  // echo $row_Category['CS_ID']; echo "<br>";
 
}

?>
      </table>
    </div>


<!-- <input type="submit" name="submit"> -->

    </form>
 

<!-- Editable table -->
 <br>            
 <br>
<input class="form-control form-control-lg" id="sum_of_values" type="text" placeholder="voucher value">
<div class="form-group">
  <p>this voucher is made by ahmed abdel hakim ahmed for tersting </p>

  <label for="comment">Note :</label>
  <textarea class="form-control" rows="5" id="comment"><?php echo $R_Note['Note'];?></textarea>
</div>


<!-- <button id="Show">show send</button> -->

<button id="Show" type="button" class="btn btn-danger btn-lg">Sell Products</button>

</div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Bootstrap core JavaScript -->
   <!--  <script src="vendor/jquery/jquery.min.js"></script> -->

  <script src="./Scripts/jquery-3.3.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- this used to collect and send data  -->
<!-- ####################################################### -->
<script type="text/javascript"> 
  $(document).ready(function(){ 
$('#Show').click(function(){

//  var header = Array();
    
// $("#Table_sell tr th").each(function(i, v){
//         header[i] = $(this).text();
// })
               
// alert(header);

var data = Array();
    
$("#Table_sell tr").slice(1).each(function(i, v){
    data[i] = Array();
    $(this).children('td').each(function(ii, vv){
        data[i][ii] = $(this).text();
    }); 
})

// alert(data);

// console.log(data);
// data.forEach(function(item) {
//     console.log(item);
// });
data = data.filter(function(x) { return x !== "" });
  var json_data = JSON.stringify(data);
// var json_data = Object.assign({}, data);



var customer = $('#form_need_Customer').val();
var Bill_Txrf_Number = $('#Bill_Txrf_Number').val();
var date = $('#date').val();
var Note = $('#comment').val();
var Voucher_Sum_Value = $('#sum_of_values').val();

console.log(customer);
console.log(date);
console.log(Bill_Txrf_Number);
console.log(Note);
console.log(json_data);

  

  $.ajax({
            type : 'post',
            url : './Selling_Edit_Handler.php',
            data :  {
              customer: customer ,
              Bill_Txrf_Number: Bill_Txrf_Number,
              date:date,
              Note:Note,
              Table_data:json_data
            }, 
            dataType:"TEXT",
            success : function(data){
             
                 // console.log(data);

            }
        });


window.location.replace("./Sales.php");
});

});

 
</script>

<script type="text/javascript">
  //********************************-------------------***************#
  $(document).ready(function(){
var summation = [];
// var summation =0;

$('#sum_of_values').click(function(){
 $('#Table_sell tr').each(function() {
    var customerId = $(this).find("#Sum_Sell").text();
    summation.push(parseInt(customerId));
    
 });
console.log(summation);
var newsum =filter_array(summation);
console.log(newsum);
var sum = 0;
for(var i = 0; i < newsum.length; i++){

  sum += newsum[i];

}

console.log('Your sum is ' + sum);
$('#sum_of_values').val(sum);

});



});




 function filter_array(test_array) {
    var index = -1,
        arr_length = test_array ? test_array.length : 0,
        resIndex = -1,
        result = [];

    while (++index < arr_length) {
        var value = test_array[index];

        if (value) {
            result[++resIndex] = value;
        }
    }

    return result;
}
//********************************-------------------***************#
</script>

<!-- ####################################################### -->

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



  <script type="text/javascript">
        



    $(document).ready(function(){
    // $('#bux').click(function (e) {
      $('#Search').keyup(function(){

         var idx = $('#Search').val();
        $.ajax({
            type : 'post',
            url : './FetchData.php',
            data :  {id: idx}, 
            dataType:"JSON",
            success : function(data){
                 

                $('#ID_Pro').text(data.Product_ID);
                //console.log(data.Product_ID);
                $('#Name_EN').text(data.NameEN);
                $('#Name_AR').text(data.NameAR);
                $('#Add_Date').text(data.Add_Date +' - '+data.Add_Time);
                $('#Unit_Price').text(data.Unit_Price);
                $('#Avilable').text(data.Avilable);
                $('#Category').text(data.Cat_Name);
                $('#Manifacuring_Date').text(data.Manifacuring_Date);
                $('#Expiration_Date').text(data.Expiration_Date);
                $('#Product_Describtion').text(data.Product_Describtion);
                $('#Product_Note').text(data.Product_Note);
                $('#Brand_Name').text(data.Brand_Name);
                $('#Amount').text(data.Amount);

                 $("#Image_Url_B").attr("src",data.Image_Url_B);
                 // console.log(data);

            }
        });

      });
       


    
});


   

</script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
  $(document).ready(function(){
    var date_input=$('input[name="Expiration_date"]'); //our date input has the name "date"
    var date_input_2=$('input[name="Manifactring_date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })

      date_input_2.datepicker({
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
  })
</script>

<script type="text/javascript">


  $(document).keypress(function(event){
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if(keycode == '13'){

// Name_EN
// Name_AR
// Unit_Price
// Avilable
// Amount
// Category

var ID =  $('#table1').find("tr:eq(1)").find("td:eq(0)").text();
var Name_EN =  $('#table1').find("tr:eq(1)").find("td:eq(2)").text();
var Name_AR =  $('#table1').find("tr:eq(1)").find("td:eq(3)").text();
var Unit_Price =  $('#table1').find("tr:eq(1)").find("td:eq(4)").text();
var Avilable =  $('#table1').find("tr:eq(1)").find("td:eq(5)").text();
var Amount =  $('#table1').find("tr:eq(1)").find("td:eq(6)").text();
var Category =  $('#table1').find("tr:eq(1)").find("td:eq(7)").text();


// console.log(ID);
// console.log(Name_EN);
// console.log(Name_AR);
// console.log(Unit_Price);
// console.log(Avilable);
// console.log(Amount);
// console.log(Category);

$('#Table_sell').append('<tr onclick ="Calculate(this.id)" id = "'+ID+'"  class="hide"><td class="pt-3-half" id="ID_Sell" contenteditable="true">'+ID+'</td><td class="pt-3-half" id="Name_EN_Sell" contenteditable="true">'+Name_EN+'</td><td class="pt-3-half" id="Name_Ar_Sell" contenteditable="true">'+Name_AR+'</td><td class="pt-3-half" id="Unit_Price_Sell" contenteditable="true">'+Unit_Price+'</td><td class="pt-3-half" id="Category_Sell"contenteditable="true">'+Category+'</td><td class="pt-3-half" id="Amount_Sell"contenteditable="true">0</td><td class="pt-3-half" id="Sum_Sell"contenteditable="true">0.00</td><td><span class="table-remove"><button type="button"  id="btnDelete" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span></td>');
           // ID_Sell 
           // Name_EN_Sell 
           // Name_Ar_Sell 
           // Unit_Price_Sell 
           // Category_Sell
           // Amount_Sell
           // Sum_Sell




    // alert('You pressed a "enter" key in somewhere');  
  }
});


</script>


<script type="text/javascript">
  $("#Table_sell").on('click', '#btnDelete', function () {
    $(this).closest('tr').remove();
});
</script>
<script type="text/javascript">

var sum_x= 0 ;

 function  Calculate(z)
  {


   var Unit_Price =  $('#'+z).find("td:eq(3)").text();
   var Amount =  $('#'+z).find("td:eq(5)").text();
   var Sum_Value = Unit_Price * Amount;

   $('#'+z).find("td:eq(6)").text(Sum_Value);

 // sum_x = sum_x+Sum_Value;
 // console.log(sum_x);
 //   var sum_of_values_input =  $('#sum_of_values').text();

 //   var voucher_value = Sum_Value +sum_of_values_input ;
 // $('#sum_of_values').val(voucher_value);

 //  var sum_of_values_input =  $('#sum_of_values').text();
 //   const  avilable_value = voucher_value;

 //   console.log(voucher_value);


    // console.log(z);
    // console.log(Amount);
    // console.log(Unit_Price);
    // console.log('Sum _value ' +Sum_Value);
    // var xx=z.find("td:eq(4)").text();
    // console.log(xx);
    // var Unit_Price =  $('#table1').z.find("td:eq(4)").text();

  }
 


</script>
<script type="text/javascript">
  var $TABLE = $('#table');
var $BTN = $('#export-btn');
var $EXPORT = $('#export');

$('.table-add').click(function () {
var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
$TABLE.find('table').append($clone);
});

$('.table-remove').click(function () {
$(this).parents('tr').detach();
});

$('.table-up').click(function () {
var $row = $(this).parents('tr');
if ($row.index() === 1) return; // Don't go above the header
$row.prev().before($row.get(0));
});

$('.table-down').click(function () {
var $row = $(this).parents('tr');
$row.next().after($row.get(0));
});

// A few jQuery helpers for exporting only
jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

$BTN.click(function () {
var $rows = $TABLE.find('tr:not(:hidden)');
var headers = [];
var data = [];

// Get the headers (add special header logic here)
$($rows.shift()).find('th:not(:empty)').each(function () {
headers.push($(this).text().toLowerCase());
});

// Turn all existing rows into a loopable array
$rows.each(function () {
var $td = $(this).find('td');
var h = {};

// Use the headers from earlier to name our hash keys
headers.forEach(function (header, i) {
h[header] = $td.eq(i).text();
});

data.push(h);
});

// Output the result
$EXPORT.text(JSON.stringify(data));
});
</script>

</body>

</html>
