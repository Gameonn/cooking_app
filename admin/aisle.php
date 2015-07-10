<?php
session_start();
include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{
?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Aisle</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form class="form-horizontal style-form" id="recipe" method="POST" action="eventHandler.php" enctype='multipart/form-data'>
                              <div class="col-sm-12"><label class="col-sm-4 control-label">Aisle Name</label>
                              <div class="col-sm-8">
                                  <input type="hidden" class="form-control" name="action" value="aisle">
                                  <input type="text" class="form-control" name="title" required><br>
                              </div>
              </div>
            
       
        <div align="right">
        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
        <button type="submit" class="btn btn-theme">ADD</button>
        </div>
      </form> 
      </div> 
</div>
</div>
</div>
</div>

    
<?php }} 
else
{
	header("location:index.php");
}
?>