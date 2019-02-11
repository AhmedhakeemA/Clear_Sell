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

.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 80%;
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

       <?php //include './Padges_Color.php'; ?>



<!-- Heart Container -->

    <div class="container-fluid"> 


<!-- Brand_Name
Brans_Describtion
fileToUpload -->


<br>
<br>

<div class="container">
    
<form action="./Add_Brands_Handler.php" method="POST" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
     <input name="Brand_Name" type="text" class="form-control" id="inputPassword" placeholder="text">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Describtion</label>
    <div class="col-sm-10">
       <textarea name="Brans_Describtion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
  </div>
<br>
<br>
      <div class="form-group" style="width: 80%; margin-left: 18%;">

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
         <img style="width: 80%;" id='img-upload'/>
    </div>


<input name="submit" type="submit"   value="Save">
</form>

</div>



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
