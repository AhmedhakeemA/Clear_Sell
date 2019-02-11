<?php  include './Internal/Connection.php' ?>
<?php 

 $statement = $Connect->prepare("SELECT * FROM `Product_Data`");
            $statement->execute();

            $count = $statement->rowCount();

             $R = $statement->fetchAll( PDO::FETCH_ASSOC );

             foreach ($R as $row_inside) {

                     // echo $row_inside['Product_ID']; echo "<br>";
                     // echo $row_inside['NameEN']; echo "<br>";
                     // echo $row_inside['NameAR']; echo "<br>";
                     // echo $row_inside['Add_Date']; echo "<br>";
                     // echo $row_inside['Add_Time']; echo "<br>";
                     // echo $row_inside['Unit_Price']; echo "<br>";
                     // echo $row_inside['Avilable']; echo "<br>";
                     // echo $row_inside['Manifacuring_Date']; echo "<br>";
                     // echo $row_inside['Expiration_Date']; echo "<br>";
                     // echo $row_inside['Image_Url_B']; echo "<br>";
                     // echo $row_inside['Image_Url_S']; echo "<br>";
                     // echo $row_inside['Product_Describtion']; echo "<br>";
                     // echo $row_inside['Product_Note']; echo "<br>";
                   

                 }



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
    
    <script src="./Scripts/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<link href="css/Padges.css" rel="stylesheet">
    <style type="text/css">
    html{zoom :90%;}
   th{
background-color: #36304A;
color: white;
padding: 2px;

   }

   #Con_s{

    width: 50%;
   }
    </style>

    <script type="text/javascript">
        
    $(document).ready(function(){
    $('#bux').click(function (e) {
        var id = $('#hi').val();
        $.ajax({
            type : 'post',
            url : './Data_Model.php',
            data :  {id: id}, 
            dataType:"JSON",
            success : function(data){
                 

                $('#Product_ID').text(data.Product_ID);
                console.log(data.Product_ID);
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

                 $("#dummyimage").attr("src",data.Image_Url_B);
          console.log(data);

            }
        });

        $('#myModal').modal('show');
     });
});
    </script>

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




<!-- <div class="container" >    
     <div class="card">
  <div class="card-header">
 
  </div> -->
<!--   <div class="card-body">



  <div class="row">
    <div class="col-3" >
       <img src="./Assets/Images/product_2.png" class="img-thumbnail" alt="Cinque Terre" width="250" height="250" >
    </div>
    <div class="col-8" >
<table class="table">
  <tbody>
    <tr>
      <td><h5 class="mb-1">Name EN</h5</td>
      <td>Product_1</td>
    </tr>
     <tr>
      <td><h5 class="mb-1">Name AR</h5</td>
      <td>Product_1</td>
    </tr>
     <tr>
      <td><h5 class="mb-1">Add_Date</h5</td>
      <td>2018-4-5</td>
    </tr>
 
  </tbody>
</table>
     
    </div>
  </div>
 
</div>
  </div>
</div>  -->
  

<!-- Large modal -->
<!-- <button type="button" id="bux"  class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->

<button type="button" id="bux"  class="btn btn-primary" >Fetch</button>


<input type="hidden" name="hid" id="hi" value="4">
<div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <div class="card">

  <div class="card-body">
  <div class="row">
    <div class="col-3" >
       <img id="dummyimage" src="" class="img-thumbnail" alt="Cinque Terre" width="250" height="250" >
    </div>
    <div class="col-8" >
<table class="table">
  <tbody>
      <tr>
      <td><h5 class="mb-1">Product_ID</h5</td>
      <td id="Product_ID"></td>
    </tr>
    <tr>
      <td><h5 class="mb-1">Name EN</h5</td>
      <td id="Name_EN"></td>
    </tr>
     <tr>
      <td><h5 class="mb-1">Name AR</h5</td>
      <td id="Name_AR"></td>
    </tr>
     <tr>
      <td><h5 class="mb-1">Add_Date & Time</h5</td>
      <td id="Add_Date"></td>
    </tr> 

     <tr>
      <td><h5 class="mb-1">Unit_Price</h5</td>
      <td id="Unit_Price"></td>
    </tr>
 
     <tr>
      <td><h5 class="mb-1">Avilable</h5</td>
      <td id="Avilable"></td>
    </tr>


     
     <tr>
      <td><h5 class="mb-1">Category</h5</td>
      <td id="Category"></td>
    </tr>


    
     <tr>
      <td><h5 class="mb-1">Manifacuring_Date</h5</td>
      <td id="Manifacuring_Date"></td>
    </tr>
    
     <tr>
      <td><h5 class="mb-1">Expiration_Date</h5</td>
      <td id="Expiration_Date"></td>
    </tr>   
     
     <tr>
      <td><h5 class="mb-1">Product_Describtion</h5</td>
      <td id="Product_Describtion"> </td>
    </tr> 

     <tr>
      <td><h5 class="mb-1">Product_Note</h5</td>
      <td id="Product_Note"></td>
    </tr>

  </tbody>
</table>
     
    </div>
  </div>
 
</div>
  </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <!--  <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>

  </div>
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


</body>

</html>
