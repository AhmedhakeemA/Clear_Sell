<?php  include './Internal/Connection.php' ?>
<?php 

 // $statement = $Connect->prepare("SELECT * FROM `Product_Data`");
 //            $statement->execute();

 //            $count = $statement->rowCount();

 //             $R = $statement->fetchAll( PDO::FETCH_ASSOC );

          



//how many results per page 
$results_per_page = 10;

//get number of results in DB

 $statement = $Connect->prepare("SELECT Product_Data.Product_ID,Product_Data.Amount , Product_Data.NameEN , Product_Data.NameAR , Product_Data.Add_Date ,Product_Data.Add_Time , Product_Data.Unit_Price , Product_Data.Avilable , Product_Data.Manifacuring_Date ,Product_Data.Expiration_Date , Product_Data.Image_Url_B , Product_Data.Image_Url_S ,Product_Data.Product_Describtion , Product_Data.Product_Note ,Category_Data.Cat_Name , Brand_Data.Brand_Name FROM Product_Data JOIN Brand_Data ON Brand_Data.Brand_ID=Product_Data.Brand_ID JOIN Exer_Client ON Product_Data.Product_ID=Exer_Client.Product_ID JOIN Category_Data ON Category_Data.Cat_ID=Exer_Client.Cat_ID ");
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
$sql='SELECT Product_Data.Product_ID,Product_Data.Amount , Product_Data.NameEN , Product_Data.NameAR , Product_Data.Add_Date ,Product_Data.Add_Time , Product_Data.Unit_Price , Product_Data.Avilable , Product_Data.Manifacuring_Date ,Product_Data.Expiration_Date , Product_Data.Image_Url_B , Product_Data.Image_Url_S ,Product_Data.Product_Describtion , Product_Data.Product_Note ,Category_Data.Cat_Name , Brand_Data.Brand_Name FROM Product_Data JOIN Brand_Data ON Brand_Data.Brand_ID=Product_Data.Brand_ID JOIN Exer_Client ON Product_Data.Product_ID=Exer_Client.Product_ID JOIN Category_Data ON Category_Data.Cat_ID=Exer_Client.Cat_ID  LIMIT ' . $this_page_first_result . ',' .  $results_per_page;

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
    <!-- <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet"> -->
    <link href="./boot/css/bootstrap.min.css" rel="stylesheet">

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
        <th scope="col">Thumbnails</th>
        <th scope="col">Name EN</th>
        <th scope="col">Name AR</th>
        <th scope="col">Unit Price</th>
        <th scope="col">Amount Avil</th>
        <th scope="col">Avilable</th>
        <th scope="col">Category</th>
        <!-- <th scope="col">OPS</th> -->
      </tr>
    </thead >
    <tbody id="myTable">

<!-- <a  href=""></a>
<button></button> -->
<form></form>

<?php  



foreach ($R as $row_inside) {

          
echo '<tr>
<th scope="row"  >'.$row_inside['Product_ID'].'</th>

<td style="background-color: #FFF;"><form action="#" style="background-color: #FFF;"><button onclick="Show_Url(this.form.Zoomx.src)" style="border:none;"><img src="'.$row_inside['Image_Url_S'].'" class="img-thumbnail"  id="Zoomx" alt="Cinque Terre" width="70" height="70" style="background-color: #FFF;"> </button></form></td>
<td>'.$row_inside['NameEN'].'</td>
<td>'.$row_inside['NameAR'].'</td>
<td>'.$row_inside['Unit_Price'].'</td>
<td>'.$row_inside['Amount'].'</td>
<td>'.$row_inside['Avilable'].'</td>
<td>'.$row_inside['Cat_Name'].'</td>
        
       
<td style=" padding:1px; width:100px;">


<table  >
  <tr>
    <td  style="border:none"> <form action="./Edit_Product.php" method="POST"> 

<input type="hidden" name="hid" id="hi" value="'.$row_inside['Product_ID'].'">
<!--  <button type="input"  name="action" value="Update" class="btn btn-warning">D</button> -->
<button type="input"  name="action" value="Edit"class="btn btn-danger"><i class="fa fa-edit"></i></button>
</form></td>
    <td style="border:none"> <form>
<button type="button" onclick="Child_header_Delete(this.form.hid.value)" id="bux" name="action" value="Profile" class="btn btn-info"><i class="fa fa-file-text-o"></i></button>
<input type="hidden" name="hid" id="hi" value="'.$row_inside['Product_ID'].'">
</form></td >
    <td style="border:none"><button     value="'.$row_inside['Product_ID'].'" onclick="Deletec(this.value)"  class="btn btn-dark"><i class="fa fa-close"></i></button></td>
  </tr>
</table>




</td>



</tr>';


                 }


// style="margin-left:-12%;" 

                 //display links to pages 


?>



      
    </tbody>
  </table>

</div>

<?php 


echo '<nav aria-label="Page navigation example">
  <ul class="pagination">';
echo ' <li class="page-item"><a class="page-link" href="index.php?page=1">First</a></li>';

for ($page=1; $page < $number_of_pages; $page++) { 
    echo ' <li class="page-item"><a class="page-link" href="index.php?page=' . $page . '">      '.  $page   .'    </a></li>';
}

echo ' <li class="page-item"><a class="page-link" href="index.php?page='.$number_of_pages.'">Last</a></li>';


echo ' </ul></nav>';
 ?>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php  include './Model_Data_Face.php'; ?>
<?php  include './Image_Model_View.php'; ?>

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
        
function Child_header_Delete(value_of_box){


    $(document).ready(function(){
    // $('#bux').click(function (e) {
        // var id = $('#hi').val();
        $.ajax({
            type : 'post',
            url : './Data_Model.php',
            data :  {id: value_of_box}, 
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

                 $("#dummyimage").attr("src",data.Image_Url_B);
          console.log(data);

            }
        });

        $('#myModal').modal('show');
     // });
});

    }


function Show_Url(Img)
{
 $(document).ready(function(){

    // myModal_2

      $("#IM_PRO").attr("src",Img);
           $('#myModal_2').modal('show');
 });
       console.log(Img);
}

// $('#Zoomx').click(function(){

//     console.log($(this).attr("src"));
// });


 function  Deletec(CC){

     $(document).ready(function(){

      $('#iDD').val(CC);
        
$('#Modal_X').modal('show');
        
        
   
 });

  }
   

    </script>


<?php  include './Model_Del_Product_Face.php'; ?>

</body>

</html>
