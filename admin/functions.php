<?php 
session_start();
include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{

$id=$_POST['vid'];


$sql="SELECT r.*,rt.title as rt_title,rt.id as rt_id FROM recipes r JOIN recipe_type rt ON r.recipe_type_id=rt.id WHERE r.id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindValue(':id',$id);
$stmt->execute();
$result1=$stmt->fetchAll(PDO::FETCH_ASSOC);

$sql2="SELECT * FROM recipe_type ";
$stmt=$conn->prepare($sql2);
$stmt->execute();
$result2=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!--form for ingredients-->

<form class="form-horizontal " role="form" method="post" action="eventHandler.php" enctype="multipart/form-data">
	<input type="hidden" class="form-control" name="action" value="edit_recipe_details" >
    <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">

  	<div class="form-group">
    	<label class="col-sm-3 control-label">RECIPE NAME:  </label>
    <div class="col-sm-9">
      <input class=" form-control" type="text" name="recipe_name" value="<?php echo strtoupper($result1[0]['title']);?>">
    </div>
  </div>
  <div class="form-group">
	      <label class="col-sm-3 control-label">RECIPE IMAGE: </label>
	  <div class="col-sm-9 image-upload">
	     <img src="<?php echo BASE_PATH; ?>uploads/<?php echo $result1[0]['image'];?>" class="def-image" style="width: 60%;height: 200px; padding: 3px;border: 1px solid rgb(213, 206, 206)  ;
	border-radius: 4px;">
	 <input type="file" name="image" class="filestyle" data-input="false" data-size="sm" data-buttonText="Select file" value="<?php echo $result1[0]['image'];?>">
	       </div>
	      </div>
  <div class="form-group">
    	<label class="col-sm-3 control-label">PREPARATION TIME:  </label>
    <div class="col-sm-3">
      <input class=" form-control" type="number" min="1"  name="prep_time" value="<?php echo $result1[0]['prep_time'];?>">
    </div>

    	<label class="col-sm-3 control-label">COOKING TIME:  </label>
    <div class="col-sm-3">
      <input class=" form-control" type="number" min="1"  name="cook_time" value="<?php echo $result1[0]['cook_time'];?>">
    </div>
  </div>
  <div class="form-group">
    	<label class="col-sm-3 control-label">SERVES:  </label>
    <div class="col-sm-3">
      <input class=" form-control" type="number" min="0" max="10" name="serves" value="<?php echo $result1[0]['serves'];?>">
    </div>

    	<label class="col-sm-3 control-label">SPICY:  </label>
    <div class="col-sm-3">
      <input class=" form-control" type="number" min="0" max="10" name="spicy" value="<?php echo $result1[0]['spicy'];?>">
    </div>
  </div>
    <div class="form-group">
    	<label class="col-sm-3 control-label">DIFFICULTY LEVEL:  </label>
    <div class="col-sm-3">
      <input class=" form-control" type="number" min="0" max="10" name="diff_level" value="<?php echo $result1[0]['diff_level'];?>">
    </div>
    	<label class="col-sm-3 control-label">FEATURED:  </label>
    <div class="col-sm-3">
      <input class=" form-control" type="number" min="0" max="1" name="featured" value="<?php echo $result1[0]['is_featured'];?>">
    </div>
  </div>
    <div class="form-group">
    	<label class="col-sm-12 control-label">LINK FOR RECIPE: </label>
    <div class="col-sm-12">
    	<input class=" form-control" type="text" name="video_val" value="<?php echo $result1[0]['video_url'];?>">
    </div>
  </div>

    <div class="form-group">
    	<label class="col-sm-12 control-label">METHOD FOR RECIPE: </label>
    <div class="col-sm-12">
     	<textarea class=" form-control" name="method_val" rows="5" ><?php echo $result1[0]['method_html']?></textarea>
    </div>
  </div>

  <div class="form-group">
  <label class="col-sm-12 control-label">RECIPE TYPE: </label>
      <div class="col-sm-12">
      <select class="form-control" name="optval" required> 
      <option value="<?php echo $result1[0]['rt_id']?>"><?php echo $result1[0]['rt_title']?></option>
        <?php  foreach($result2 as $row){
            echo '<option value="'.$row['id'].'" >'.$row['title'].'</option>';
        }?>
      </select>
      </div>
  </div>

	 <div align="right">
		<button type="submit" class=" btn btn-theme" name="update_btn" style="color:white">UPDATE</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
	</div>                             
 </form>

<script>

</script>
 <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
  </script>
        <script type="text/javascript">

      $('.image-upload').on("change","input[type='file']",function () {
                // alert('hey');
                var files = this.files;
                var reader = new FileReader();
                name=this.value;
                var this_input=$(this);
                reader.onload = function (e) {

                 this_input.parent('.image-upload').find(".def-image").attr('src', e.target.result).width('100 %').height(200);
               }
               reader.readAsDataURL(files[0]);
             });

    </script>

<?php }}
else
{
	header("location:index.php");
} ?>    