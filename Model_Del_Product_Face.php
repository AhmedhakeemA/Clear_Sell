<div id="Modal_X" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <!-- <div class="modal-body"> -->
           <div class="card" style="background-color:#343a40; ">
<div class="card-header" style="background-color:#343a40; color: white; ">
    Delete Category
  </div>
  <div class="card-body" style="background-color: white;">
<!--  -->
<form  method="POST" action="./Product_Delete.php">
  <input type="hidden"  name="iDD" id="iDD" value="">
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Reason</label>
    <textarea id="area51" name="Cat_Describtion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

    <button type="submit" id="SUb_Cat"  class="btn btn-success btn-lg">Delete</button>
</form>
<!--  -->
  </div>

  </div>
        <div class="modal-footer">
        <button type="button"  class="btn btn-dark" data-dismiss="modal">Close</button>
       <!--  <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
        <!-- </div> -->
    </div>
  </div>
</div>
