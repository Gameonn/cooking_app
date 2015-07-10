<?php
session_start();

include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{
$id=$_GET['id'];

$sql2="SELECT * FROM recipe_type WHERE id=:id";
$stmt=$conn->prepare($sql2);
$stmt->bindValue(':id',$id);
$stmt->execute();
$result1=$stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php 
 Require 'head.php';
 ?>
</head>
<body>
      <section id="container" >
        <?php 
          Require 'header.php';
          Require 'sidebar.php'; 
        ?>

        <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>Edit Recipe type </h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  
                      <form class="form-horizontal style-form" id="recipe" method="POST" action="eventHandler.php" enctype='multipart/form-data'>
                          <input type="hidden" class="form-control" name="action" value="edit_recipe_type" >
                          <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">

                          <div class="form-group">
						               <label class="col-sm-3 control-label">Recipe Type Name: </label>
						               <div class="col-sm-9">
            						      <input class=" form-control" type="text" name="recipe_type_name" value="<?php echo $result1[0]['title'];?>">
            						    </div>
            			  </div>
                          
						  <div class="form-group">
							      <label class="col-sm-3 control-label">recipe Type Image: </label>
							  <div class="col-sm-9 image-upload">
							     <img src="<?php echo BASE_PATH; ?>uploads/<?php echo $result1[0]['image'];?>" class="def-image" style="width: 50%;height: 200px; padding: 3px;border: 1px solid rgb(213, 206, 206);border-radius: 4px;">
							 <input type="file" name="image" value="<?php echo $result1[0]['image'];?>">
							       </div>
							      </div> 

							 <div class="form-group">
                            <div class="col-sm-12">
                          <center><button type="submit" class="btn btn-theme">Update</button></center>
                          </div>
                          </div>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
<footer class="site-footer">
  <div class="text-center">
      2015 -- recipes
      <a href="edit_recipe_type.php#" class="go-top">
          <i class="fa fa-angle-up"></i>
      </a>
  </div>
</footer>
</section>

<?php  
require 'script.php';
?>
<script>
      //custom select box
      $(function(){
          $('select.styled').customSelect();
      });
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
</body>
</html>
<?php }} 
else
	{
	header("location:index.php");
}