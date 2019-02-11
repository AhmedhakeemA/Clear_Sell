<?php   


//Categories.php


?>


<?php  include './Internal/Connection.php' ?>
<?php 

 // $statement = $Connect->prepare("SELECT * FROM `Category_Data`");
 //            $statement->execute();

 //            $count = $statement->rowCount();

 //             $R = $statement->fetchAll( PDO::FETCH_ASSOC );

 //             foreach ($R as $row_inside) {

 //   echo $row_inside['Cat_ID'];

 //     }


          



//how many results per page 
$results_per_page = 10;

//get number of results in DB

 $statement = $Connect->prepare("SELECT * FROM `Category_Data`");
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
$sql='SELECT * FROM Category_Data LIMIT ' . $this_page_first_result . ',' .  $results_per_page;

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

    <div class="container-fluid"> 



 <br>            
 <br>


 <div class="row">
        <div class="col-sm-4 col-sm-offset-3">
            <div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
                    <input type="text" id="myInput" class="form-control"  placeholder="Search" >
                    <span class="input-group-addon">
                       
                    </span>
                </div>
            </div>
        </div>
    </div>            
 <br>            
<div class="table-responsive text-wrap" style="">

  <table class="table table-bordered"  style="margin-right: -15px;
    margin-left: -1px;">
    <thead>
      <tr>
        <th scope="col">#</th>


 
      
        <th scope="col">Cat_Name</th>
        <th scope="col">Cat_Describtion</th>
        <th scope="col">Add_Date</th>
      </tr>
    </thead >
    <tbody id="myTable">

<!-- <a  href=""></a>
<button></button> -->
<form></form>

<?php  




foreach ($R as $row_inside) {


          
echo '<tr>
<th scope="row">'.$row_inside['Cat_ID'].'</th>
<td>'.$row_inside['Cat_Name'].'</td>
<td>'.$row_inside['Cat_Describtion'].'</td>
<td>'.$row_inside['Add_Date'].'</td>

        
       
<td>

<div class="row">
<div class="col-sm-auto">


<!--  <button type="input"  name="action" value="Update" class="btn btn-warning">D</button> -->

<button class="btn btn-danger" value="'.$row_inside['Cat_ID'].'" onclick="Editc(this.value)" id="ADCXz" class="btn btn-dark"><i class="fa fa-edit"></i></button>
<button class="btn btn-dark" value="'.$row_inside['Cat_ID'].'" onclick="Deletec(this.value)" id="ADCXz" class="btn btn-dark"><i class="fa fa-close"></i></button>




</div>


</div> 


</td>
</tr>';


                 }


// style="margin-left:-12%;" 

                 //display links to pages 


?>
<!-- <button type="input" name="action" value="Delete" class="btn btn-dark"><i class="fa fa-close"></i></button> -->

<!-- <button type="input"  name="action" value="Edit"class="btn btn-danger"><i class="fa fa-edit"></i></button>
 -->
<!--    <a href="#" class="btn btn-dark" id="ADCXz"><i class="fa fa-close"></i><a> -->
   
    </tbody>
  </table>


<a href="#" class="float" id="ADCX">
<i class="fa fa-plus my-float"></i>
</a>
</div>

<?php 


echo '<nav aria-label="Page navigation example">
  <ul class="pagination">';
echo ' <li class="page-item"><a class="page-link" href="Categories.php?page=1">First</a></li>';

for ($page=1; $page < $number_of_pages; $page++) { 
    echo ' <li class="page-item"><a class="page-link" href="Categories.php?page=' . $page . '">      '.  $page   .'    </a></li>';
}

echo ' <li class="page-item"><a class="page-link" href="Categories.php?page='.$number_of_pages.'">Last</a></li>';


echo ' </ul></nav>';
 ?>
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
	
	  $("#ADCX").click(function() {
        $('#myModal_Cat').modal('show');

        
    });

</script>


<script type="text/javascript">
  

 function  Deletec(CC){

     $(document).ready(function(){

      $('#iDD').val(CC);
        
$('#Modal_X').modal('show');
        
        
   
 });

  }
   
function  Editc(CX){

     $(document).ready(function(){

    // $('#iDD').val(CC);
       
       console.log(CX);


              $.ajax({
            type : 'post',
            url : './Edit_Category_Data.php',
            data :  {id: CX}, 
            dataType:"JSON",
            success : function(data){
        
  $('#Cat_IDD').val(data.Cat_ID);
 $('#Cat_Name').val(data.Cat_Name);
 $('#Cat_Describtion').text(data.Cat_Describtion);
 $('#Cat_Date').text(data.Add_Date);

            }
        });

    
$('#myModal_Cat_Edit').modal('show');
        
        
   
 });

  }
</script>
<script type="text/javascript">
function SendData (Cat_n,Cat_Des)
{

	   $(document).ready(function(){
    
        $.ajax({
            type : 'post',
            url : './Edit_Category_Data.php',
            data :  {id: CX}, 
            dataType:"JSON",
            success : function(data){
          console.log(data);

            }
        });

   
    
});

}
</script>
 
<?php include './Model_Category_Face.php'; ?>
<?php include './Model_Del_Category_Face.php'; ?>
<?php include './Model_Edit_Category_Face.php'; ?>




</body>

</html>
