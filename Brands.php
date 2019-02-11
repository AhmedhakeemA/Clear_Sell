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

 $statement = $Connect->prepare("SELECT * FROM `Brand_Data`");
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
$sql='SELECT * FROM Brand_Data LIMIT ' . $this_page_first_result . ',' .  $results_per_page;

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
    <style type="text/css">html{zoom :90%;}
  
   th{
background-color: #36304A;
color: white;
padding: 2px;

   }</style>

  
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

       <?php //include './Padges_Color.php'; ?>



<!-- Heart Container -->

    <div class="container-fluid"> 



 <br>            
 <br>



<div class="table-responsive text-wrap" style="">

  <table class="table table-bordered" style="margin-right: -15px;
    margin-left: -1px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Brand_Name</th>
        <th scope="col">Brand_Describtion</th>
        <th scope="col">Brand_Image</th>
      </tr>
    </thead>
    <tbody id="myTable">


<?php  

foreach ($R as  $Rox) {
  
// `Brand_ID` `Brand_Name` `Brand_Describtion` `Brand_Image_Url` 

echo '
<tr>
<td scope="row"> '.$Rox['Brand_ID'].'</td>
<td> '.$Rox['Brand_Name'].'</td>
<td style="max-width: 100px;"> '.$Rox['Brand_Describtion'].'</td>
<td>
<button value="'.$Rox['Brand_Image_Url'].'" onclick="Show_Image(this.value)" ><img src="'.$Rox['Brand_Image_Url'].'" style="width: 70px; height: 70px;"></button>
</td>             
<td>
<div class="row">
<div class="col-sm-auto">
<!--  <button type="input"  name="action" value="Update" class="btn btn-warning">D</button> -->
<button class="btn btn-danger" value="1" onclick="Editc(this.value)" id="ADCXz"><i class="fa fa-edit"></i></button>
<from action="./Delete_Brands_Handler.php" method="POST">
    <input type="hidden" name="Brandx" value=" '.$Rox['Brand_ID'].'">
<button class="btn btn-dark" value="1" onclick="Deletec(this.value)" id="ADCXz"><i class="fa fa-close"></i></button>
</form>
</div>
</div> 
</td>
</tr>
';



}




?>





   
</tbody>
  </table>



</div>


<?php 


echo '<nav aria-label="Page navigation example">
  <ul class="pagination">';
echo ' <li class="page-item"><a class="page-link" href="Brands.php?page=1">First</a></li>';

for ($page=1; $page < $number_of_pages; $page++) { 
    echo ' <li class="page-item"><a class="page-link" href="Brands.php?page=' . $page . '">      '.  $page   .'    </a></li>';
}

echo ' <li class="page-item"><a class="page-link" href="Brands.php?page='.$number_of_pages.'">Last</a></li>';


echo ' </ul></nav>';
 ?>




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
function  Show_Image(Brand_ID_FIMG){


 $(document).ready(function(){

    

      $("#IM_PRO").attr("src",Brand_ID_FIMG);
           $('#myModal_2').modal('show');
 });


    }
</script>


<?php include './Image_Model_View.php';  ?>
</body>

</html>
