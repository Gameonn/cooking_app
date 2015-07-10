<?php 
session_start();
include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{
$id=$_POST['vid'];

$sql="SELECT id,title
FROM `ingredients` AS I
WHERE I.recipe_id =:id";
$stmt=$conn->prepare($sql);
$stmt->bindValue(':id',$id);
$stmt->execute();
$result1=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!--form for ingredients-->

<form class="form-horizontal " role="form" method="post" action="eventHandler.php" enctype="multipart/form-data">
<input type="hidden" class="form-control" name="action" value="edit_ingre_details">
    <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
  
    <div class="form-group">
      <label class=" col-sm-offset-1 col-sm-10 control-label">INGREDIENTS: </label>
    </div>
       <div class="form-group">
        <?php foreach ($result1 as $key => $value) {?>
   
          <div class=" col-sm-offset-1 col-sm-10">
            <input class=" form-control" type="text" name="ingre_title[]" value="<?php echo $value['title'];?>">
            <input type="hidden" class="form-control" name="ingre_id[]" value="<?php echo $value['id'];?>">
          </div>

        <?php }?>
       </div>

   <div align="right">
    <button type="submit" class=" btn btn-theme" name="edit_ingre_details" style="color:white">UPDATE</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
  </div>                             
 </form>
 <?php }} 
 else
{
	header("location:index.php");
}?>