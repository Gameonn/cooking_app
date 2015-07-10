<?php
session_start();
include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{

$id=$_POST['vid'];

?>

<div class="form-group">
        <form class="form-horizontal style-form" method="POST" role="form" action="eventHandler.php" enctype='multipart/form-data'>
              <div class="col-sm-8">
                  <input type="hidden" class="form-control" name="action" value="delete_aisle">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
              </div>
                           
              <div align="right">
                       <button type="button" class="btn btn-default" style="background-color: #68dff0; color:white;" data-dismiss="modal">CANCEL</button>
                       <button type="submit" class="btn btn-default" style="background-color: #68dff0; color:white;">DELETE</button>
              </div>
        </form> 
</div>

<?php 
}}
else
{
	header("location:index.php");
} 
?>  