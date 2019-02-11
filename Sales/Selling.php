

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
    html{zoom :90%;}
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

    <div id="Contx_trigger" class="container-fluid"> 

 <br>            
 <br>



<input class="form-control" type="text" id="Search" placeholder="Search" aria-label="Search">

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

<!-- <a  href=""></a>
<button></button> -->
<form></form>

<tr>
<td scope="row" id="ID_Pro">1</td>
<td><img id="Image_Url_B" src="" class="img-thumbnail" id="Zoomx" alt="Cinque Terre" width="70" height="70" style="margin-left: 20%;"></td>
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

    <div id="table" class="table-editable">
     
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
        
       
<!-- 
        <tr class="hide">
          <td class="pt-3-half" id="ID_Sell" contenteditable="true">#</td>
          <td class="pt-3-half" id="Name_EN_Sell" contenteditable="true">Elisa Gallagher</td>
          <td class="pt-3-half" id="Name_Ar_Sell" contenteditable="true">31</td>
          <td class="pt-3-half" id="Unit_Price_Sell" contenteditable="true">Portica</td>
          <td class="pt-3-half" id="Category_Sell"contenteditable="true">United Kingdom</td>
          <td class="pt-3-half" id="Amount_Sell"contenteditable="true">London</td>
          <td class="pt-3-half" id="Sum_Sell"contenteditable="true">6+226</td>
          <td>
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
          </td>
        </tr> -->
      </table>
    </div>
 

<!-- Editable table -->
 <br>            
 <br>
sadc
 <br>            
 <br>






        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Bootstrap core JavaScript -->
   <!--  <script src="vendor/jquery/jquery.min.js"></script> -->

  <script src="./Scripts/jquery-3.3.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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


console.log(ID);
console.log(Name_EN);
console.log(Name_AR);
console.log(Unit_Price);
console.log(Avilable);
console.log(Amount);
console.log(Category);

$('#Table_sell').append('<tr onclick ="Calculate(this.id)" id = "'+ID+'"  class="hide"><td class="pt-3-half" id="ID_Sell" contenteditable="true">'+ID+'</td><td class="pt-3-half" id="Name_EN_Sell" contenteditable="true">'+Name_EN+'</td><td class="pt-3-half" id="Name_Ar_Sell" contenteditable="true">'+Name_AR+'</td><td class="pt-3-half" id="Unit_Price_Sell" contenteditable="true">'+Unit_Price+'</td><td class="pt-3-half" id="Category_Sell"contenteditable="true">'+Category+'</td><td class="pt-3-half" id="Amount_Sell"contenteditable="true">0</td><td class="pt-3-half" id="Sum_Sell"contenteditable="true">0.00</td><td><span class="table-remove"><button type="button"  id="btnDelete" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span></td></tr>');
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

 function  Calculate(z)
  {


   var Unit_Price =  $('#'+z).find("td:eq(3)").text();
   var Amount =  $('#'+z).find("td:eq(5)").text();
   var Sum_Value = Unit_Price * Amount;

   $('#'+z).find("td:eq(6)").text(Sum_Value);
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
