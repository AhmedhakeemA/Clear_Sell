<?php  include './Internal/Connection.php' ?>
<?php 


 $statement_Category = $Connect->prepare("SELECT * FROM Category_Data");
 $statement_Category->execute();

 $R_Category = $statement_Category->fetchAll( PDO::FETCH_ASSOC );
// foreach ($R_Category as $row_Category) {

//   echo $row_Category['Cat_ID']; echo "<br>";
//   echo   $row_Category['Cat_Name'];
// }
// echo "<br>";
 $statement_Brand = $Connect->prepare("SELECT * FROM Brand_Data");
 $statement_Brand->execute();

 $R_Brand = $statement_Brand->fetchAll( PDO::FETCH_ASSOC );
// foreach ($R_Brand as $row_Brand) {

//   echo $row_Brand['Brand_ID']; 
//   echo "<br>";
//   echo   $row_Brand['Brand_Name'];
// }






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
<link href="css/add_product_st.css" rel="stylesheet">
    <style type="text/css">
   
   
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





  <!-- Heart Container -->
  <div class="container-fluid"> 

<?php   

 session_start();
@$valuxz= $_SESSION['counter_Errors'];

if (is_array($valuxz)){

  foreach(@$valuxz as  $Er) {
 echo '<div class="alert alert-danger" role="alert">'.$Er.'</div>';
}

}

@ $valuxzxx =$_SESSION['counter_Done'];
 
echo '<div class="alert alert-info" role="alert">'.$valuxzxx.'</div>';
 session_destroy();
?>



<br>
<br>
<br>


 
  <div class="row">
    <div class="col-sm-6" >
     
<div class="container">
<form action="./Add_Product_Handler.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">

        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-primary btn-file">
                    Browse… <input type="file" name="fileToUpload" id="fileToUpload" >
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>
        <br>
        <br>
        <img id='img-upload'/>
    </div>
</div>



    </div>
    <div class="col-sm-6" >

  <div class="row">
    <div class="col">
      <label for="inputEmail4">Name EN</label>
      <input type="text" name="Name_EN" class="form-control" placeholder="Name_EN">
    </div>
    <div class="col">
      <label for="inputEmail4">Name AR</label>
      <input type="text" name="Name_AR" class="form-control" placeholder="Name_AR">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
       <label for="inputEmail4">Unit Price</label>
      <input type="text" name="Unit_Price" class="form-control" placeholder="Unit_Price">
    </div>
    <div class="col">
      <label for="inputEmail4">Amount</label>
      <input type="text" name="Amount" class="form-control" placeholder="Amount">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <label for="inputEmail4">Expiration Date</label>

        <div class="input-group">
        <div class="input-group-addon">
        </div>
        <input class="form-control" id="date" name="Expiration_date" placeholder="YYYY-MM-DD" type="text"/>
       </div>

    </div>
    <div class="col">
      <label for="inputEmail4">Manifactring Date</label>
     
        <div class="input-group">
        <div class="input-group-addon">
        </div>
        <input class="form-control" id="date" name="Manifactring_date" placeholder="YYYY-MM-DD" type="text"/>
       </div>
    </div>
  </div>
    <br>


<div class="row">
    <div class="col">
        <label for="inputEmail4">Category</label>
  <div class="form-group">
  <select id="form_need" name="Category" class="form-control" required="required" data-error="Please specify your need.">
<?php  

foreach ($R_Category as $row_Category) {

echo '<option value="'.$row_Category['Cat_ID'].'">'.$row_Category['Cat_Name'].'</option>';
  // echo $row_Category['Cat_ID']; echo "<br>";
  // echo   $row_Category['Cat_Name'];
}


?>


 </select>
 <div class="help-block with-errors"></div>
 </div>

    </div>
    <div class="col">
     
        <label for="inputEmail4">Brand</label>
  <div class="form-group">
  <select id="form_need" name="Brand" class="form-control" required="required" data-error="Please specify your need.">

<?php 


foreach ($R_Brand as $row_Brand) {

  // echo $row_Brand['Brand_ID']; 
  // echo "<br>";
  // echo   $row_Brand['Brand_Name'];

  echo '<option value="'.$row_Brand['Brand_ID'].'">'.$row_Brand['Brand_Name'].'</option>';
}

?>



 </select>
 <div class="help-block with-errors"></div>
 </div>
    </div>
  </div>

<!-- 
         <label for="inputEmail4">Category</label>
  <div class="form-group">
  <select id="form_need" name="Category" class="form-control" required="required" data-error="Please specify your need.">
<option value="Request quotation"></option>
<option value="Request quotation">Request quotation</option>
<option value="Request order status">Request order status</option>
<option value="Request copy of an invoice">Request copy of an invoice</option>
<option value="Other">Other</option>
 </select>
 <div class="help-block with-errors"></div>
 </div>


        <label for="inputEmail4">Brand</label>
  <div class="form-group">
  <select id="form_need" name="Brand" class="form-control" required="required" data-error="Please specify your need.">
<option value="Request quotation"></option>
<option value="Request quotation">Request quotation</option>
<option value="Request order status">Request order status</option>
<option value="Request copy of an invoice">Request copy of an invoice</option>
<option value="Other">Other</option>
 </select>
 <div class="help-block with-errors"></div>
 </div> -->

 <div class="form-group">
  <label for="comment">Description</label>
  <textarea name="Description" class="form-control" rows="5" id="comment"></textarea>
</div>
 <br>
 <div class="form-group">
  <label for="comment">Admin Note</label>
  <textarea name="Admin_Note" class="form-control" rows="5" id="comment"></textarea>
</div>
</div>
<br>
<div class="container" style="margin-left: 35%;"><button type="input" class="btn btn-warning btn-lg">Save Product</button></div>
</form>
    </div>
  </div>


  <br>
<br>
<br>



<br>
<br>
<br>
 
    </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php  include 'Model_Data_Face.php'; ?>

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
  
</script>
<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

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
  $(document).ready( function() {
      $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
      
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileToUpload").change(function(){
        readURL(this);
    });   
  });
</script>
  




</body>

</html>
