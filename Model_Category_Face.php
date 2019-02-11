<div id="myModal_Cat" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <div class="card" style="background-color:#343a40; ">
<div class="card-header" style="background-color:#343a40; color: white; ">
    add new Category
  </div>
  <div class="card-body" style="background-color: white;">
<!--  -->
<form  method="POST" action="./Add_Category.php">
  <div class="form-group">
    <label for="exampleFormControlInput1">Category Name</label>
    <input name="Cat_Name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Electronics">
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Describtion</label>
    <textarea name="Cat_Describtion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

    <button type="submit" id="SUb_Cat"  class="btn btn-success btn-lg">Save</button>
</form>
<!--  -->
  </div>
 

  </div>
        <div class="modal-footer">
        <button type="button"  class="btn btn-dark" data-dismiss="modal">Close</button>
       <!--  <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>

  </div>
</div>

