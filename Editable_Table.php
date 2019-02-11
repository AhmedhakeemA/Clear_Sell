<?php  include './Internal/Connection.php' ?>
<?php 

 // $statement = $Connect->prepare("SELECT * FROM `Product_Data`");
 //            $statement->execute();

 //            $count = $statement->rowCount();

 //             $R = $statement->fetchAll( PDO::FETCH_ASSOC );

       



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<link href="css/Padges.css" rel="stylesheet">
    <style type="text/css">
      th{
background-color: #36304A;
color: white;
padding: 2px;

   }
    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                   <!--  <a href="#">
                        Start Bootstrap
                    </a> -->
<div class="card" style="width: 18rem; margin-left: -20px; background-color: #14B9D6;">
  <div class="card-body">
    
    <h2>Simple Sidebar</h2>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
                </li>

                <br>
                <br>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
<nav class="navbar sticky-top navbar-light bg-light" style="height: 86px;     box-shadow: 0 4px 4px 0 rgba(0,0,0,0.2);
    transition: 0.2s;">

    <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle"><span class="navbar-toggler-icon"></span></a>
    

<button class="btn btn-outline-success" type="button">Main button</button>

</nav>






        <!-- Page Content -->
        <div id="page-content-wrapper">


<input class="form-control" type="text" id="Search" placeholder="Search using name ....." aria-label="Search">

<br>
<br>
<br>

<div class="table-responsive text-wrap" style="">

  <table class="table table-bordered" style="margin-right: -20px;
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
<th scope="row">1</th>
<td><img id="Image_Url_B" src="" class="img-thumbnail" id="Zoomx" alt="Cinque Terre" width="70" height="70" style="margin-left: 20%;"></td>
<td id="Name_EN"></td>
<td id="Name_AR"></td>
<td id="Unit_Price"></td>
<td id="Avilable"></td>
<td id="Amount"></td>
<td id="Category"></td>

        
       
<td>


<div class="row" style="margin-left : 5px;">
<button value="1" id="HGJ" class="btn btn-dark"><i class="fa fa-close"></i></button>
</div> 
</td>
</tr>



      
    </tbody>
  </table>
<br>
<br>
<br>

<!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Editable table</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-plus fa-2x"
            aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <tr>
          <th class="text-center">Person Name</th>
          <th class="text-center">Age</th>
          <th class="text-center">Company Name</th>
          <th class="text-center">Country</th>
          <th class="text-center">City</th>
          <th class="text-center">Sort</th>
          <th class="text-center">Remove</th>
        </tr>
        <tr>
          <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
          <td class="pt-3-half" contenteditable="true">30</td>
          <td class="pt-3-half" contenteditable="true">Deepends</td>
          <td class="pt-3-half" contenteditable="true">Spain</td>
          <td class="pt-3-half" contenteditable="true">Madrid</td>
          <td class="pt-3-half">
            <span class="table-up"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
            <span class="table-down"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-down"
                  aria-hidden="true"></i></a></span>
          </td>
          <td>
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
          </td>
        </tr>
        <!-- This is our clonable table line -->
        <tr>
          <td class="pt-3-half" contenteditable="true">Guerra Cortez</td>
          <td class="pt-3-half" contenteditable="true">45</td>
          <td class="pt-3-half" contenteditable="true">Insectus</td>
          <td class="pt-3-half" contenteditable="true">USA</td>
          <td class="pt-3-half" contenteditable="true">San Francisco</td>
          <td class="pt-3-half">
            <span class="table-up"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
            <span class="table-down"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-down"
                  aria-hidden="true"></i></a></span>
          </td>
          <td>
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
          </td>
        </tr>
        <!-- This is our clonable table line -->
        <tr>
          <td class="pt-3-half" contenteditable="true">Guadalupe House</td>
          <td class="pt-3-half" contenteditable="true">26</td>
          <td class="pt-3-half" contenteditable="true">Isotronic</td>
          <td class="pt-3-half" contenteditable="true">Germany</td>
          <td class="pt-3-half" contenteditable="true">Frankfurt am Main</td>
          <td class="pt-3-half">
            <span class="table-up"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
            <span class="table-down"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-down"
                  aria-hidden="true"></i></a></span>
          </td>
          <td>
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
          </td>
        </tr>
        <!-- This is our clonable table line -->
        <tr class="hide">
          <td class="pt-3-half" contenteditable="true">Elisa Gallagher</td>
          <td class="pt-3-half" contenteditable="true">31</td>
          <td class="pt-3-half" contenteditable="true">Portica</td>
          <td class="pt-3-half" contenteditable="true">United Kingdom</td>
          <td class="pt-3-half" contenteditable="true">London</td>
          <td class="pt-3-half">
            <span class="table-up"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
            <span class="table-down"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-down"
                  aria-hidden="true"></i></a></span>
          </td>
          <td>
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
<!-- Editable table -->
<br>
<br>
<br>






</div>





        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
<script type="text/javascript">
    function centerModal() {
    $(this).css('display', 'block');
    var $dialog = $(this).find(".modal-dialog");
    var offset = ($(window).height() - $dialog.height()) / 2;
    // Center modal vertically in window
    $dialog.css("margin-top", offset);
}

$('.modal').on('show.bs.modal', centerModal);
$(window).on("resize", function () {
    $('.modal:visible').each(centerModal);
});
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
                 

                $('#Product_ID').text(data.Product_ID);
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
		alert('You pressed a "enter" key in somewhere');	
	}
});
</script>

<script type="text/javascript">
     $("#HGJ").click(function(){
               
                

        var currentRow=$(this).closest("tr"); 
         
         var col1=currentRow.find("td:eq(1)").text(); // get current row 1st TD value
         console.log(col1);

                var Product_ID =    $('#Product_ID').text;
                var Name_EN =    $('#Name_EN').val();
                var Name_AR =    $('#Name_AR').val();
                var Add_Date =     $('#Add_Date').val();
                var Unit_Price =    $('#Unit_Price').val();
                var Avilable =    $('#Avilable').val();
                var Category =    $('#Category').val();
                var Manifacuring_Date =    $('#Manifacuring_Date').val();
                var Expiration_Date =    $('#Expiration_Date').val();
                var Product_Describtion =     $('#Product_Describtion').val();
                var Product_Note =     $('#Product_Note').val();
                var Brand_Name =    $('#Brand_Name').val();
                var Name_EN =    $('#Amount').val();


            // var markup = "";
            // $("table tbody").append(markup);
        });
</script>

</body>

</html>
